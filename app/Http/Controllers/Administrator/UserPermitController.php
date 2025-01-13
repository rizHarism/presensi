<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Presensi\Permit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserPermitController extends Controller
{
    //
    public function index()
    {
        return view('admin-panel.administrator.permit-management.index');
    }

    public function datatables()
    {
        $presensi = Permit::with('user')->orderBy('created_at', 'desc');

        $datatable = DataTables::of($presensi)
            ->addIndexColumn()
            ->make('true');

        return $datatable;
    }
}
