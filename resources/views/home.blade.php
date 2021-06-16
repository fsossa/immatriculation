                        @extends('layout')

                        @section('content')
                        <header class="page-header">
                            <div class="container-fluid">
                                <h2 class="no-margin-bottom">Accueil</h2>
                            </div>
                        </header>
                        <!-- Client Section-->
                        <section class="client ">
                            <div class="container-fluid">
                              <div class="row">
                                @foreach($agents as $val)
                                    <!-- Client Profile -->
                                    <div class="col-lg-4">
                                      <div class="client card">
                                        <div class="card-close">
                                          <div class="dropdown">
                                            <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                            <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                          </div>
                                        </div>
                                        <div class="card-body text-center">
                                          <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                                            <div class="status bg-green"></div>
                                          </div>
                                          <div class="client-title">
                                            <h3>{{ $val->name }}</h3><span>{{ $val->departement}}<br>{{ $val->phone }}<br>{{ $val->email }}</span><a href="#">Voir plus</a>
                                          </div>
                                          <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                                        </div>
                                      </div>
                                    </div>
                                @endforeach
                              </div>
                            </div>
                        </section>                        
                        <section class="tables">   
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
                                                <h3 class="h4">Derniers véhicules immatriculés</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Nom</th>
                                                                <th>Chassis</th>
                                                                <th>Plaque</th>
                                                                <th>Propriétaire</th>
                                                                <th>Date</th>
                                                                <th>Etape</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($vehicules as $val)
                                                                <tr>
                                                                    <td>{{$val->marque.' '.$val->model.' '.$val->annee_sortie}}</td>
                                                                    <td>{{$val->num_chassis}}</td>
                                                                    <td>{{$val->plaque}}</td>
                                                                    <td>{{$val->client}}</td>
                                                                    <td>{{$val->created_at}}</td>
                                                                    <td>{{$val->titre}}</td>
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
                        <section class="tables">   
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
                                                <h3 class="h4">Liste des clients</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Noms</th>
                                                                <th>Naissance</th>
                                                                <th>Téléphone</th>
                                                                <th>Email</th>
                                                                <th>Carte d'identité</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($clients as $val)
                                                                <tr>
                                                                    <td>{{$val->nom.' '.$val->prenoms}}</td>
                                                                    <td>{{$val->date_naissance.'/'.$val->lieu_naissance}}</td>
                                                                    <td>{{$val->phone}}</td>
                                                                    <td>{{$val->email}}</td>
                                                                    <td>{{$val->num_ci}}</td>
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
                        <section class="dashboard-counts">
                            <div class="container-fluid">
                                <div class="row bg-white has-shadow">
                                    @foreach($modeles as $val)
                                        <!-- Item -->
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="item d-flex align-items-center">
                                                <div class="icon bg-violet"><i class="icon-user"></i></div>
                                                <div class="title"><span>{{ $val->marque }}<br>{{ $val->model }}</span>
                                                  <!--div class="progress">
                                                    <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                                  </div-->
                                                </div>
                                                <div class="number"><strong>25</strong></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>











                        @endsection
