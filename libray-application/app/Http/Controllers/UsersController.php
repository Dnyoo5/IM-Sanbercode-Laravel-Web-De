<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return  view('auth.admin-manage.index', [
            'hideFooter' => true
        ]);
    }


    public function datatable()
    {
        // Ambil data dari tabel 'users'
        $users = DB::table('users')
            ->select('id', 'name', 'email', 'role')
            ->get();

        // dd($kategoris);
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $id = $row->id;

                // Mulai dengan string kosong
                $data = '';

                // Cek apakah user adalah superadmin atau admin

                // Tombol edit dan delete hanya untuk superadmin dan admin
                $data .= '
                     <a class="btn btn-sm btn-info btn-icon show-button-users" data-id="' . $id . '" href="#">
                        <i class="fa fa-eye"></i>
                    </a>
                         <a class="btn btn-sm btn-primary btn-icon edit-button-users" data-id="' . $id . '" href="#">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-sm btn-danger btn-icon delete-genre" data-id="' . $id . '" href="' . route('admin.users.destroy', $id) . '">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';


                return $data;
            })
            ->rawColumns(['aksi'])
            // Aktifkan kolom 'aksi' agar mendukung HTML
            ->toJson();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }


    public function edit($id) {
        $users =  User::findOrFail($id);

        return view('auth.admin-manage.edit',compact('users'));
    }


       public function show($id)
    {
        $users = User::findOrFail($id);

        return view('auth.admin-manage.show', compact('users'));
    }


     public function destroy($id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('admin.users.index')->with('error', 'Users tidak ditemukan.');
        }
        $users->delete();
        return redirect()->route('admin.users.index')->with('success', 'Data Users berhasil dihapus.');
    }
}
