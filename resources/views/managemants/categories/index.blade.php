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
									<i class="fas fa-th-list"></i> Categories
								</h3>
								<a href="{{ url('/create') }}" class="btn btn-primary">
									<i class="fas fa-plus fa-x"></i> 
								</a>
							</div>
						</div>
					</div>
					<table class="table table-hover table-responsive-sm">
								<thead>
									<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach($categories as $category)
									<tr>
										<td>
										{{$category->id}}
									</td>
									<td>
										{{$category->title}}
									</td>
									<td>
										<div class="row mr-4">
												<a href="{{ url('/edit/'.$category->id) }}"  
										class="btn btn-warning"><i class="fas fa-edit"></i></a>

									<form id="{{$category->id}}" action= "{{url('/delete/'.$category->id)}}"  method="post"> 
										@csrf
										@method("get")
											<button 
											onclick="
											event.preventDefault();
											if(confirm('Voulez vous supprimer la categories {{$category->id}} ?'))
												document.getElementById({{$category->id}}).submit()	
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