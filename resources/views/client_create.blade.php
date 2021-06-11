						<!-- create.blade.php -->

						@extends('layout')

						@section('content')

						<header class="page-header">
			        		<div class="container-fluid">
			              		<h2 class="no-margin-bottom">Client</h2>
			            	</div>
			            	<div style="margin-left: 80%; ">
			            		<a href="{{ route('clients.index') }}" class="btn btn-outline-primary">Listes des clients</a>
			            	</div>
			          	</header>
			          	@if ($errors->any())
					      	<div class="alert alert-danger">
					        	<ul>
					            	@foreach ($errors->all() as $error)
					              	<li>{{ $error }}</li>
					            	@endforeach
					        	</ul>
					      	</div><br />
					    @endif
			          	<section class="forms"> 
			            	<div class="container-fluid">
			            		<div class="row">
			              			<!-- Horizontal Form-->
					                <div style="margin-left: auto; margin-right: auto;" class="col-lg-12">
					                  	<div class="card">
						                    <div class="card-close">
						                      	<div class="dropdown">
							                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						                      	</div>
						                    </div>
						                    <div class="card-header d-flex align-items-center">
						                      	<h3 class="h4">Ajouter un client</h3>
						                    </div>
					                    	<div class="card-body">
					                    	
						                      	<p>...</p>
								                <form class="form-horizontal" method="post" action="{{ route('clients.store') }}">
							                	@csrf
							                	@method('POST')
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Nom</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="nom" placeholder="Nom de famille" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">prenoms</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="prenoms" placeholder="Le ou les prénom(s)" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Date de naissance</label>
							                          	<div class="col-sm-9">
							                            	<input type="date" name="date_naissance" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Lieu de naissance</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="lieu_naissance" placeholder="Ex : Couffo" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Résidence</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="adresse" placeholder="Lieu d'habitation" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Email</label>
							                          	<div class="col-sm-9">
							                            	<input type="email" name="email" placeholder="Email Address" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Téléphone</label>
							                          	<div class="col-sm-9">
							                            	<input type="tel" name="phone" placeholder="Ex : 98563147" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Carte d'identité</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="num_ci" placeholder="numéro de carte d'identité" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">       
							                          	<div class="col-sm-9 offset-sm-3">
							                            	<input type="submit" value="Ajouter" class="btn btn-primary">
							                          	</div>
							                        </div>
							                    </form>
					                    	</div>
					                  	</div>
					                </div>
					            </div>>
			              	</div>
			            </section>



						@endsection