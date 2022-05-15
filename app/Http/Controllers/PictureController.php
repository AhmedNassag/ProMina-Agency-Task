<?php

namespace App\Http\Controllers;

use App\Album;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{

    public function index()
    {
        $pictures =Picture::all();
        return view('pictures.index')->with('pictures',$pictures);
    }


    public function create()
    {
        $albums = Album::all();
        return view('pictures.add')->with('albums',$albums);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name'  => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name      = time().'.'.$file_extension;
        $path           = 'img';
        $request->image->move($path,$file_name);
        $picture = Picture::create
        ([
            'name'     => $request->name,
            'image'    => $file_name,
            'album_id' => $request->album_id,
        ]);
        if ($picture)
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Your Data Added Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }


    public function edit($id)
    {
        $picture = Picture::findOrFail($id);
        $albums  = Album::all();
        if(! $picture)
        {
            return redirect()->back();
        }
        return view('pictures.edit',compact('picture','albums'));
    }


    public function update(Request $request, $id)
    {
        $picture = Picture::findOrFail($id);
        if(! $picture)
        {
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name      = time().'.'.$file_extension;
        $path           = 'img';
        $request->image->move($path,$file_name);

        $picture->name     = $request->name;
        $picture->image    = $file_name;
        $picture->album_id = $request->album_id;
        $picture->update();
        if ($picture)
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Your Data Updated Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);
        $picture ->delete();
        if ($picture)
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Your Data Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/pictures')->with
            ([
                'message'    => 'Something Was Wrong',
                'alert-type' => 'danger'
            ]);
        }
    }
}
