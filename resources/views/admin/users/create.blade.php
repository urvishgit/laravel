@extends('../admin.layouts.admin')

@section('admin.content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            @if(!$editProfile)
                {{ isset($user)  ? 'Edit user' : 'Create user' }}
            @else
                Edit profile
            @endif 
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(!$editProfile)
                    <form class="p-4" name="user" id="user" method="POST" enctype="multipart/form-data" action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}">
                @else 
                    <form class="p-4" name="edit-profile" id="edit-profile" method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update-profile') }}">
                @endif

                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif


                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ isset ($user) ? $user->name : old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ isset ($user) ? $user->email : old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-group">
                        <label for="password">Password @if( auth()->user()->isadmin() !='administrator')*@endif</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="password_confirmation">Confirm password @if( auth()->user()->isadmin() !='administrator')*@endif</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" value="{{  old('password_confirmation') }}" autocomplete="new-password">
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="name">About</label>
                        <textarea class="form-control" row="10" id="about" name="about" placeholder="About">{{ isset ($user) ? $user->about : old('about')}}</textarea>
                    </div>
                    @error('about')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if( auth()->user()->isadmin() )
                        <div class="form-group">
                            <label for="role">Role*</label>
                            <select class="form-control" id="role" name="role">
                                <option value="">Select Role</option>
                                @if( auth()->user()->isadmin() == 'administrator')
                                    <option value="administrator" {{ isset ($user) && $user->role == 'administrator' ? 'selected': ''}}>{{ucfirst('administrator')}}</option>
                                @endif
                                @foreach($roles as $role)
                                    <option value="{{$role}}" {{ isset ($user) && $user->role == $role ? 'selected': ''}}>{{ucfirst($role)}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div id="user_module_permission" class="form-row {{ isset ($user) && $user->role != 'user' ? '' : 'd-none' }}">
                            <div class="form-group col-12 mb-0">
                                <label for="module_permission">Module permission</label>
                            </div>
                            <div class="form-group col-12 form-check-inline">
                                @foreach($modules as $module)
                                    <input class="form-check-input" type="checkbox" value="{{$module->id}}" name="modules[]" id="module_{{strtolower($module->display_name)}}" {{ isset ($user) && $user->hasModule($module->id) ? 'checked' : ''}}>
                                    <label class="form-check-label pr-2" for="module_{{strtolower($module->display_name)}}">{{$module->display_name}}</label>
                                @endforeach
                            </div>
                        </div>
                    @else 
                        @if(isset($user))
                            <input type="hidden" name="role" value="{{$user->role}}">
                        @endif
                    @endif


                    <div class="form-check">
                        @if ( old('status') == 1 )
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status"checked>
                        @else
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" {{ isset ($user) && $user->status == 1 ? 'checked' : '' }}>
                        @endif

                        <label class="form-check-label" for="status">Publish</label>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($user)  ? 'Edit user' : 'Add user' }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

