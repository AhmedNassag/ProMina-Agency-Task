@extends('layouts.master')


@section('title')
    Pictures
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-dismissible alert-{{ session('alert-type') }} alert-styled-left alert-arrow-left" id="session-alert">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Pictures Table</h4>
                    <a href="{{url('picture-create')}}"class="btn btn-md float-right" style="background-color:#FA7347">Add New Picture</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th class="text-center">Number</th>
                                <th class="text-center">Picture Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Album</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($pictures as $picture)
                                @php $i++; @endphp
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">{{$picture->name}}</td>
                                    <td class="text-center">
                                        <img src="{{asset('img/'.$picture->image)}}" width="50px" height="50px" alt="{{$picture->name}}">
                                    </td class="text-center">
                                    <td class="text-center">{{$picture->album->name}}</td>
                                    <td class="text-center">
                                        <a href="{{url('picture-edit/'.$picture->id)}}" class="btn btn-info btn-sm">EDIT</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('picture-delete/'.$picture->id)}}" class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
