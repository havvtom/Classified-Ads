<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingPublishedController extends Controller
{
    public function index(Request $request)
    {
    	$listings = $request->user()->listings()->with(['area'])->isLive()->get();

    	return view('listings.user.published.index', compact('listings'));
    }
}
