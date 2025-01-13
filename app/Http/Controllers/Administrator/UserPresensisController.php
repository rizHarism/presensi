<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Presensi\Presensi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserPresensisController extends Controller
{
    //
    public function index()
    {
        return view('admin-panel.administrator.presensi-management.index');
    }

    public function datatables()
    {
        $presensi = Presensi::with('user')->orderBy('created_at', 'desc');

        $datatable = DataTables::of($presensi)
            ->addIndexColumn()
            ->make('true');

        return $datatable;
    }
}
