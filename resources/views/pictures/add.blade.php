@extends('layouts.master')


@section('title')
    Add A New Picture
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add A New Picture</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="/picture-store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>Picture Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Picture Album</label>
                                    <select name="album_id" class="form-control">
                                        @foreach($albums as $album)
                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" placeholder="Upload Image">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-md" style="background-color: #FA7347;">SAVE</button>
                                <a href="/pictures" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
