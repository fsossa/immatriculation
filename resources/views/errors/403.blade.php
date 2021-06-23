						@extends('layouts.errors')

                        @section('content')

						<!-- Client Section-->
				        <section class="client">
				            <div class="container-fluid">
				              	<div class="row">
					                <div class="col-lg-12">
					                  	<div class="client card">
						                    <div class="card-close">
						                      	<div class="dropdown">
							                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						                      	</div>
						                    </div>
					                    	<div class="card-body text-center">
						                      	<div class="client-title">
						                        	<h3>Désolé, vous n'avez pas la permission d'accéder à cet contenu !</h3>
						                      	</div>
					                  		</div>
					                	</div>
					                </div>
					            </div>
				            </div>
				        </section>

				        @endsection