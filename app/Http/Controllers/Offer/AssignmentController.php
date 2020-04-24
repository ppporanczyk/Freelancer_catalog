<?php

namespace App\Http\Controllers\Offer;


use App\Assignment;
use App\User;
use Illuminate\Http\Request;
use App\Offer;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index( )
    {
        return view('assignment.create');
    }

    public function create( Offer $offer )
    {
        $user = User::find($offer->user_id);
        return view('offers.assignment.create')->withOffer( $offer )->withUser($user);
    }


    public function store(Request $request, Offer $offer)
    {
        $this->validate($request, [
            'expected_deadline' => 'after:today',
            'expected_salary' => 'required|not_in:0|numeric',
            'additional_information' => 'required'
        ]);
        $assignment = new Assignment();
        $assignment->expected_deadline = $request->expected_deadline;
        $assignment->expected_salary = $request->expected_salary;
        $assignment->additional_information = $request->additional_information;
        $assignment->user_id = auth()->user()->id;
        $assignment->status = 'Pending';
        $offer->assignments()->save($assignment);

        return redirect()->route('profile.index', [$offer, $assignment]);
    }

    public function show(Offer $offer, Assignment $assignment )
    {
        $assignment->status = 'Accepted';
        $assignment->save();
        return redirect()->route('offers.show', [$offer, $assignment]);
    }

    public function edit(Offer $offer, Assignment $assignment )
    {
        $assignment->status = 'Confirmed';
        $assignment->save();
        Assignment::where([ ['status', '!=', 'Confirmed'],
                            ['offer_id', '=', $assignment->offer_id] ])->delete();

        return redirect()->route('profile.index', [$offer, $assignment]);

    }

    public function update( Offer $offer, Assignment $assignment )
    {
        $assignment->delete();

        return redirect()->route('profile.show', [$offer,$assignment]);
    }


}
