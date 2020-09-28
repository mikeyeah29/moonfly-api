<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gig;
use Auth;

class GigsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
    	$gigs = Gig::where('user_id', '=', Auth::id())
                    ->whereDate('date', '>=', date("Y-m-d"))
                    ->orderby('date', 'asc')
                    ->get();

    	return view('gigs.index', [
    		'gigs' => $gigs
    	]);
    }

    public function create()
    {
    	return view('gigs.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'date' => 'required|date',
    		'venue' => 'required'
    	]);

    	$gig = new Gig();
    	$gig->user_id = Auth::id();
    	$gig->date = $request->date;
    	$gig->venue = $request->venue;
    	$gig->address_line_one = $request->address_line_one;
    	$gig->postcode = $request->postcode;
    	$gig->revenue = $request->revenue;
    	$gig->rider = $request->rider;
    	$gig->save();

    	return redirect('/gigs')->with('success', 'Gig added');
    }

    public function destroy($id)
    {
    	$gig = Gig::findOrFail($id);

        if($gig->user_id === Auth::id()){
            $gig->delete();
            return back()->with('success', 'Gig deleted');
        }

        return back()->with('error', 'Cant do that');
    }
}
