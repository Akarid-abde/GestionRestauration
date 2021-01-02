@if($errors->all())
@foreach($errors->all() as $error)
  <div class="alert alert-danger">
  	{{ $error }}
  </div>
@endforeach

@if(session()->has("success"))
<div class="alert alert-success alert-dismissible fade show">
	<strong>{{ session()->get('success')}}</strong>
	<button type="button" data-dismiss="alert" class="close">
		<span class="badge badge-success">&time;</span>
	</button>
</div>
@endif
@if(session()->has("warning"))
<div class="alert alert-success alert-dismissible fade show">
	<strong>{{ session()->get('warning')}}</strong>
	<button type="button" data-dismiss="alert" class="close">
		<span class="badge badge-success">&time;</span>
	</button>
</div>
@endif
@if(session()->has("info"))
<div class="alert alert-success alert-dismissible fade show">
	<strong>{{ session()->get('info')}}</strong>
	<button type="button" data-dismiss="alert" class="close">
		<span class="badge badge-success">&time;</span>
	</button>
</div>
@endif
@endif