<section class="content">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Presensi</h3>
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
            <div class="row">
                <div class="col-lg-8 map-div">
                    <div id="map-presensi" style="height: 400px;"></div>
                </div>
                <div class="col-lg-4">
                    <div class="checkin-wrapper align-items-center">
                        <h4 id="date"></h4>
                        <h4 id="time"></h4>
                        <h5 id="message"></h5>
                        {{-- <p class="checkin-text">Silahkan Lakukan Presensi Hari Ini</p> --}}
                        <input class="btn btn-primary calibrate-position" type="button" value="#">
                        @if ($check_in)

                            @if ($check_out)
                                <input class="btn btn-secondary " type="button" value="Done" disabled>
                            @else
                                <input class="btn btn-danger checkout" type="button" value="Check Out">
                            @endif
                        @else
                            <input class="btn btn-primary checkin" type="button" value="Check In">
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="modal-outside-area" tabindex="-1" aria-labelledby="outside-area-Label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outside-area-Label">Perhatian!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Anda berada di luar Area Presensi</h4>
                    <h5>Jika anda berada di lapangan, silahkan lakukan input presensi lapangan</h5>
                    <form action="Post" id="presensi-lapangan">
                        <div class="mb-3">
                            <label for="informasi" class="form-label">Informasi Presensi</label>
                            <textarea class="form-control" placeholder="Masukkan Informasi Presensi" id="informasi" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo-lapangan" class="form-label">Foto Lapangan</label>
                            <input type="file" class="form-control" id="foto-lapangan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="checkin-lapang">Check In</button>
                </div>
            </div>
        </div>
    </div>
</section>
