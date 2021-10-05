<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->get();
        return view('Listings.index', ['listings' => $listings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
           'name' => 'required',
           'email'=> 'email',
        ]);

        $listing = new Listing();
        $listing -> name = $request->input('name');
        $listing -> email = $request->input('email');
        $listing -> website = $request->input('website');
        $listing -> address = $request->input('address');
        $listing -> phoneNumber = $request->input('phoneNumber');
        $listing -> bio = $request->input('bio');
        $listing -> user_id = auth()->user()->id;
        $listing->save();

        return \redirect('/home')->with('success', 'Record Added Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Listing::find($id);
        return \view('Listings.show', ['listing'=> $list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Listing::find($id);
        return \view('Listings.edit', ['listing'=> $list]);
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
        $this->validate($request,[
            'name'=> 'required',
            'email'=>'email|required'
        ]);

        $list = Listing::find($id);
        $list->name = $request->input('name');
        $list -> email = $request->input('email');
        $list -> website = $request->input('website');
        $list -> address = $request->input('address');
        $list -> phoneNumber = $request->input('phoneNumber');
        $list -> bio = $request->input('bio');

        if ($id != $request->input('id') )  {
            # code...
            return \back()-> with('error', 'Trying to perform an invalid operation');
        }else {

         $save =   $list ->update();
         return \redirect('/home')->with('success', 'Record updated Successfully');

        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $listing = Listing::find($id);
       $listing->delete();
       return \redirect('/home')->with('success', 'Record Deleted');
    }
}
