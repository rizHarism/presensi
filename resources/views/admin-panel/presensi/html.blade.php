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
                        <p class="checkin-text">Silahkan Lakukan Presensi Hari Ini</p>
                        <input class="btn btn-primary calibrate-position" type="button" value="#">
                        @if ($check_in)
                            <input class="btn btn-danger checkout" type="button" value="Check Out">
                        @else
                            <input class="btn btn-primary checkin" type="button" value="Check In">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
</section>
