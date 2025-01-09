<script>
    var urlw = window.location;
    $(document).ready(function() {
        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == urlw;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == urlw;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8">
</script>

<script>
    const map = L.map('map-presensi').setView([-8.098779268610004, 112.1833326255437], 17);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var circle = L.circle([-8.098779268610004, 112.1833326255437], {
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.4,
        radius: 90
    }).addTo(map);

    let userMarker, dist, isInside

    function locateUser() {
        let userLocation = map.locate({
            enableHighAccuracy: true
        });

        map.on('locationfound', function(ev) {
            // userMarker = L.marker(ev.latlng);
            userMarker = L.marker([-8.098779268610004, 112.1833326255437]);
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

    locateUser()

    $(".calibrate-position").on("click", function() {
        locateUser()
    })

    // post data check in
    $(".checkin").on("click", function() {
        if (isInside) {
            alert('dalam area')
        } else {
            alert('diluar area')
        }
    })
</script>
