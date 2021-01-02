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
									<i class="fas fa-plus"></i>Ajouter Une Serveur
								</h3>
							<form action=" {{url('/Servant/store') }} " method="post">
								@csrf
								<div class="form-group">
									<input 
									type="text"  id="name" 
									name="name"
									class="form-control" 
									placeholder="Nom" 
									value="{{ old('name') }}"
									>
								</div>
								<div class="form-group">
									<input type="text" 
									name="address"
									class="form-control"
									placeholder="Address" 
									value="{{ old('address') }}"
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