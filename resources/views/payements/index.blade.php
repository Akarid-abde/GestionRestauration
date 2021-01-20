@extends('layouts.app')


@section('content')

<div class="container">
<form action="url('sales.store')}}" method="post">
	@csrf
	<div class="row justify-content-center" >
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="form-group">
					<a href="/home" class="btn btn-outline-secondary">
						<i class="fa fa-chevron-left fa-2x"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="my-2 col-md-3">
				<h3 class="text-muted border-bottom">
					{{Carbon\Carbon::now()}}
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="form-group">
					<a href="{{ url('sales.index')}}" class="btn btn-outline-secondary float-right">
						Tous Les Ventes
					</a>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					@foreach($tables as $table)
					<div class="col-md-3">
						<div 
						class="card p-2 mb-2 flex flex-column justify-content-center align-items-center list-group-item-action">
						<div class="align-self-end">
							<input type="checkbox" name="table_id[]" 
							id="table"
							value="{{ $table->id }}" 
							>
						</div> 
						<i class="fa fa-chair fa-5x"></i>
						<span class="mt-2 text-muted font-weight-bold">
							{{ $table->name }}
						</span>
					<div class="d-flex flex-column justify-content-between align-items-center">
					<a href="{{ url('/Tables/edit/'.$table->id) }}" class="btn btn-outline-warning float-right">
						<i class="fa fa-edit"></i>
					</a>
				     </div>
						</div>    
					</div>
					@endforeach
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</form>



@endsection