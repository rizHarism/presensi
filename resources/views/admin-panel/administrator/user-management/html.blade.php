<section class="content">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Personil / Karyawan</h3>
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
                <h5 class="card-header fw-bold">Data Personil / Karyawan</h5>
                <div class="card-body ">
                    <button type="button" class="btn btn-primary" id="add-user">+ Tambah Karyawan</button>
                    <hr>
                    <table class="table table-striped" id="table-users">
                        <thead>
                            <tr class="">
                                <th> #</th>
                                <th> Nama</th>
                                <th> Email</th>
                                <th> Username</th>
                                <th> Jenis Kelamin</th>
                                <th> Jabatan</th>
                                <th> Departemen</th>
                                <th> No. Telephone</th>
                                <th> Hak Akses</th>
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
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required />
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="gender" name="gender" aria-label="" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="departemen" class="form-label">Departemen</label>
                            <select class="form-select" id="departemen" name="departemen" aria-label="" required>
                                @foreach ($departemens as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="position" name="position" aria-label="" required>
                                <option value="Manajer">Manajer</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Hak Akses</label>
                            <select class="form-select" id="role" name="role" aria-label="" required>
                                <option value="General User">General User</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="phone" name="phone" required />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required />
                        </div>
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
