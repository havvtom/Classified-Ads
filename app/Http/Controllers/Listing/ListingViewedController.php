<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingViewedController extends Controller
{
	const INDEX_LIMIT = 10;

	public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function index(Request $request)
    {
    	$listings = $request->user()->viewedListing()
    		->with(['user', 'area', 'viewedUsers'])
    		->orderByPivot('updated_at', 'DESC')
    		->isLive()
    		->take(self::INDEX_LIMIT)
    		->get();

    		return view('listings.viewed.index', [
    			'listings'=> $listings,
    			'index' => self::INDEX_LIMIT
    		]);
    }
}
