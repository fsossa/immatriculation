						@extends('layout')

                        @section('content')

                        <header class="page-header">
                            <div class="container-fluid">
                                <h2 class="no-margin-bottom">Client</h2>
                            </div>
                            <div style="margin-left: 80%; ">
                                <a href="{{ route('vehicules.create')}}" class="btn btn-outline-primary">Ajouter un client</a>
                            </div>
                        </header>

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
						                        	<h3>{{$client->nom.' '.$client->prenoms}}</h3><span>{{$client->departement.'/'.$client->adresse}}</span><a href="{{ route('clients.edit', $client->id) }}">Modifier</a>
						                      	</div>
					                      		<div class="client-info">
							                        <div class="row">
							                          	<div class="col-2"><strong>Carte ID N°</strong><br><small>{{$client->num_ci}}</small></div>
							                          	<div class="col-2"><strong>Né le</strong><br><small>{{$client->date_naissance}}</small></div>
							                          	<div class="col-2"><strong>Né à</strong><br><small>{{$client->lieu_naissance}}</small></div>
							                          	<div class="col-2"><strong>Téléphone</strong><br><small>{{$client->phone}}</small></div>
							                          	<div class="col-2"><strong>Email</strong><br><small>{{$client->email}}</small></div>
							                          	<div class="col-2"><strong>Par</strong><br><small>Admin {{$client->creator}} </small></div>
							                        </div>
						                      	</div>
					                  		</div>
					                	</div>
					                </div>
					            </div>
				            </div>
				        </section>

				        <section class="tables no-padding-top">   
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-close">
                                                <div class="dropdown">
                                                    <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                                    <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                                </div>
                                            </div>

                                            <div class="card-header d-flex align-items-center">
                                                <h3 class="h4">Véhicule (s)</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Nom</th>
                                                                <th>Chassis</th>
                                                                <th>Plaque</th>
                                                                <th>Date d'ajout</th>
                                                                <th>Derniere modification</th>
                                                                <th>Etape</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($client_vehicules as $val)
                                                                <tr>
                                                                    <td><a href="{{ route('vehicules.show', $val->id) }}">{{$val->marque.' '.$val->model.' '.$val->annee_sortie}}</a></td>
                                                                    <td>{{$val->num_chassis}}</td>
                                                                    <td>{{$val->plaque}}</td>
                                                                    <td>{{$val->created_at}}</td>
                                                                    <td>{{$val->updated_at}}</td>
                                                                    <td><label class="badge badge-primary">{{$val->titre}}</label></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

				        @endsection