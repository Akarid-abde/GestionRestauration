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
							<div class="d-flex flex-row justify-content-between align-items-center border-bottom-pb1">
								<h3 class="text-secoundry">
									<i class="fas fa-user-cog"></i> Sérveurs
								</h3>
								<a href="{{ url('/Servant/create') }}" class="btn btn-primary">
									<i class="fas fa-plus fa-x"></i> 
								</a>
							</div>
						
					<table class="table table-hover table-responsive-sm">
								<thead>
									<tr>
									<th>ID</th>
									<th>Nom et Prenom</th>
									<th>address</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($serveurs as $serveur)
									<tr>
										<td>
										{{$serveur->id}}
									</td>
									<td>
										{{$serveur->name}}
									</td>
									<td>
										@if($serveur->address)
										{{$serveur->address}}
										@else
										<span class="text-danger">  
											Non Disponible
										</span>
										@endif
									</td>
									<td>
										<div class="row mr-4">
												<a href="{{ url('/Servant/edit/'.$serveur->id) }}"  
										class="btn btn-warning"><i class="fas fa-edit"></i></a>

									<form id="{{$serveur->id}}" action= "{{url('/Servant/delete/'.$serveur->id)}}"  method="post"> 
										@csrf
										@method("get")
											<button 
											onclick="
											event.preventDefault();
											if(confirm('Voulez vous supprimer la servaur {{$serveur->id}} ?'))
												document.getElementById({{$serveur->id}}).submit()	
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

	</div>
</div>


@endsection