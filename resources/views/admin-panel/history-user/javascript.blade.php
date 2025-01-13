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
    table = $('#table-history').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('presensi.datatables') }}",
            method: 'GET',
        },
        columns: [{
                data: 'DT_RowIndex',
            },
            {
                data: 'check_in',
                render: (data) => {
                    const date = data.split(" ")
                    return date[0]
                }
            },
            {
                data: 'check_in',
                render: (data) => {
                    const date = data.split(" ")
                    return date[1]
                }
            },
            {
                data: 'check_out',
                render: (data) => {
                    if (data) {
                        const date = data.split(" ")
                        return date[1]
                    } else {
                        return "-"
                    }
                }
            },
            {
                data: 'status_attendance',
            },
            {
                data: 'information',
            },
        ]
    });
</script>
