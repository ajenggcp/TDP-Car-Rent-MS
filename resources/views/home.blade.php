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
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h1>Hello <b>{{ Auth::user()->name }}</b> !</h1>
                    <h3>Welcome to Rent Car Management System.</h3>
                    
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
