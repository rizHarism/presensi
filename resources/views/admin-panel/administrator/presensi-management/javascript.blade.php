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
    table = $('#table-presensi').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('administrator.presensis.datatables') }}",
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
                data: 'user.name',
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
            },
            {
                data: 'status_attendance',
            },
            {
                data: 'information',
            },
            {
                data: 'id',
                render: function(id) {
                    return `<a class="btn btn-sm btn-warning">Detail</a>
                    <a class="btn btn-sm btn-danger">Edit</a>`
                }
            },
        ]
    });

    function postDataUsers(data, url) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            type: 'POST',
            url: url,
            data: data,
            // cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                swal.fire({
                    title: 'Berhasil',
                    text: "Data Karyawan Berhasil Ditambahkan",
                    icon: 'success',

                }).then((result) => {
                    if (result.isConfirmed) {
                        table.ajax.reload();
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
