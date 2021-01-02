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
									<i class="fas fa-plus"></i>Ajouter Une Menu
								</h3>
							<form action=" {{url('/Menu/store') }} " method="post" 
							enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<input 
									type="text"  id="title" 
									name="title"
									class="form-control" 
									placeholder="Title" 
									value="{{ old('title') }}"
									>
								</div>
								<div class="input-group  mb-3">
									<textarea
									 id="description" 
									name="description"
									rows="5" cols="50"
									class="form-control"
									>	
									{{ old('description') }}
									</textarea> 
								</div>
								<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										$
									</div>
									</div>
									<input 
									type="Number"  id="price" 
									name="price"
									class="form-control" 
									placeholder="Prix"
									value="{{ old('price') }}"
									>
									<div class="input-group-append">
									<div class="input-group-text">
										.00									
									</div>
									</div>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										Image
									</div>
									</div>
									<div class="custom-file">
									<input 
									type="file"  
									id="image" 
									name="image"
									class="custom-file-input" 
									placeholder="Image"
									>
									<label class="custom-file-label">
										2mg max
									</label>
									</div>
								</div>
								<div class="form-group">
									<select name="category_id"  id="category_id" class="form-control">
									<option disabled="true" selected="true">Choisir Une Categorie</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}">
											{{$category->title}}
										</option>
										@endforeach
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
