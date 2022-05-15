@extends('layouts.master')


@section('title')
    Home
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
                    <h4 class="card-title"> Users Table</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th class="text-center">Number</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($users as $user)
                                @php $i++; @endphp
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
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
