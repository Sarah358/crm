@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- card --}}
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
    {{-- end card --}}

    {{-- display of a user details --}}
    <div class="card mt-3">
        <div class="card-header">Welcome {{Auth::user()->name}}</div>
        <div class="card-body">
          <h5>Name: {{Auth::user()->name}}</h5>
          <h5>Email: {{Auth::user()->email}}</h5>
          <h5> Role: {{Auth::user()->role}}</h5>
        </div>
    </div>
    {{-- end card for user details --}}
    </div>
</div>
@endsection
