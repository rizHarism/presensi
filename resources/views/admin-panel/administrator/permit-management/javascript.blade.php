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
    table = $('#table-permit').DataTable({
        processing: true,
        ajax: {
            url: "{{ route('permit.datatables') }}",
            method: 'GET',
        },
        columns: [{
                data: 'DT_RowIndex',
            },
            {
                data: 'apply_date',
            },
            {
                data: 'duration',
            },
            {
                data: 'photo',
                render: function(pt) {
                    return `<button class="badge bg-secondary" id="show-photo">Preview</button>`
                }
            },
            {
                data: 'information',
            },
            {
                data: 'approved',
                render: function(app) {
                    if (app == null) {
                        return `<span class="badge bg-warning text-dark">Pending</span>`
                    }
                    if (app == 1) {
                        return `<span class="badge bg-success">Approved </span>`
                    }
                    if (app == 0) {
                        return `<span class="badge bg-danger">Not Approved </span>`
                    }

                }
            },
        ],
    });

    $("#add-permit").on("click", function() {
        $("#modal-add-permit").modal("show")
    })

    $("#post-permit").on("submit", function(e) {
        e.preventDefault()
        // alert("posrt")
        formData = new FormData();
        formData.append("information", $("#informasi").val())
        formData.append("duration", $("#duration").val())
        formData.append("approved", null)
        formData.append("photo", $('input[type=file]')[0].files[0])
        let url = "{{ route('permit.store') }}"
        postDataPermit(formData, url)
    })

    function postDataPermit(data, url) {
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
                if (data = "duplicated") {
                    swal.fire({
                        title: 'Perhatian',
                        text: "Data Pengajuan Sudah ada",
                        icon: 'warning',
                    })
                } else {
                    swal.fire({
                        title: 'Berhasil',
                        text: "Pengajuan Izin Berhasil",
                        icon: 'success',

                    }).then((result) => {
                        console.log(result);
                        if (result.isConfirmed) {
                            table.ajax.reload();
                        }
                    })
                }
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
