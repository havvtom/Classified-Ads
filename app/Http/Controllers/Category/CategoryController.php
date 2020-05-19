<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Area;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
    	//eager load listings
    	$categories = Category::withListingsInArea($area)->get()->toTree();
    	
    	return view('categories.index', compact('categories'));

    }
}
