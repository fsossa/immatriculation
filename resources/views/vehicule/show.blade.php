						@extends('layout')

                        @section('content')

                        <header class="page-header">
                            <div class="container-fluid">
                                <h2 class="no-margin-bottom">Vehicule</h2>
                            </div>
                            <div style="margin-left: 80%; ">
                                <a href="{{ route('vehicules.create')}}" class="btn btn-outline-primary">Ajouter un vehicule</a>
                            </div>
                        </header>

						<!-- Client Section-->
				        <section class="client">
				            <div class="container-fluid">
				              	<div class="row">
					                <!-- Client Profile -->
					                <div class="col-lg-7">
					                  	<div class="client card">
						                    <div class="card-close">
						                      	<div class="dropdown">
							                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						                      	</div>
						                    </div>
					                    	<div class="card-body text-center">
						                      	<div class="client-title">
						                        	<h3>Informations</h3>
						                      	</div>
					                      		<div class="client-info" style="text-align: left;">
							                        <div class="row">
							                          	<div class="col-6"><strong>Nom</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->marque.' '.$vehicule->model.' '.$vehicule->annee_sortie}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Numéro de chassis</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->num_chassis}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Numéro de plaque</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->plaque}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Ajouté par</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->user}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Date d'ajout</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->created_at}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Derniere modification</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->updated_at}}</small></div>
							                        </div><br><br>
							                        <div class="row">
							                          	<div class="col-6"><strong>Etape</strong></div>
							                          	<div class="col-6"><small>{{$vehicule->titre}}</small></div>
							                        </div>
						                      	</div>
					                  		</div>
					                	</div>
					              	</div>

					              	<!-- Client Profile -->
					                <div class="col-lg-5">
					                  	<div class="client card">
						                    <div class="card-close">
						                      	<div class="dropdown">
							                        <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							                        <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						                      	</div>
						                    </div>
					                    	<div class="card-body text-center">
						                      	<div class="client-title">
						                        	<h3>{{$vehicule->c_nom.' '.$vehicule->prenoms}}</h3><br><br><span>Propriétaire</span><br><br><a href="{{ route('clients.show', $vehicule->c_id) }}">Consulter</a>
						                      	</div><br><br><br><br><br><br>
					                      		<div class="client-info">
							                        <div class="row">
							                          	<div class="col-3"><strong>Carte ID N°</strong><br><small>{{$vehicule->num_ci}}</small></div>
							                          	<div class="col-3"><strong>Téléphone</strong><br><small>{{$vehicule->phone}}</small></div>
							                          	<div class="col-6"><strong>Email</strong><br><small>{{$vehicule->email}}</small></div>
							                        </div>
						                      	</div>
					                  		</div>
					                	</div>
					              	</div>
					            </div>
				            </div>
				        </section>

				        @endsection