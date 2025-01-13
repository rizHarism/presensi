<section class="content">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Presensi Karyawan</h3>
                </div>
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div> --}}
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header fw-bold">Data Presensi Karyawan</h5>
                <div class="card-body ">
                    <table class="table table-striped" id="table-presensi">
                        <thead>
                            <tr class="">
                                <th> #</th>
                                <th> Tanggal</th>
                                <th> Karyawan</th>
                                <th> Jam Masuk</th>
                                <th> Jam Keluar</th>
                                <th> Status Presensi</th>
                                <th> Informasi</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="modal-add-user" tabindex="-1" aria-labelledby="add-user-Label">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-user-Label">Tambah Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="post-user">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="" form="post-user">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>
