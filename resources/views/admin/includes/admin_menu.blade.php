@php
$modules = \App\Models\Module::all();
@endphp
<div class="sidebar-sticky">
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link {{ \Route::current()->getName() == 'admin.home' ? 'active' : '' }}" href="{{route('admin.home')}}">
			  <i class="fas fa-tachometer-alt"></i>
			  Dashboard
			</a>
		</li>
		@if(auth()->user()->isAdmin() == 'administrator')
			<li class="nav-item">
				<a class="nav-link {{ \Route::current()->getName() == 'admin.settings.index' ? 'active' : '' }}" href="{{route('admin.settings.index')}}">
				  <i class="fas fa-cogs"></i>
				  Setting
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{ \Route::current()->getName() == 'admin.modules.index' ? 'active' : '' }}" href="{{route('admin.modules.index')}}">
				  <i class="fas fa-users-cog"></i>
				  Modules
				</a>
			</li>
		@endif
		@foreach($modules as $module)
			@if(auth()->user()->isAdmin() && auth()->user()->hasModuleAllow($module->slug))
				<li class="nav-item">
					<a class="nav-link {{ \Route::current()->getName() == $module->route ? 'active' : '' }}" href="{{route($module->route)}}">
					  <i class="{{$module->icon}}"></i>
					  {{$module->display_name}}
					</a>
				</li>
			@endif	
		@endforeach
	</ul>

	@if(auth()->user()->isAdmin() == 'administrator')
		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
			<span>Trash</span>
			<a class="d-flex align-items-center text-muted" href="#">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
			</a>
		</h6>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link" href="{{route('admin.trashed.modules.index')}}">
				  <i class="fas fa-cogs"></i>
				  Modules
				</a>
			</li>
			@foreach($modules as $module)
				@if( auth()->user()->hasModuleAllow($module->slug) && $module->trash == 1 && $module->trash_route)
					<li class="nav-item">
						<a class="nav-link" href="{{route($module->trash_route)}}">
						  <i class="{{$module->icon}}"></i>
						  {{$module->display_name}}
						</a>
					</li>
				@endif
			@endforeach
		</ul>
	@endif

</div>