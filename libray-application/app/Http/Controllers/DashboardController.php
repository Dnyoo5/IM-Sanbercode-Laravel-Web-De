<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\Genre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalUsers = User::count();
        $totalComments = Comment::count();
        $totalGenres = Genre::count();

        $commentsPerMonth = Comment::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month'); // Hasil: [1 => 15, 2 => 8, ..., 12 => 0]

        // Format agar 12 bulan selalu ada, meskipun 0
        $months = collect(range(1, 12))->map(function ($month) use ($commentsPerMonth) {
            return $commentsPerMonth[$month] ?? 0;
        });

        return view('dashboard.index', [
            'hideFooter' => true,
            'totalBooks' => $totalBooks,
            'totalUsers' => $totalUsers,
            'totalComments' => $totalComments,
            'totalGenres' => $totalGenres,
            'monthlyReviewData' => $months->toArray(),
        ]);
    }


    public function datatable()
    {
        $users = DB::table('users')
            ->select('id', 'name', 'email', 'role', 'created_at')
            ->where('created_at', '>=', Carbon::now()->subDays(7)) // hanya 7 hari terakhir
            ->orderBy('created_at', 'desc')
            ->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->toJson();
    }
}
