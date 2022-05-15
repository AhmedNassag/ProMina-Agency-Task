<?php

namespace App\Http\Controllers;

use App\Album;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{

    public function index()
    {
        $albums =Album::all();
        return view('albums.index')->with('albums',$albums);
    }


    public function create()
    {
        return view('albums.add');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $album = Album::create
        ([
            'name' => $request->name,
        ]);
        if ($album)
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Your Data Added Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }


    public function edit($id)
    {
        $album = Album::findOrFail($id);
        if(! $album)
        {
            return redirect()->back();
        }
        return view('albums.edit')->with('album',$album);
    }


    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        if(! $album)
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $album->name = $request->name;
        $album->update();
        if ($album)
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Your Data Updated Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album ->delete();
        if ($album)
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Your Data Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function move(Request $request, $id)
    {
        $pictures = Picture::where('album_id',$id)->get();
        foreach($pictures as $picture)
        {
            $picture->album_id = $request->album_id;
            $picture->update();
        }
        if ($picture)
        {
            return redirect('/album-delete/'.$id)->with
            ([
                'message'    => 'Your Data Updated Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/albums')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }

}
