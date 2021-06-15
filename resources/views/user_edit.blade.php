						<!-- create.blade.php -->

						@extends('layout')

						@section('content')

						<header class="page-header">
			        		<div class="container-fluid">
			              		<h2 class="no-margin-bottom">Agent</h2>
			            	</div>
			            	<div style="margin-left: 80%; ">
			            		<a href="{{ route('users.index') }}" class="btn btn-outline-primary">Listes des agents</a>
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
						                      	<h3 class="h4">Modifier l'agent</h3>
						                    </div>
					                    	<div class="card-body">
					                    	
						                      	<p>...</p>
								                <form class="form-horizontal" method="post" action="{{ route('users.update', $user->id) }}">
							                	@csrf
							                	@method('PATCH')
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Noms</label>
							                          	<div class="col-sm-9">
							                            	<input type="text" name="name" placeholder="Noms et prénoms" class="form-control form-control-success" value="{{ $user->noms }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Email</label>
							                          	<div class="col-sm-9">
							                            	<input type="email" name="email" placeholder="Email Address" class="form-control form-control-success" value="{{ $user->email }}"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Téléphone</label>
							                          	<div class="col-sm-9">
							                            	<input type="tel" name="phone" placeholder="Ex : 98563147" class="form-control form-control-success" value="{{ $user->phone }}"><!--small class="form-text">Example help text that remains unchanged.</small-->
							                          	</div>
							                        </div>
							                        <div class="form-group row">       
							                          	<div class="col-sm-9 offset-sm-3">
							                            	<input type="submit" value="Modifier" class="btn btn-primary">
							                          	</div>
							                        </div>
							                    </form>
					                    	</div>
					                  	</div>
					                </div>
					            </div>
			              	</div>
			            </section>



						@endsection