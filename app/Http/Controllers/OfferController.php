<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\User;
use DB;
use function MongoDB\BSON\toJSON;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function latest()
    {
            $offers =  Offer::all()->sortByDesc('id')->take(3);
            return view('welcome')->withOffers( $offers );
    }

    public function index(Request $request)
    {
        $offers =  Offer::all()->sortByDesc('id');

        if($request->filled('min_salary'))
            $offers = $offers->where('maxSalary', '>=', (int)$request->min_salary);


       if($request->filled('max_deadline'))
            $offers = $offers->where('deadline', '<=', $request->max_deadline);


        return view('offers.index')->withOffers($offers);
    }


    public function create()
    {
        return view('offers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'after:today',
            'maxSalary' => 'required|not_in:0|numeric'
        ]);
        $offer = new Offer();
        $offer->title = $request->title;
        $offer->user_id = auth()->user()->id;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();

        return redirect()->route('profile.index');
    }


    public function show(Offer $offer)
    {
        $user = User::find($offer->user_id);
        //$offers = $user->offers;
        //return view('offers.show')->withOffer($offers);
        return view('offers.show')->withOffer($offer)->withUser($user);
    }


    public function edit(Offer $offer)
    {
        return view( 'offers.edit')->withOffer($offer);
    }


    public function update(Request $request, Offer $offer)
    {

        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->deadline = $request->deadline;
        $offer->maxSalary = $request->maxSalary;
        $offer->save();
        return redirect()->route('offers.show', $offer );
    }


    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }
}
