<?php

namespace App\Http\Controllers\Listing;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Listing;
use App\Http\Requests\ListingContactRequest;
use App\Mail\ListingContactCreated;

class ListingContactController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function store(ListingContactRequest $request, Area $area, Listing $listing)
    {
    	Mail::to($listing->user)->queue(
    		new ListingContactCreated($request->user(), $listing, $request->message)
    	);

    	return back()->withSuccess("We have sent your message to {$listing->user->name}.");
    }
}
