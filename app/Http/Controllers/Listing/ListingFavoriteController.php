<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Listing;

class ListingFavoriteController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function index(Request $request)
	{
		$listings = $request->user()->favoriteListings()->with(['user', 'area'])->paginate(10);

		return view('user.listings.favorites.index', compact('listings'));

	}

    public function store(Request $request, Area $area, Listing $listing)
    {
    	$request->user()->favoriteListings()->syncWithoutDetaching([$listing->id]);

    	return back()->with(['success' =>  'Listing has been added to favorites']);
    }

    public function destroy(Request $request, Area $area, Listing $listing)
    {
    	$request->user()->favoriteListings()->detach($listing);

    	return back()->withSuccess('Listing has been removed from favorites');
    }
}
