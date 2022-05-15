@extends('layouts.master')


@section('title')
    Albums
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
                    <h4 class="card-title"> Albums Table</h4>
                    <a href="{{url('album-create')}}"class="btn btn-md float-right" style="background-color:#FA7347">Add New Album</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th class="text-center">Number</th>
                                <th class="text-center">Album Name</th>
                                <th class="text-center">Pictures Count</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Move Pictures Before</th>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($albums as $album)
                                @php $i++; @endphp
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">{{$album->name}}</td>
                                    <td class="text-center">{{$album->pictures->count()}}</td>
                                    <td class="text-center">
                                        <a href="{{url('album-edit/'.$album->id)}}" class="btn btn-info btn-sm">EDIT</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('album-delete/'.$album->id)}}" class="btn btn-danger btn-sm">DELETE</a>
                                    </td>


                                    <?php
                                        if($album->pictures->count() > 0)
                                        {

                                    ?>

                                            <td class="text-center">
                                                <form action="/album-move/{{$album->id}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="name" value="{{$album->name}}">
                                                    <input type="hidden" name="image" value="{{$album->image}}">
                                                    <select name="album_id" class="form-control">
                                                        @foreach($albums as $album)
                                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-danger btn-sm">Move And Delete</button>
                                                </form>
                                            </td>

                                    <?php
                                        }

                                        ?>
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
