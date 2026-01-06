<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog\Product;
use App\Models\Shop;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        return ($q = $request->q)
            ? ( $request->type == 1 ? view('search.products', ['data' => Product::searchAutocomplete($q, true)]) : view('search.branches', ['data' => Shop::searchAutocomplete($q, true)]) )
            : null;
    }
}
