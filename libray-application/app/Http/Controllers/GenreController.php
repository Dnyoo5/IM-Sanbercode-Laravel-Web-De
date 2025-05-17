<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::paginate(16); // Batasi 16 genre per halaman
        return view('genres.index', compact('genre'));
    }


    public function adminIndex()
    {
        return view('genres.admin.index', [
            'hideFooter' => true,
        ]);
    }

    public function showPublic($id)
    {
        $genre = Genre::with('books')->findOrFail($id);

        return view('genres.show', [
            'genre' => $genre,
            'hideFooter' => true,
        ]);
    }



    public function datatable()
    {
        // Ambil data dari tabel 'users'
        $genres = DB::table('genres')
            ->select('id', 'name', 'description')
            ->get();

        // dd($kategoris);
        return DataTables::of($genres)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $id = $row->id;

                // Mulai dengan string kosong
                $data = '';

                // Cek apakah user adalah superadmin atau admin

                // Tombol edit dan delete hanya untuk superadmin dan admin
                $data .= '
                     <a class="btn btn-sm btn-info btn-icon show-button" href="' . route('genres.show.public', $id) . '">
                        <i class="fa fa-eye"></i>
                    </a>
                         <a class="btn btn-sm btn-primary btn-icon edit-button" data-id="' . $id . '" href="#">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-sm btn-danger btn-icon delete-genre" data-id="' . $id . '" href="' . route('admin.genres.destroy', $id) . '">
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Genre berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        return view('genres.admin.edit', compact('genre'));
    }

    public function show($id)
    {
        $genre = Genre::findOrFail($id);

        return view('genres.admin.show', compact('genre'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $id, // Pastikan unique diperbarui sesuai ID
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Name Genre wajib diisi.',
            'name.string' => 'Name Genre harus berupa teks.',
            'name.unique' => 'Name Genre sudah digunakan.',
            'description.string' => 'description harus berupa teks.',
            'description.max' => 'description maksimal 1000 karakter.',
        ]);

        // Temukan data kategori
        $genre = Genre::findOrFail($id); // Temukan data berdasarkan ID

        // Update data
        $genre->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return redirect()->route('admin.genres.index')->with('error', 'genre tidak ditemukan.');
        }
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Data genre berhasil dihapus.');
    }
}
