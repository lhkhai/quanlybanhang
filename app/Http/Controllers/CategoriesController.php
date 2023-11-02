<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = categories::paginate(10);
        return view('category.categories')->with(['dataview'=>$categories]);
    }
    
}
