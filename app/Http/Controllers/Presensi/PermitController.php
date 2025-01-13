<?php

namespace App\Http\Controllers\Presensi;

use App\Http\Controllers\Controller;
use App\Models\Presensi\Permit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PermitController extends Controller
{
    //
    public function index()
    {
        return view('admin-panel.permit-user.index');
    }

    public function datatables()
    {
        $permit = Permit::where('id', Auth::user()->id)->orderBy('created_at', 'desc');

        $datatable = DataTables::of($permit)
            ->addIndexColumn()
            ->make('true');

        return $datatable;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $date = Carbon::now();
        $check = Permit::where('apply_date', $date)->first();

        if ($check) {
            return response("duplicated");
        }

        $date->setTimezone('Asia/Jakarta');
        $photo = null;
        DB::beginTransaction();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = $photo->hashName();
            $photo->storeAs('public/permit/', $photo_name);
        }
        try {
            Permit::create([
                'user_id' => Auth::user()->id,
                'admin_id' => null,
                'apply_date' => $date,
                'duration' => $request->duration,
                'information' => $request->information,
                'photo' => $photo_name,
                'approved' => null,
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
