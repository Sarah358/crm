@extends('admin.layouts.app')
@section('content')
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
    </div>
    {{-- end dashboard row --}}
@endsection