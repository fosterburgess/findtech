<?php

namespace App\Http\Controllers;


use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    public function index()
    {
        return view('main', ['results' => new Collection(), 'spent' => null]);

    }

    public function search(Request $request)
    {
        $x = microtime(true);
        $search = $request->get('search');
        $results = Technology::search($search,
            [
                'facets' => ['tags']
            ]

        )->paginate(12);
        $spent = microtime(true) - $x;
        return view('main', ['results' => $results, 'spent' => $spent]);
    }
}
