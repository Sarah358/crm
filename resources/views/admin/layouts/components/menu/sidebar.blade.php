<div class="col-md-3" id="wrapper">
<div class="bg-light border-right" id="sidebar-wrapper">
{{-- <div class="sidebar-heading">Menu </div> --}}
<div class="text-center">
    <img src="{{asset('img/sarai.jpg')}}" alt="" class="rounded-circle">
    <h5>{{Auth::user()->name}}</h5>
</div>
<div class="list-group list-group-flush">
    <a href="{{route('admin.users')}}" class="list-group-item list-group-item-action bg-light">Users</a>
    <a href="{{route('admin.prospects')}}" class="list-group-item list-group-item-action bg-light">Prospects</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
</div>
</div>
</div>