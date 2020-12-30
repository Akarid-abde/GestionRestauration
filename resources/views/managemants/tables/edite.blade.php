@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row justify-content-center" >
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							@include('layouts.sidbar')
						</div>
						<div class="col-md-8">
								<h3 class="text-secoundry border-bottom mb-3 p-2">
									<i class="fas fa-plus"></i>Modifier la Table 
									{{$table->name}}
								</h3>
							<form action=" {{url('/Tables/update/'.$table->id) }} " method="post">
								<input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
								<div class="form-group">
									<input 
									type="text"  
									id="name" 
									name="name"
									value="{{$table->name}}" 
									class="form-control" 
									placeholder="Nom" 
									>
								</div>
								<label> 
                                 		@if($table->status)
										<span class="badge badge-success">
											Disponible
										</span>
										@else
										<span class="badge badge-danger">
											Non Disponible
										</span>
										@endif
								</label>
								<div class="form-group">
									<select name="status" class="form-control">
										<option value="" selected="true" disabled="true">
											Disponible
										</option>
										<option value="1">OUI</option>
										<option value="0">NON</option>
									</select>
								</div>
								<div class="form-group">
									<button class="btn btn-primary" style="border-radius:15px;">
									Valider
								    </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection