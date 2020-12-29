@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row justify-content-center" >
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							SidBar
						</div>
						<div class="col-md-8">
							<div class="d-flex flex-row justify-content-between align-items-center border-bottom-pb1">
								<h3 class="text-secoundry">
									<i class="fas fa-th-list"></i> Tables
								</h3>
								<a href="{{ url('/Tables/create') }}" class="btn btn-primary">
									<i class="fas fa-plus fa-x"></i> 
								</a>
							</div>
						</div>
					</div>
					<table class="table table-hover table-responsive-sm">
								<thead>
									<tr>
									<th>ID</th>
									<th>Nom</th>
									<th>Disponible</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($tables as $table)
									<tr>
										<td>
										{{$table->id}}
									</td>
									<td>
										{{$table->name}}
									</td>
									<td>
										@if($table->status)
										<span class="badge badge-success">
											OUI
										</span>
										@else
										<span class="badge badge-danger">
											NON
										</span>
										@endif
									</td>
									<td>
										<div class="row mr-4">
										<a href="{{ url('/Tables/edit/'.$table->id) }}"  
										class="btn btn-warning"><i class="fas fa-edit"></i></a>

									<form id="{{$table->id}}" action= "{{url('/Tables/delete/'.$table->id)}}"  method="post"> 
										@csrf
										@method("get")
											<button 
											onclick="
											event.preventDefault();
									if(confirm('Voulez vous supprimer la table {{$table->id}} ?'))
												document.getElementById({{$table->id}}).submit()	
											"  
											class="btn btn-danger">
											<i class="fas fa-trash"></i>
											</button>
										</form>
										</div>
										
									</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection