@extends('layouts.master')


@section('title')
    Edit Album
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Role For Registered</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                <form action="/album-update/{{$album->id}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label>Album Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$album->name}}">
                                            </div>
                                        <div class="col-md-12">
                                        <button type="submit" class="btn btn-md" style="background-color: #FA7347;">Update</button>
                                        <a href="/albums" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
