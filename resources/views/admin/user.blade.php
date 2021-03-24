@extends('admin.layouts.app')
@section('content')

{{-- dashboard row --}}
<div class="row">

{{-- sidebar col --}}
@component('admin.layouts.components.menu.sidebar')
    
@endcomponent
{{-- end sidebar col --}}

     {{-- col-sm-5 form  --}}
     <div class="col-sm-5">

        {{-- displaying success message --}}
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

  {{-- validation errors --}}
  @if (count($errors)>0)
  <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
         <li>{{$error}}</li> 
      @endforeach
  </ul>
  </div> 
  @endif 
      {{-- end validation errors --}}

      {{-- display of a user details --}}
         <div class="card">
           <div class="card-header">User Details</div>
           <div class="card-body">
             <h5>Name: {{$user->name}}</h5>
             <h5>Email: {{$user->email}}</h5>
             <h5> Role: {{$user->role}}</h5>
             <h5>Active: {{$user->isActive == 1 ? 'Yes' : 'No'}}</h5>  {{-- if the user is active show yes otherwise no--}}

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
    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete {{$user->name}} ?</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
    <div class="modal-body">
        {{-- FORM FOR DELETE --}}
        <form action="{{route('admin.user.delete',$user->id)}}" method="POST">
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
           {{-- end div card footer --}}
         </div>
         {{-- end div card --}}
     </div>
     {{-- end col-sm-5 --}}

</div>
{{-- end dashboard row --}}


<!-- Modal -->
<div class="modal " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title">Edit The details for {{$user->name}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
    {{-- form --}}
    
    <form action="{{route('admin.user.update')}}" method="POST">
        @csrf
        {{-- method to be put --}}
        @method('PUT')
        {{-- input users id --}}
        <input type="text" name="id" value="{{$user->id}}" hidden>
    {{-- form group name --}}
    <div class="form-group mt-3">
     <label for="name">User Name:</label>
     <input type="text" class="form-control " name="name" value="{{$user->name}}" >
    {{-- displaying validation errors --}}
   
    </div>
    
    {{-- close form group name --}}
     {{-- form group email --}}
     <div class="form-group">
        <label for="email">User Email:</label>
        <input type="text" class="form-control" name="email" value="{{$user->email}}">
     
    </div>
       {{-- close form group email --}}
       {{-- form group role --}}
    <div class="form-group">
        <label for="role">User Role:</label>
        <select name="role" class="form-control " >
            <option value="{{$user->role}}" >{{ ucfirst($user->role)}}</option>
            <option value="user" >User</option>
            <option value="admin">Admin</option>

        </select>
    {{-- displaying validation errors --}}
     
    </div>
       {{-- close form group role --}}

{{-- form group isActive --}}
<div class="form-group">
<label for="role">Is The User Active:</label>
<select name="isActive" class="form-control " >
    <option value="1" {{$user->isActive ==1 ? 'default' : ''}} >Yes</option>
    <option value="0" {{$user->isActive ==0 ? 'default' : ''}}>No</option>

</select>
{{-- displaying validation errors --}}
  
</div>
{{-- close form group isActive --}}

{{-- submit  --}}
<div class="modal-footer justify-content-center">
    <button type="submit" class="btn btn-primary btn-block">Update User Details</button>
  
</div>
    </form>
    
</div>

        </div>
    </div>
</div>



@endsection