<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::when($request->search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->paginate(12);

        return view('book.index', compact('books'));
    }


    public function adminIndex()
    {
        return view('book.admin-book.index', [
            'hideFooter' => true
        ]);
    }


    public function datatable()
    {
        $books = DB::table('books')
            ->leftJoin('genres', 'books.genre_id', '=', 'genres.id')
            ->select(
                'books.id',
                'books.title',
                'books.summary',
                'books.image',
                'books.stok',
                'genres.name as genre_name'
            )
            ->get();

        return DataTables::of($books)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $url = asset('storage/books/' . $row->image);
                return '<img src="' . $url . '" alt="cover" class="img-fluid" style="border: 0.5px solid black;" width="50">';
            })
            ->addColumn('genre', function ($row) {
                return $row->genre_name ?? '-';
            })
            ->addColumn('aksi', function ($row) {
                $id = $row->id;
                return '
                <a class="btn btn-sm btn-info btn-icon show-button"   href="' . route('books.show', $id) . '">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-sm btn-primary btn-icon edit-button" href="' . route('admin.books.edit', $id) . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-sm btn-danger btn-icon delete-buku" href="' . route('admin.books.destroy', $id) . '">
                    <i class="fa fa-trash"></i>
                </a>';
            })
            ->rawColumns(['image', 'aksi']) // render HTML
            ->toJson();
    }


    public function create()
    {
        $genre = Genre::all();
        return view('book.admin-book.create', [
            'hideFooter' => true,
            'genre' => $genre,
        ]);
    }


    public function show($id)
    {
        $book = Book::with('genre', 'comments.user')->findOrFail($id);

        // Ambil 5 buku terbaru kecuali buku yang sedang dilihat
        $latestBooks = Book::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view('book.show', compact('book', 'latestBooks'));
    }





    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'     => 'required|string|max:255',
            'summary'   => 'required|string',
            'stok'      => 'required|integer|min:0',
            'id_genre'  => 'required|exists:genres,id',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar jika ada
        $namaGambar = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('books', $namaGambar, 'public'); // <--- INI PENTING
        }


        // Simpan data buku
        Book::create([
            'title'     => $request->title,
            'summary'   => $request->summary,
            'stok'      => $request->stok,
            'genre_id'  => $request->id_genre,
            'image'     => $namaGambar,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'summary' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $book = Book::findOrFail($id);

        $book->title = $request->title;
        $book->stok = $request->stok;
        $book->summary = $request->summary;
        $book->genre_id = $request->genre_id;

        if ($request->hasFile('gambar')) {
            if ($book->image && Storage::exists('public/' . $book->image)) {
                Storage::delete('public/' . $book->image);
            }

            $file = $request->file('gambar');
            $path = $file->store('books', 'public');
            $book->image = $path;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Data buku berhasil diperbarui.');
    }



    public function edit($id)
    {
        $genre = Genre::all();
        $book = Book::findOrFail($id);
        return view('book.admin-book.edit', compact('book', 'genre'));
    }


    public function destroy($id)
    {
        $books = Book::find($id);
        if (!$books) {
            return redirect()->route('admin.books.index')->with('error', 'books tidak ditemukan.');
        }
        $books->delete();
        return redirect()->route('admin.books.index')->with('success', 'Data boo$books berhasil dihapus.');
    }
}
