{{-- openning form --}}
<form action="{{route('admin.users.store')}}" method="post">
    @csrf
    {{-- form group name --}}
    <div class="form-group">
     <label for="name">New User name:</label>
     <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name">
    {{-- displaying validation errors --}}
    @if ($errors->has('name'))
    <div class="invalid-feedback">
         {{$errors->first('name')}}
    </div>
        
    @endif
    </div>
    
    {{-- close form group name --}}

    {{-- form group email --}}
    <div class="form-group">
        <label for="email">New User email:</label>
        <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"name="email">
    {{-- displaying validation errors --}}
    @if ($errors->has('email'))
    <div class="invalid-feedback">
         {{$errors->first('email')}}
    </div>
        
    @endif  
    </div>
       {{-- close form group email --}}

       {{-- form group role --}}
    <div class="form-group">
        <label for="role">Select New User Role:</label>
        <select name="role" class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}">
            <option value="user" default>User</option>
            <option value="admin">Admin</option>

        </select>
    {{-- displaying validation errors --}}
    @if ($errors->has('role'))
    <div class="invalid-feedback">
         {{$errors->first('role')}}
    </div>
        
    @endif  
    </div>
       {{-- close form group role --}}

       {{-- form group password --}}
    <div class="form-group">
        <label for="password">Enter New User Temporary Password:</label>
        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password">
    {{-- displaying validation errors --}}
    @if ($errors->has('password'))
    <div class="invalid-feedback">
         {{$errors->first('password')}}
    </div>
        
    @endif  
    </div>
       {{-- close form group password--}}

        {{-- form group confirm password --}}
    <div class="form-group">
        <label for="password">Confirm New User Temporary Password:</label>
        <input type="password" class="form-control {{$errors->has('confirm_password') ? 'is-invalid' : ''}}" name="password">
    {{-- displaying validation errors --}}
    @if ($errors->has('confirm_password'))
    <div class="invalid-feedback">
         {{$errors->first('confirm_password')}}
    </div>
        
    @endif 
    </div>
       {{-- close form group confirm password--}}

       {{-- submit button --}}
    <button type="submit" class="btn btn-block btn-primary" id="show_new_user_form">Add New User</button>



</form>
{{-- closing form --}}
