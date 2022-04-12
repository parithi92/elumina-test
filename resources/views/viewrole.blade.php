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
        <form method="POST" action="{{route('updateRole')}}">
            @csrf
            <label>First Name: {{$user[0]->first_name}}</label>
            <label>Last Name: {{$user[0]->last_name}}</label>
            <label>Email: {{$user[0]->email}}</label>
            <select  name="role"> 
                    <option {{ ($user[0]->is_admin==1)?'selected':''}} value="1">Admin</option>
                    <option {{ ($user[0]->is_admin==0)?'selected':''}} value="0">Customer</option>

            </select>
            <input type="hidden" name="id" value="{{$user[0]->id}}">
            <button type="submit">Update</button>
        </form> 
    </div>
</div>
@endsection
