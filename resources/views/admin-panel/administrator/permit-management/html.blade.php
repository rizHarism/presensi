<section class="content">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Perizinan</h3>
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
        <div class="container">
            <div class="card">
                <h5 class="card-header fw-bold">Perizinan</h5>
                <div class="card-body ">
                    <table class="table table-striped" id="table-permit">
                        <thead>
                            <tr class="">
                                <th> #</th>
                                <th> Nama</th>
                                <th> Tanggal Izin</th>
                                <th> Lama Izin</th>
                                <th> Foto</th>
                                <th> Keterangan</th>
                                <th> Status Approve</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="modal-add-permit" tabindex="-1" aria-labelledby="add-permit-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-permit-Label">Tambah Pengajuan Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Silahkan isi form pengajuan izin</h5>
                    <hr>
                    <form action="post" id="post-permit">
                        <div class="mb-3">
                            <label for="informasi" class="form-label">Alasan Izin</label>
                            <textarea class="form-control" placeholder="Masukkan Informasi Presensi" id="informasi" style="height: 100px" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="informasi" class="form-label">Lama Izin (hari)</label>
                            <input type="number" class="form-control" id="duration" required />
                        </div>
                        <div class="mb-3">
                            <label for="photo-permit" class="form-label">Bukti Izin</label>
                            <input type="file" class="form-control" id="foto-permit"
                                accept="image/png, image/gif, image/jpeg" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="" form="post-permit">Ajukan !</button>
                </div>
            </div>
        </div>
    </div>
</section>
