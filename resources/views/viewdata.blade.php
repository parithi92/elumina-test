@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <!-- {{ session('status') }} -->
                        </div>
                     123
                            {{ Auth::user()->first_name()}}
                           
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td>
                    <button><a href="{{route('viewStatus', $user->id)}}">Update Status</a></button>
                    <button><a href="{{route('viewRole', $user->id)}}">Change Role</a></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
