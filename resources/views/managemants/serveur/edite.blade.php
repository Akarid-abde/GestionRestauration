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
								<h3 class="text-secoundry border-bottom mb-3 p-2">
									<i class="fas fa-plus"></i>Modifier  Serveur {{$serveur->name}}
								</h3>
							<form action=" {{url('/Servant/update/'.$serveur->id) }} " method="post">
								<input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
								<div class="form-group">
									<input 
									type="text"  
									id="name" 
									name="name"
									value="{{$serveur->name}}" 
									class="form-control" 
									placeholder="Nom" 
									>
								</div>
									<div class="form-group">
									<input 
									type="text"  
									id="address" 
									name="address"
									value="{{$serveur->address}}" 
									class="form-control" 
									placeholder="Address" 
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