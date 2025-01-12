<?php

namespace App\Http\Controllers\Presensi;

use App\Http\Controllers\Controller;
use App\Models\Presensi\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PresensiController extends Controller
{
    //

    public function index()
    {
        $date_time = Carbon::now();
        $date_time->setTimezone('Asia/Jakarta');
        $check_checkin = Presensi::where('user_id', Auth::user()->id)->whereDate('check_in', '=', $date_time)->first();
        if ($check_checkin) {
            $status_checkin = true;
        } else {
            $status_checkin = false;
        };
        return view('admin-panel.presensi.index', [
            'check_in' => $status_checkin
        ]);
    }

    public function history()
    {
        return view('admin-panel.history-user.index');
    }

    public function datatables()
    {
        $presensi = Presensi::where('id', Auth::user()->id)->orderBy('created_at', 'desc');

        $datatable = DataTables::of($presensi)
            ->addIndexColumn()
            ->make('true');

        return $datatable;
    }


    public function store(Request $request)
    {
        $date_time = Carbon::now();
        $date_time->setTimezone('Asia/Jakarta');
        $image_in_name = null;
        DB::beginTransaction();
        if ($request->hasFile('image_in')) {
            $image_in = $request->file('image_in');
            $image_in_name = $image_in->hashName();
            $image_in->storeAs('public/presensi/lapang', $image_in_name);
        }
        try {
            Presensi::create([
                'user_id' => Auth::user()->id,
                'check_in' => $date_time,
                'check_out' => null,
                'image_in' => $image_in_name,
                'image_out' => null,
                'location_in' => $request->location_in,
                'location_out' => null,
                'status_attendance' => $request->status_attendance,
                'approved' => $request->approved,
                'information' => $request->information,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return response($th->getMessage(), 500);
        }

        return response("Data Presensi berhasil disimpan");
    }
}
