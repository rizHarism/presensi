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

    function locateUser() {
        let userLocation = map.locate({
            // setView: true,
            enableHighAccuracy: true
        });

        map.on('locationfound', function(ev) {
            let userMarker = L.marker([-8.098779268610004, 112.1833326255437]);
            // let userMarker = L.marker(ev.latlng);
            console.log(userMarker)
            userMarker.addTo(map)
            map.flyTo(userMarker._latlng, 17)
            // map.setView(userMarker._latlng, 17, {
            //     animate: true
            // })
        })
    }

    locateUser()

    $(".calibrate-position").on("click", function() {
        locateUser()
    })
</script>
