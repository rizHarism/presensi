<section class="content">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Profile</h3>
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
        <div class="container d-flex justify-content-center">
            <div class="card" style="width: 500px;">
                <h5 class="card-header fw-bold">Profil Karyawan</h5>
                <img class="img-thumbnail mx-auto d-block mt-2"
                    src="https://cdn-icons-png.flaticon.com/512/219/219988.png" alt="Card image cap"
                    style="width: 200px">
                <div class="card-body ">
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Nama</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->name }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Email</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->email }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Username</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->username }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Jenis Kelamin</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->gender }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Jabatan</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->position }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Nomor Telepon</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->phone }}</div>
                    </div>
                    <div class="row border bordered my-2">
                        <div class="col-lg-4 my-2 h6">Departemen</div>
                        <div class="col-lg-8 my-2 h6"> {{ Auth::user()->departemen->name }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
</section>
