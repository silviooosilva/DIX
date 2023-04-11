<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->only('search')["search"];
        $data = DB::table('news')
            ->where('title', 'LIKE', '%' . $query . '%')
            ->where('created_by', '=', auth()->user()->name)
            ->get();

        return view('news.search', ['data' => $data]);
    }
}
