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
									<i class="fas fa-plus"></i>Modifier la Categories {{$category->title}}
								</h3>
							<form action=" {{url('/update/'.$category->id) }} " method="post">
								<input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
								<div class="form-group">
									<input 
									type="text"  
									id="title" 
									name="title"
									value="{{$category->title}}" 
									class="form-control" 
									placeholder="Title" 
									>
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