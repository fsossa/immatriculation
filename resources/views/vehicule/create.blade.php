						<!-- create.blade.php -->

						@extends('layout')

						@section('content')

						<header class="page-header">
			        		<div class="container-fluid">
			              		<h2 class="no-margin-bottom">Vehicule</h2>
			            	</div>
			            	<div style="margin-left: 80%; ">
			            		<a href="{{ route('vehicules.index') }}" class="btn btn-outline-primary">Listes des vehicules</a>
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
						                      	<h3 class="h4">Immatriculer un véhicule</h3>
						                    </div>
					                    	<div class="card-body">
					                    	
						                      	<p>...</p>
								                <form class="form-horizontal" method="post" action="{{ route('vehicules.store') }}">
							                	@csrf
							                	@method('POST')
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Numéro de chassis</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="num_chassis" placeholder="" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Année de sortie</label>
							                          	<div class="col-sm-9">
							                            	<input type="year" name="annee_sortie" placeholder="Ex : 2016" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Numéro de plaque</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="plaque" placeholder="" class="form-control form-control-success"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Propriétaire</label>
							                          	<div class="col-sm-9">
							                            	<select name="clients_id" class="form-control mb-3">
							                            		@foreach($clients as $val)
								                              	<option value="{{ $val->id }}" >{{ $val->nom.' '.$val->prenoms}} </option>
								                              	@endforeach
                            								</select>
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Model</label>
							                          	<div class="col-sm-9">
							                            	<select name="modeles_id" class="form-control mb-3">
							                            		@foreach($modeles as $val)
								                              	<option value="{{ $val->id }}" >{{ $val->marque.' '.$val->model}} </option>
								                              	@endforeach
                            								</select>
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Etape</label>
							                          	<div class="col-sm-9">
							                            	<select name="statuses_id" class="form-control mb-3">
							                            		@foreach($statuses as $val)
								                              	<option value="{{ $val->id }}" >{{ $val->titre}} </option>
								                              	@endforeach
                            								</select>
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