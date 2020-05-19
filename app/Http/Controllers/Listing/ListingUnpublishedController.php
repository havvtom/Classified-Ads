<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingUnpublishedController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function index(Request $request)
    {
    	$listings = $request->user()->listings()->latestFirst()->with(['area'])->isNotLive()->get();
    	return view('listings.user.unpublished.index', compact('listings'));
    }
}
