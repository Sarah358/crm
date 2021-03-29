@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
       


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

    {{-- card for assigned leads --}}
    <div class="card mt-3">
        <div class="card-header">Assigned Leads</div>
      <div class="card-body mb-2">
     {{-- display assigned leads --}}
     @foreach ($assigned_leads as $lead)
     <h3>{{$lead->name}}</h3>
     <div class="row">
         <div class="col-sm-6">
             <h5>{{$lead->phone}}</h5>
             <h5>{{$lead->email}}</h5>

         </div>
         <div class="col-sm-6">
            <h5>{{$lead->address}}</h5>
            <h5>{{$lead->city . ','. $lead->county}}</h5>

        </div>
     </div>
     <hr>
     @endforeach
     
      </div>
    </div>
    {{-- end card for assigned leads --}}
    </div>
</div>
@endsection
