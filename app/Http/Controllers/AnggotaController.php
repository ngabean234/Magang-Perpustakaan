<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $title = 'Data Anggota';
        $data = User::orderBy('created_at', 'desc')->where('role_id', 2)->get();
        return view('anggota.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Data user';
        $level = Role::get();
        return view('anggota.add', compact('title', 'level'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->role_id = $request->role_id;
        $data->email = $request->email;
        $data->umur = $request->umur;
        $data->jk = $request->jk;
        $data->password = Hash::make($request->password);
        
        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }

        //dd($data);
        $data->save();

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('anggota');
    }

    public function profile()
    {
        $title = 'Profile';
        $dt = User::find(Auth::id());
        return view('profile', compact('title', 'dt'));
    }

    public function edit($id)
    {
        $title = 'Profile';
        $dt = User::find($id);
        return view('anggota.edit', compact('title', 'dt'));
    }

    public function updateprofile(Request $request)
    {
        $data = User::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;

        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }
        $data->save();

        \Session::flash('sukses', 'Data berhasil ubah');

        return redirect()->back();
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

        $ubahPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $ubahPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->back();
        }
    }

    public function blockanggota($id)
    {
        //verifikasi user berdasarkan id
        DB::table('users')->where('id', $id)->update(['is_block' => 1]);

        \Session::flash('sukses', 'User berhasil di block');
        return redirect()->back();
    }

    public function verifyanggota($id)
    {
        //verifikasi user berdasarkan id
        DB::table('users')->where('id', $id)->update(['is_block' => 0]);

        \Session::flash('sukses', 'User berhasil di aktifkan kembali');
        return redirect()->back();
    }

    public function delete($id)
    {
        User::find($id)->delete();

        \Session::flash('sukses', 'Data berhasil di hapus');

        return redirect()->back();
    }
}
