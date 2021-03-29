@extends('admin.layouts.app')
@section('content')
{{-- displaying success message --}}
@if (session('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        {{session('success')}}
    </div>
@endif

{{-- displaying prospect deleted message --}}
@if (session('deleted'))
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
        {{session('deleted')}}
    </div>
@endif
{{-- dashboard row --}}
<div class="row">
  {{-- sidebar col --}}
  @component('admin.layouts.components.menu.sidebar')
        
  @endcomponent
  {{-- end sidebar col --}}
  {{-- colsm8 --}}
  <div class="col-sm-8 ">
    {{-- btn to add new prospect  --}}
    <div class="row">
      <div class="col-md-4">
        {{-- button to trigger modal --}}
      <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modelId" >
        Add New Prospect</button>
    </div>
    </div>
    {{-- end of btn to add new prospect --}}

    {{-- validation errors --}}
  @if (count($errors)>0)
  <div class="alert alert-danger mt-2">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
      <ul>
      @foreach ($errors->all() as $error)
         <li>{{$error}}</li> 
      @endforeach
  </ul>
  </div> 
  @endif 
      {{-- end validation errors --}}


   
    {{-- another row --}}
  <div class="row mt-3">

 {{-- loop through prospects --}}
 @foreach ($prospects as $prospect)
    {{-- card col --}}
    <div class="col-sm-6 mb-2">
      <a href="{{route('admin.prospect',['id'=>$prospect->id])}}" style="text-decoration: none; color:black">
  {{-- card --}}
  <div class="card p-3">
    <div class="card-header">
      {{$prospect->name}}
    </div>
    <div class="card-body">
     <h5>{{$prospect->phone}}</h5>
     <h5>{{$prospect->email}}</h5>
    </div>
  </div>
  {{-- end card --}}
</a>
    </div>
    {{-- end card col --}}
    @endforeach
    {{-- end foreach --}}
    
   

    {{-- end another row --}}
  </div>

   {{-- pagination row --}}
   <div class="row">
    <div class="col-md-6 offset-md-4">
      {{$prospects->links()}}
    </div>
      </div>
      {{-- end pagination row --}}
  {{-- end colsm8 --}}
</div>

</div>
{{-- end dashboard row --}}

    
@endsection

{{-- modal --}}


<!-- Modal -->
<div class="modal" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Enter Prospects Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
          </div>
<div class="modal-body">
{{-- form --}}
<form action="{{route('admin.prospect.store')}}" method="POST">
      @csrf
      {{-- form group name --}}
      <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" id="" class="form-control">
      </div>
      {{-- close form group name --}}

      {{-- form group email --}}
      <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="" class="form-control">
          </div>
          {{-- close form group email --}}

          {{-- form group phone --}}
      <div class="form-group">
          <label for="phone">Phonenumber:</label>
          <input type="number" name="phone" id="" class="form-control">
          </div>
          {{-- close form group phone --}}

          {{-- form group phone_2 --}}
      <div class="form-group">
          <label for="phone_2">Optional Phonenumber:</label>
          <input type="number" name="phone_2" id="" class="form-control">
          </div>
          {{-- close form group phone_2 --}}

          {{-- form group address --}}
      <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" name="address" id="" class="form-control">
          </div>
          {{-- close form group address --}}

          {{-- form group city --}}
      <div class="form-group">
          <label for="city">City:</label>
          <input type="text" name="city" id="" class="form-control">
          </div>
          {{-- close form group city --}}

          {{-- form group county --}}
      <div class="form-group">
          <label for="county">County:</label>
          <input type="text" name="county" id="" class="form-control">
          </div>
          {{-- close form group county --}}

          {{-- form group country --}}
      <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" name="country" id="" class="form-control">
          </div>
          {{-- close form group country --}}

          {{-- form group note --}}
      <div class="form-group">
          <label for="note">Note:</label>
          <textarea name="note" id="" cols="15" rows="5" class="form-control"></textarea>
          </div>
          {{-- close form group note --}}

          {{-- form group assigned --}}
      <div class="form-group">
          <label for="assigned">Assigned_to:</label>
          <select name="assigned" id="" class="form-control">
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
                  
              @endforeach
          </select>
          </div>
          {{-- end form group assigned --}}
          {{-- submit button--}}
          
          <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
          {{-- end submit button  --}}

  </form>
  {{-- end form --}}

  </div>
        
      </div>
  </div>
</div>