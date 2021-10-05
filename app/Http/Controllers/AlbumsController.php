<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        @
        $albums = Album::with('photos')->get();
        return view('albums.index', ['albums'=> $albums]);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
           'name'=> 'required',
           //'cover_image' => 'image|max:1999'
        ]);

        //Getting files original name
        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

        //Getting file name without extension
        $filename = \pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Getting file extension
         $extention = $request->file('cover_image')->getClientOriginalExtension();

         //Create new file name
         $filenametoStore = $filename.'_'.time().'.'. $extention;

        //upload image
        //Php artisan storage:link  to create a link to public folder
        $path =  $request->file('cover_image')->storeAs('public/album_covers', $filenametoStore);

        //Create the album to db
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenametoStore;
        $album->save();

        return \redirect('/albums')->with('success', 'Album Created');
    }


    public function show($id){
        $album = Album::with('photos')->find($id);
        return \view('albums.show', ['album' => $album]);
    }
}
