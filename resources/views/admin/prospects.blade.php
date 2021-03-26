@extends('admin.layouts.app')
@section('content')
{{-- dashboard row --}}
<div class="row">
  {{-- sidebar col --}}
  @component('admin.layouts.components.menu.sidebar')
        
  @endcomponent
  {{-- end sidebar col --}}
  {{-- colsm8 --}}
  <div class="col-sm-8 ">
    {{-- another row --}}
  <div class="row">
 {{-- loop through prospects --}}
 @foreach ($prospects as $prospect)
    {{-- card col --}}
    <div class="col-sm-6 mb-2">
      <a href="{{route('admin.prospect',['id'=>$prospect->id])}}" style="text-decoration: none; color:black">
  {{-- card --}}
  <div class="card">
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
