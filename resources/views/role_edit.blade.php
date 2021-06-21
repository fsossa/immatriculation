						<!-- create.blade.php -->

						@extends('layout')

						@section('content')

						<header class="page-header">
			        		<div class="container-fluid">
			              		<h2 class="no-margin-bottom">Role</h2>
			            	</div>
			            	<div style="margin-left: 80%; ">
			            		<a href="{{ route('roles.index') }}" class="btn btn-outline-primary">Listes des roles</a>
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
						                      	<h3 class="h4">Modifier un role</h3>
						                    </div>
					                    	<div class="card-body">
					                    	
						                      	<p>...</p>
								                <form class="form-horizontal" method="post" action="{{ route('roles.update', $role->id) }}">
							                	@csrf
							                	@method('PATCH')
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Nom</label>
							                          	<div class="col-sm-9">
							                            	{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
							                          	</div>
							                        </div>
							                        <div class="form-group row">
							                          	<label class="col-sm-3 form-control-label">Permissions</label>
							                          	<div class="col-sm-9">
							                            	@foreach($permission as $value)
												                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
												                {{ $value->name }}</label>
												            	<br/>
												            @endforeach
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