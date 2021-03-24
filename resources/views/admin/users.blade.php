@extends('admin.layouts.app')
@section('content')
{{-- displaying success message --}}
@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
{{-- displaying user deleted message --}}
@if (session('deleted'))
    <div class="alert alert-success">
        {{session('deleted')}}
    </div>
@endif


{{-- dashboard row --}}
    <div class="row">

       {{-- validation errors
      @if ($errors)
          {{$errors}}
      @endif --}}
      {{-- end validation errors --}}

        {{-- sidebar col --}}
    @component('admin.layouts.components.menu.sidebar')
        
    @endcomponent
    {{-- end sidebar col --}}
   
    {{-- col-sm-5 form component --}}
    <div class="col-sm-5">
        {{-- card --}}
        <div class="card">
        <div class="card-body">
    <button type="submit" class="btn btn-block btn-primary" id="show_new_user_form">Add New User</button>
    
    @component('admin.layouts.components.forms.add_user')
         
    @endcomponent
          </div>
        </div>
        {{-- end card --}}
    
    </div>
    {{-- end col-sm-5 form component --}}

    {{-- displaying users created --}}
<div class="col-sm-3">
<div class="card">
  <div class="card-header">
    Current Users
  </div>
  <ul class="list-group list-group-flush">
   {{-- if users exist, execute a foreach loop --}}
   @if ($users)
   @foreach ($users as $user)
   <li class="list-group-item"> <a href="{{route('admin.user',['id' => $user->id ]) }}">{{$user->name}}</a></li>  {{--adding link to single user--}}
       
   @endforeach
       
   @endif
      
  </ul>
</div>    
</div>    
    
    {{-- end of displaying users created --}}
</div>
    {{-- end dashboard row --}}
@endsection

{{-- pushing scripts --}}
@push('admin.layouts.scripts.scripts')

{{-- custom.js --}}
<script src="{{asset('js/custom.js')}}" defer></script>
    
@endpush