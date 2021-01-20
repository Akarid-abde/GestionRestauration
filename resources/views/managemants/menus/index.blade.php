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
									<i class="fas fa-clipboard-list"></i> Menu
								</h3>
								<a href="{{ url('/Menu/create') }}" class="btn btn-primary">
									<i class="fas fa-plus fa-x"></i> 
								</a>
							</div>
						</div>
					<table class="table table-hover table-responsive-sm">
								<thead>
									<tr>
									<th>ID</th>
									<th>title</th>
									<th>description</th>
									<th>price</th>
									<th>category_id</th>
									<th>image</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($menus as $menu)
									<tr>
										<td>
										{{$menu->id}}
									</td>
									<td>
										{{$menu->title}}
									</td>
										<td>
										{{ substr($menu->description,0,100)}}
									</td>
									
										<td>
										{{$menu->price}} DH
									</td>
									
										<td>
										{{$menu->category_id}}
									</td>
									<td>
										<img src="{{ asset('images/menus/'.$menu->image) }}" 
										alt="{{ $menu->title }}" style="border-radius: 10%" 
										width="60" height="60">
									</td>
								<!-- 	<td>
										@if($menu->image)
										<span class="badge badge-success">
											$menu->image
										</span>
										@else
										<span class="badge badge-danger">
											Pas Desponible
										</span>
										@endif
									</td> -->
									<td>
									<div class="row mr-4">
										<a href="{{ url('/Menu/edit/'.$menu->id) }}"  
										class="btn btn-warning">
										<i class="fas fa-edit"></i>
									    </a>

									<form 
									    id="{{$menu->id}}" 
										action= "{{url('/Menu/delete/'.$menu->id)}}"  
										method="post"> 
										@csrf
										@method("get")
											<button 
											onclick="
											event.preventDefault();
									if(confirm('Voulez vous supprimer la table {{$menu->id}} ?'))
												document.getElementById({{$menu->id}}).submit()	
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
							<div class="col-8 center mx-auto">
										{{ $menus->links() }}
							</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection