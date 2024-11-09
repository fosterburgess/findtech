<?php

namespace App\Http\Controllers;


use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    public function index()
    {
        return view('main', ['results' => null, 'spent' => null]);

    }

    public function search(Request $request)
    {
        $x = microtime(true);
        $search = $request->get('search') ?? $request->query('query');
        $results = Technology::search($search)->paginate(12);
        $spent = microtime(true) - $x;
        return view('main', ['term' => $search, 'results' => $results, 'spent' => $spent]);
    }
}
