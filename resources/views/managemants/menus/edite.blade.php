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
							<i class="fas fa-plus"></i>Modifier le Menu {{$menus->title}}
								</h3>
							<form action="{{ url('/Menu/update/'.$menus->id) }}" method="post">
								<input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                                <div class="form-group">
                                	<label>Category_ID</label>
									<input 
									type="text"  
									id="category_id" 
									name="category_id"
									value="{{ $menus->category_id }}" 
									class="form-control" 
									placeholder="category_id" 
									disabled="true" 
									>
								</div>
							<div class="form-group">
									<input 
									type="text"  
									id="title" 
									name="title"
									value="{{ $menus->title }}" 
									class="form-control" 
									placeholder="Title" 
									>
								</div>
								<div class="input-group  mb-3">
									<textarea
									id="description" 
									name="description"
									rows="5" cols="50"
									class="form-control" 
									>	
									{{$menus->description}}
									</textarea> 
								</div>
								<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										$
									</div>
									</div>
									<input 
									type="Number"  
									id="price" 
									name="price"
									value="{{$menus->price}}"  
									class="form-control" 
									placeholder="Prix"
									>
									<div class="input-group-append">
									<div class="input-group-text">
										.00									
									</div>
									</div>
								</div>
								<div class="my-2">
									<img 
									src="{{asset('images/menus/'.$menus->image)}}"
									width="200" height="200" 
									class="mg-8" 
									alt="{{$menus->title}}">
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
									placeholder="Image">
									<label class="custom-file-label">
										2mg max
									</label>
									</div>
								</div>
								<div class="form-group">
									<select name="category_id"  id="category_id" class="form-control">
										@foreach($categories as $category)
										<option value="{{$category->id}}"
										<?php if ($category->id == $menus->category->id): ?>
												selected='true'
											<?php endif ?>
										>
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