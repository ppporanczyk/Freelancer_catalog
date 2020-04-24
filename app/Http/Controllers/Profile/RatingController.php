<?php

namespace App\Http\Controllers\Profile;


use App\Offer;
use App\User;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class RatingController extends Controller
{

    public function index( )
    {

    }

    public function create(User $user)
    {

        $url = url()->current();
        $users=User::find(substr($url, -15,1));
        $users = User::all()->where('id','=',$users->id)->first();
        $offers = Offer::all()->where('user_id','=',$users->id);

       return view('profile.rating.create')->withUsers($users)->withOffers($offers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $this->validate($request, [
            'additional_information' => 'required'
        ]);

        $url = url()->current();

        $id_u=substr($url, -8,1);

        $rating = new Rating();
        $rating->lead_time = $request->lead_time;
        $rating->quality = $request->quality;
        $rating->final_result = $request->final_result;
        $rating->additional_information = $request->additional_information;
        $rating->rating_id=auth()->user()->id;
        $rating->user_id = $id_u;
        //$user->ratings()->
        $rating->save();

        $users=User::all()->where('id','=',$id_u)->first();

        return redirect()->route('profile.show', [$users]);
    }

}
