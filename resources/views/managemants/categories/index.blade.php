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
										<a href="{{ url('/edit/'.$category->id) }}"  
										class="btn btn-warning"><i class="fas fa-edit"></i>edit</a>
										<a href="{{url('/delete/'.$category->id)}}" class="btn btn-danger">Delete</a>
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