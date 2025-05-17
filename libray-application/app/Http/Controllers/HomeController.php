<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. 4 Genre dengan jumlah buku terbanyak
        $genre = Genre::withCount('books')
            ->orderBy('books_count', 'desc')
            ->take(4)
            ->get();

        // 2. 8 Buku dengan komentar terbanyak
        $topBooks = Book::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(8)
            ->get();

        // 3. 5 Buku terbaru
        $newestBooks = Book::latest()->take(5)->get();

        return view('home.index', compact('genre', 'topBooks', 'newestBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.overview');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
