<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::where('status', '1')->orderByDesc('created_at')->limit(5)->get();
        return view('home.index', ['items' => $items]); //blade.phpは省略してかく
    }
    //
}
