@extends('admin.layouts.app')
@section('content')

{{-- dashboard row --}}
<div class="row">

{{-- sidebar col --}}
@component('admin.layouts.components.menu.sidebar')
    
@endcomponent
{{-- end sidebar col --}}
 {{-- col-sm-5  --}}
     <div class="col-sm-8 p-2">
         {{-- display a prospect --}}
         <div class="card text-left">
           <div class="card-header">Prospect Details</div>
           <div class="card-body">
            <h5>Name:  {{$prospect->name}}</h5>
            <h5>Email:  {{$prospect->email}}</h5>
            <h5>Phone:  {{$prospect->phone}}</h5>
            <h5>Phone-2:  {{$prospect->phone_2}}</h5>
            <h5>Address:  {{$prospect->address}}</h5>
            <h5>City:  {{$prospect->city}}</h5>
            <h5>County:  {{$prospect->county}}</h5>
            <h5>Country:  {{$prospect->country}}</h5>
            <h5>note:  {{$prospect->note}}</h5>
            <h5>IsClient:  {{$prospect->isClient ==1 ? 'True' : 'False'}}</h5>
            <h5>IsClaimable:  {{$prospect->isClaimable ==1 ? 'True' : 'False'}}</h5>
            <h5>Assigned-By:  {{$assigned_to}}</h5>
            <h5>Date Assigned:  {{$prospect->date_assigned}}</h5>











            


           </div>
         </div>
     </div>
</div>
{{-- end dashboard row --}}
    
@endsection