<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //
    public function index()
    {
        $departemens = Departemen::get();
        return view('admin-panel.administrator.user-management.index', [
            'departemens' => $departemens
        ]);
    }

    public function datatables()
    {
        $user = User::with('departemen')->orderBy('name', 'asc')->get();

        $datatable = DataTables::of($user)
            ->addIndexColumn()
            ->make('true');

        return $datatable;
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'gender' => $request->gender,
                'position' => $request->position,
                'phone' => $request->phone,
                'avatar' => "avatar-default",
                'departement_id' => $request->departemen,
                'role' => $request->role,
                'password' => bcrypt($request->password),
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
