<script>
    var urlw = window.location;
    $(document).ready(function() {
        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {

            return this.href == urlw;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == urlw;
        }).parentsUntil("ul.sidebar-menu > .nav-treeview").addClass('menu-open').prev('a').addClass(
            'active');
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8">
</script>

<script>
    // const map = L.map('map-presensi').setView([-8.098779268610004, 112.1833326255437], 17);
    const map = L.map('map-presensi').setView([-8.0516803, 112.335131], 17);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var circle = L.circle([-8.098779268610004, 112.1833326255437], {
        // var circle = L.circle([-8.0516803, 112.335131], {
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.4,
        radius: 90
    }).addTo(map);

    let userMarker, dist, isInside

    function locateUser() {
        // let userLocation = map.locate({
        //     // enableHighAccuracy: true
        // });
        let userLocation = map.locate({
            // setView: true,
            // maxZoom: 16
        });

        map.on('locationfound', function(ev) {
            userMarker = L.marker(ev.latlng);
            // let userMarker = L.marker(ev.latlng);
            console.log(userMarker)
            userMarker.addTo(map)
            map.flyTo(userMarker._latlng, 17)
            dist = map.distance(userMarker._latlng, circle.getLatLng());
            isInside = dist < circle.getRadius();
            circle.setStyle({
                fillColor: isInside ? 'green' : '#f03'
            })
        })
    }

    function onLocationError(e) {
        alert(e.message);
    }


    map.on('locationerror', onLocationError);

    locateUser()

    $(".calibrate-position").on("click", function() {
        locateUser()
    })

    // post data check in
    $(".checkin").on("click", function() {
        if (isInside) {
            let location = userMarker._latlng
            let data = {
                "location_in": location.lat + "," + location.lng,
                "status_attendance": 'masuk',
                "approved": 1,
                "information": "tidak ada informasi",
            }
            let url = "{{ route('presensi.store') }}"
            postDataPresensi(JSON.stringify(data), url, "application/json")
        } else {
            $("#modal-outside-area").modal("show")
        }
    })

    // post data check in lapangan
    $("#checkin-lapang").on("click", function() {
        let location = userMarker._latlng
        formData = new FormData();
        formData.append("location_in", location.lat + "," + location.lng)
        formData.append("status_attendance", "lapang")
        formData.append("approved", 0)
        formData.append("information", $("#informasi").val())
        formData.append("image_in", $('input[type=file]')[0].files[0])
        let url = "{{ route('presensi.store') }}"
        postDataPresensi(formData, url, false)
    })

    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    const months = [
        "Januari", "February", "Maret", "April", "Mei", "June",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    function updateTime() {
        const now = new Date(); // Get current date and time

        // Format the date
        const dayName = days[now.getDay()];
        const monthName = months[now.getMonth()];
        const day = String(now.getDate()).padStart(2, '0'); // Day of the month
        const year = now.getFullYear(); // Full year

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        // Ensure the element with id 'time' exists and update its content

        $('#date').html(`${dayName}, ${day}/${monthName}/${year}`)
        $('#time').html(`${hours}:${minutes}:${seconds}`)
    }

    // Update time every second
    setInterval(updateTime, 1000);
    // Initialize time display immediately
    updateTime();


    // check in button on click

    function postDataPresensi(data, url, contentType) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            type: 'POST',
            url: url,
            data: data,
            // cache: false,
            contentType: contentType,
            processData: false,
            success: (data) => {
                swal.fire({
                    title: 'Berhasil',
                    text: "Prsensi Berhasil",
                    icon: 'success',

                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            },
            error: (xhr, ajaxOptions, thrownError) => {
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    var html =
                        "<ul style=justify-content: space-between;'>";
                    var txt = "";
                    for (item in xhr.responseJSON.errors) {
                        if (xhr.responseJSON.errors[item].length) {
                            txt = xhr.responseJSON.errors[item];
                            for (var i = 0; i < xhr.responseJSON.errors[item]
                                .length; i++) {
                                html += "<li class='dropdown-item'>" +
                                    "<i class='fas fa-times' style='color: red;'></i> &nbsp&nbsp&nbsp&nbsp" +
                                    xhr
                                    .responseJSON
                                    .errors[item][i] +
                                    "</li>"
                            }

                        }
                    }
                    html += "</ul>";
                    // swal.fire({
                    //     title: 'Error',
                    //     html: txt,
                    //     icon: 'warning',
                    // });

                }
            }
        });
    }
</script>
