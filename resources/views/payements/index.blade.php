@extends('layouts.app')


@section('content')

<div class="container">
<form action=" {{ url('/Salses/store') }} "  method="post" id="add-sale" >
	@csrf
	<div class="row justify-content-center" >
		<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="form-group">
					<a href="/home" class="btn btn-outline-secondary">
						<i class="fa fa-chevron-left fa-2x"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="my-2 col-md-3">
				<h3 class="text-muted border-bottom">
					{{Carbon\Carbon::now()}}
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-3">
				<div class="form-group">
					<a href="{{ url('sales.index')}}" class="btn btn-outline-secondary float-right">
						Tous Les Ventes
					</a>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					@foreach($tables as $table)
					<div class="col-md-3">
						<div 
						class="card p-2 mb-2 flex flex-column justify-content-center align-items-center list-group-item-action">
						<div class="align-self-end">
							<input 
							type="checkbox" 
							name="table_id[]" 
							id="table"
							value="{{ $table->id }}" 
							>
						</div> 
						<i class="fa fa-chair fa-5x"></i>
						<span class="mt-2 text-muted font-weight-bold">
							{{ $table->name }}
						</span>
						@if($table->status !=0)
						<span class="badge badge-success">
							Desponible
						</span>
						@else
						<span class="badge badge-danger">
							Non Desponible
						</span>
						@endif
					<div class="d-flex flex-column justify-content-between align-items-center">
					<a href="{{ url('/Tables/edit/'.$table->id) }}" class="btn btn-outline-warning float-right">
						<i class="fa fa-edit"></i>
					</a>
				     </div>
				     @foreach($table->sales as $sal)
<!-- 				     <h1>{{ $sal->created_at }}</h1>
				     <h1>{{ Carbon\Carbon::today() }}</h1> -->			     
				     @if($sal->created_at <= Carbon\Carbon::today())
				     <div style="border: dashed pink" class="mb-2 mt-2 shadow w-100" id="{{ $sal->id }}">
				     	<div class="card">
				     		<div class="card-body d-flex flex-column justify-content-center align-items-center">
				     			@foreach($sal->menus()->Where("sale_id",$sal->id)->get() as $men)
				     			<h5 class="font-weight-bold mt-2">
				     				{{$men->title}}
				     			</h5>
				     			<span class="text-muted">
				     				{{$men->price}} DH
				     			</span>
				     			@endforeach
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-danger">
				     				Serveur ID : {{ $sal->servant_id }}
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Qté  : {{ $sal->quantity }}
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Prix  : {{ $sal->total_price }} DH
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Total : {{ $sal->total_received }} DH
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Reste : {{ $sal->change }} DH
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Type de Payeiment : 
				 {{ $sal->payment_type === "cash" ? "Espéce" : "Carte banciare"}} 
				     			</span>
				     			</h5>
				     			<h5 class="font-weight-bold mt-2">
				     			<span class="badge badge-light">
				     				Etat de Payeiment : 
		         {{ $sal->payment_status === "paid" ? "payé" : "Impayé" }} 
				     			</span>
				     			</h5>
				     			<div class="card-body d-flex flex-column justify-content-center align-items-center">
				     				<span class="font-weight-bold">
				     					Restaurant XXX
				     				</span>
				     				<span class="font-weight-bold">
				     					Rue taza Midelt
				     				</span>
				     				<span class="font-weight-bold">
				     					06 87 85 16 84
				     				</span>
				     			</div>
				     		</div>
				     	</div>
				     </div>
				     @endif
				     @endforeach
						</div>    
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	</div>
     <div class="row justify-content-center mt-2">
     	<div class="col-md-12 card p-3">
     		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
     			@foreach($categories as $category)
     			<li class="nav-item">
     				<a href="#{{ $category->slug }}" 
     				class="nav-link mr-1  {{ $category->slug ==='مشروب  ' ? 'active' : '' }}"
     				id="{{$category->slug}}-tab"
     				data-toggle="pill"
     				role="tab"
     				aria-controls="{{$category->slug}}"
     				aria-selected="true"
     				>
     				{{ $category->title }}
     				</a>
     			</li>
     			@endforeach
     		</ul>
     		<div class="tab-content" id="pills-tabcontent">
     			@foreach($categories as $category)
    <div class="tab-pane fade {{ $category->slug ==='مشروب  ' ? 'show active' : '' }} "id="{{$category->slug}}" 
     		role="tabpanel"
     				    aria-labelledby="pills-home">
     				<div class="row">
     					@foreach($category->menus as $menu)
     						<div class="col-md-4 mb-2">
     							<div class="card h-100">
     								<div class="card-body d-flex flex-column 
     								justify-content-center lign-items-center">
     								<div class="align-self-end">
     									<input 
     									type="checkbox" 
     									name="menu_id[]" 
							            id="menu"
							            value="{{ $menu->id }}">
     								</div>
							           <img 
							           src="{{ asset('images/menus/'.$menu->image) }}"
							           class="img-fluid rounded-circle"
							           width="100"
							           height="100">
							           <h5 class="font-weight-bold mt-2">
							           	{{$menu->title}}
							           </h5>
							            <h5 class="text-muted">
							           	{{$menu->price}} DH
							           </h5>
     								</div>
     							</div>
     						</div>
     					@endforeach
     				</div>
     				
     				<div class="row">
     					<div class="col-md-6 mx-auto">
     						<div class="form-group">
     							<select 
     							name="servant_id" 
     							id="servant_id" 
     							class="form-control"> 
     							<option value="" selected disabled>
     								serveur
     							</option>	
     							@foreach($servants as $servant)
     							<option value="{{$servant->id}}" >
     								{{ $servant->name }}
     							</option>
     							@endforeach
     							</select>
     						</div>
     						<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										Qté
									</div>
									</div>
									<input 
									type="number" 
									name="quantity"
									class="form-control" 
									placeholder="Qté"
									
									>
								</div>

							<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										$
									</div>
									</div>
									<input 
									type="number"  
									name="total_price"
									class="form-control" 
									placeholder="prix"
									
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
										$
									</div>
									</div>
									<input 
									type="number" 
									name="total_received"
									class="form-control" 
									placeholder="Total"
									
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
										$
									</div>
									</div>
									<input 
									type="number" 
									name="change"
									class="form-control" 
									placeholder="Reste"
									>
									<div class="input-group-append">
									<div class="input-group-text">
										.00									
									</div>
									</div>
								</div>

						 <div class="form-group">
     						<select name="payment_type" id="" class="form-control"> 
     							<option value="" selected disabled>
     								Type de Paiement
     							</option> 	
     							<option value="cash">
     								Espéce
     							</option>
     							<option value="Card">
     								Carte Bancaire
     							</option>
     						</select>
     					</div>	

     					<div class="form-group">
     						<select name="payment_status" id="" class="form-control"> 
     							<option value="" selected disabled>
     								Etat de Paiement
     							</option> 	
     							<option value="paid">
     								Payé
     							</option>
     							<option value="unpaid">
     								Impayé
     							</option>
     						</select>
     					</div>

     					<div class="form-group">
     						<button
     						 onclick="event.preventDefault();
                            document.getElementById('add-sale').submit();"
                            class="btn btn-primary"
     						>
     							Valider
     						</button>
     					</div>

     					    </div>
     				</div>
     				</div>
     			@endforeach
     			</div>
     		</div>
     	</div>
</form>
</div>
@endsection