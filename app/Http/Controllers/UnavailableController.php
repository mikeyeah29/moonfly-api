<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnavailableDate;
use Auth;

class UnavailableController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dates = UnavailableDate::where('user_id', Auth::id())
                    ->whereDate('date', '>=', date("Y-m-d"))
                    ->orderby('date', 'asc')->get();

    	return view('unavailable.index', [
    		'dates' => $dates
    	]);
    }

    public function create()
    {
        return view('unavailable.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'date' => 'required|date'
        ]);

        $date = new UnavailableDate();
        $date->user_id = Auth::id();
        $date->date = $request->date;
        $date->reason = $request->reason;
        $date->save();

        return redirect('/unavailable')->with('success', 'Unavailable date added');
    }

    public function destroy($id)
    {
        $date = UnavailableDate::findOrFail($id);

        if($date->user_id === Auth::id()){
            $date->delete();
            return back()->with('success', 'Date deleted');
        }

        return back()->with('error', 'Cant do that');
    }
}
