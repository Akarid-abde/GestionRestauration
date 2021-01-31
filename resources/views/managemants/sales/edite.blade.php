@extends('layouts.app')


@section('content')

<div class="container">
<form action=" {{ url('/Salses/update/'.$sale->id) }}"  method="post" id="add-sale" >
	@csrf
	method('PUT')
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
							checked="true" 
							name="table_id[]" 
							id="table"
							value="{{ $table->id }}" 
							>
						</div> 
						<i class="fa fa-chair fa-5x"></i>
						<span class="mt-2 text-muted font-weight-bold">
							{{ $table->name }}
						</span>
						<hr>

	<!-- 	@foreach($table->sales as $sal)		     
				     @if($sal->created_at >= Carbon\Carbon::today())
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
		@endforeach -->
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
     				<div class="row">
     					@foreach($menus as $menu)
     						<div class="col-md-4 mb-2">
     							<div class="card h-100">
     								<div class="card-body d-flex flex-column 
     								justify-content-center lign-items-center">
     								<div class="align-self-end">
     									<input 
     									type="checkbox" 
     									checked="true" 
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
     				</div>
     			
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
									type="Number" 
									name="quantity"
									class="form-control" 
									placeholder="Qté"
									value="{{ $sale->quantity }}" 
									>
								</div>
							<div class="input-group mb-3">
									<div class="input-group-pepend">
									<div class="input-group-text">
										$
									</div>
									</div>
									<input 
									type="Number"  
									name="total_price"
									class="form-control" 
									placeholder="prix"
									value="{{ $sale->total_price }}" 
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
									type="Number"
									name="total_received"
									class="form-control" 
									placeholder="Total"
									value="{{ $sale->total_received }}" 
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
									type="Number" 
									name="change"
									class="form-control" 
									placeholder="Reste"
									value="{{ $sale->change }}" 
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
     							<option value="cash"
                                <?php if ($sal->payment_type == "cash"): ?>
												selected='true'
								<?php endif ?>
     							>
     								Espéce
     							</option>
     							<option value="Card"
                                <?php if ($sal->payment_type == "Card"): ?>
												selected='true'
								<?php endif ?>
     							>
     								Carte Bancaire
     							</option>
     						</select>
     					</div>	

     					<div class="form-group">
     						<select name="payment_status" id="" class="form-control"> 
     							<option value="" selected disabled>
     								Etat de Paiement
     							</option> 	
     							<option value="paid"
                                <?php if ($sal->payment_status == "paid"): ?>
												selected='true'
								<?php endif ?>
     							>
     								Payé
     							</option>
     							<option value="unpaid"
                                <?php if ($sal->payment_status == "unpaid"): ?>
												selected='true'
								<?php endif ?>
     							>
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
     	</div>
</form>
</div>
@endsection