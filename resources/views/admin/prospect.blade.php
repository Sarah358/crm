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
            <h5>Assigned-To:  {{$assigned_to}}</h5>
            <h5>Date Assigned:  {{$prospect->date_assigned}}</h5>

           </div>
           <div class="card-footer">
             <!-- Button trigger modal for edit -->
    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
      EDIT
    </button>
    {{-- delete a users --}}
   {{-- delete user button --}}
    <button type="button" class="btn btn-danger btn-md float-right" data-toggle="modal" data-target="#exampleModal">
        DELETE
      </button>
      {{-- modal for delete --}}
<div class="modal fade modal-md" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete {{$prospect->name}}  </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
    <div class="modal-body">
        {{-- FORM FOR DELETE --}}
        <form action="{{route('admin.prospect.delete',$prospect->id)}}" method="POST">
            @csrf
            @method('DELETE')
    <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">CANCEL</button>
    <button type="submit" class="btn btn-danger float-right">DELETE</button>
        </form>
       {{-- end form for delete --}}
    </div>
    
    </div>
</div>
</div>
{{-- end modal for delete --}}
           </div>
           {{-- end card footer --}}
         </div>
     </div>
</div>
{{-- end dashboard row --}}
    
@endsection

{{-- modal for edit --}}
<!-- Modal -->
<div class="modal " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Edit The details for {{$prospect->name}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  {{-- form --}}
  
  <form action="{{route('admin.prospect.update')}}" method="POST">
      @csrf
      {{-- method to be put --}}
      @method('PUT')
      {{-- input users id --}}
      <input type="text" name="id" value="{{$prospect->id}}" hidden>
  {{-- form group name --}}
  <div class="form-group mt-3">
   <label for="name">Name:</label>
   <input type="text" class="form-control " name="name" value="{{$prospect->name}}" >
  {{-- displaying validation errors --}}
 
  </div>
  
  {{-- close form group name --}}
   {{-- form group email --}}
   <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" value="{{$prospect->email}}">
   
  </div>
     {{-- close form group email --}}


  {{-- form group phone --}}
  <div class="form-group">
    <label for="phone">Phonenumber:</label>
    <input type="number" name="phone" id="" class="form-control" value="{{$prospect->phone}}" >
    </div>
    {{-- close form group phone --}}

    {{-- form group phone_2 --}}
<div class="form-group">
    <label for="phone_2">Optional Phonenumber:</label>
    <input type="number" name="phone_2" id="" class="form-control" value="{{$prospect->phone_2}}">
    </div>
    {{-- close form group phone_2 --}}

    {{-- form group address --}}
<div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" id="" class="form-control" value="{{$prospect->address}}">
    </div>
    {{-- close form group address --}}

    {{-- form group city --}}
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" name="city" id="" class="form-control" value="{{$prospect->city}}">
    </div>
    {{-- close form group city --}}

    {{-- form group county --}}
<div class="form-group">
    <label for="county">County:</label>
    <input type="text" name="county" id="" class="form-control" value="{{$prospect->county}}">
    </div>
    {{-- close form group county --}}

    {{-- form group country --}}
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" name="country" id="" class="form-control" value="{{$prospect->country}}">
    </div>
    {{-- close form group country --}}

    {{-- form group note --}}
<div class="form-group">
    <label for="note">Note:</label>
    <textarea name="note" id="" cols="15" rows="5" class="form-control">{{$prospect->note}}</textarea>
    </div>
    {{-- close form group note --}}



{{-- submit  --}}
<div class="modal-footer justify-content-center">
  <button type="submit" class="btn btn-primary btn-block">Update Prospect Details</button>

</div>
  </form>
  
</div>

      </div>
  </div>
</div>