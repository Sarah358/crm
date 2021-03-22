@extends('admin.layouts.app')
@section('content')
{{-- dashboard row --}}
    <div class="row">
        {{-- sidebar col --}}
    @component('admin.layouts.components.menu.sidebar')
        
    @endcomponent
    {{-- end sidebar col --}}

    {{-- col-md 9  --}}
    <div class="col-md-9">
        {{-- row leaderboard --}}
   <div class="row">
       {{-- col 1 --}}
<div class="col-sm-3">
    {{-- card --}}
<div class="card text-left">
  <div class="card-header">Active Employees</div>
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="card-text">Body</p>
  </div>
</div>
{{-- end card --}}
</div>
{{-- end col 1 --}}

   {{-- col 2 --}}
   <div class="col-sm-3">
    {{-- card --}}
<div class="card text-left">
  <div class="card-header">Current-sales leader</div>
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="card-text">Body</p>
  </div>
</div>
{{-- end card --}}
</div>
{{-- end col 2 --}}

   {{-- col 3 --}}
   <div class="col-sm-3">
    {{-- card --}}
<div class="card text-left">
  <div class="card-header">Sales for Month</div>
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="card-text">Body</p>
  </div>
</div>
{{-- end card --}}
</div>
{{-- end col 3 --}}

   {{-- col  4--}}
   <div class="col-sm-3">
    {{-- card --}}
<div class="card text-left">
  <div class="card-header">Total sales value</div>
  <div class="card-body">
    <h4 class="card-title">Title</h4>
    <p class="card-text">Body</p>
  </div>
</div>
{{-- end card --}}
</div>
{{-- end col 4--}}

   </div>
   {{-- end row leaderboard --}}

    {{-- div row --}}
    <div class="row mt-4">
        {{-- col-5 --}}
        <div class="col-sm-5">
                {{-- card --}}
<div class="card text-left">
    <div class="card-header">Unassigned prospects</div>
    <ul class="list-group list-group-flush">
        @for ($i = 0; $i < 6; $i++)
        <li class="list-group-item">
            Mr Prospect<span class="float-right btn btn-sm btn-success">Assign</span>
        </li>
        @endfor
        <li class=" list-group-item ">
            <a href="" class="btn btn-block btn-md btn-primary">View all unassigned Leads</a>
        </li>
    </ul>
  </div>
  {{-- end card --}}
    
        </div>
        {{-- end col-5 --}}

            {{-- col-7 --}}
            <div class="col-sm-7">
                {{-- card --}}
<div class="card text-left">
<div class="card-header">Recent Estimates</div>
<ul class="list-group list-group-flush">
    @for ($i = 0; $i < 6; $i++)
<li class="list-group-item">
    <div class="row">
        <div class="col-sm-3">Sarah</div>
        <div class="col-sm-4">June,5th 2020</div>
        <div class="col-sm-5">
            Value:5000
            <span class="float-right btn btn-sm btn-success">Assign</span></div>

    </div>
</li>
@endfor
<li class=" list-group-item ">
    <a href="" class="btn btn-block btn-md btn-primary">View all Leads</a>
</li>
    
    </ul>
  </div>
  {{-- end card --}}
    
        </div>
        {{-- end col-7--}}
    
    </div>
    {{-- end div row --}}

</div>
{{-- end col-md-9  --}}

    </div>
    {{-- end dashboard row --}}
@endsection