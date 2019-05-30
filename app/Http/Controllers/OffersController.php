<?php

namespace App\Http\Controllers;

use App\Offers;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //this function prevents creating post without logging in but we can see the posts
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show']]);
    }

    public function index()
    {
        $offers = Offers::orderBy('created_at', 'desc')->paginate(10);
//        $offers = Offers::all();
        return view('offers.index')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required',
            'location' => 'required',
            'itinerary'=>'required',
            'essential_info'=>'required'
        ]);
        $offer = new Offers();
        $offer->title = $request->input('title');
        $offer->location = $request->input('location');
        $offer->itinerary = $request->input('itinerary');
        $offer->essential_info = $request->input('essential_info');
        $offer->user_id =auth()->user()->id;
        $offer->save();

        return redirect('/offers')->with('success', 'Offer Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offers::find($id);
        return view('offers.show')->with('offer', $offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offers::find($id);

        if(auth()->user()->id !== $offer->user_id){
            return redirect('/offers')->with('error', 'Unauthorized Page');
        }

        return view('offers.edit')->with('offer', $offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this -> validate($request,[
            'title' => 'required',
            'location' => 'required',
            'itinerary'=>'required',
            'essential_info'=>'required'
        ]);
        $offer = Offers::find($id);
        $offer->title = $request->input('title');
        $offer->location = $request->input('location');
        $offer->itinerary = $request->input('itinerary');
        $offer->essential_info = $request->input('essential_info');
        $offer->save();

        return redirect('/offers')->with('success', 'Offer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offers = Offers::find($id);
        //check for correct user
        if (auth()->user()->id !== $offers->user_id) {
            return redirect('/offers')->with('error', 'Unauthorized Page');
        $offers->delete();
        return redirect('/offers')->with('success', 'Offer Removed');
        }
    }
}
