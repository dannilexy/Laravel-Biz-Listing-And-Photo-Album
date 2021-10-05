<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id){
        return \view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request){
        $this->validate($request, [
           'title'=> 'required',
           //'photo' => 'image|max:1999'
        ]);

        //Getting files original name
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();

        //Getting file name without extension
        $filename = \pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Getting file extension
         $extention = $request->file('photo')->getClientOriginalExtension();

         //Create new file name
         $filenametoStore = $filename.'_'.time().'.'. $extention;

        //upload image
        //Php artisan storage:link  to create a link to public folder
        $path =  $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenametoStore);

        //Create the album to db
        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->album_id = $request->input('album_id');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->description = $request->input('description');
        $photo->photo = $filenametoStore;
        $photo->save();

        return \redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }


    public function show($id){
        $photo = Photo::find($id);
        return \view('photos.show',['photo' =>  $photo ]);
    }


    public function destroy($id){
        $photo = Photo::find($id);
        if (Storage::delete('/public/photos/'.$photo->album_id.'/'.$photo->photo)) {
            # code...
            $photo->delete();

            return \redirect('/albums/'.$photo->album_id)->with('success', 'photo deleted');
        }
    }
}
