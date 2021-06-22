                        @extends('layout')

                        @section('content')
                        <header class="page-header">
                            <div class="container-fluid">
                                <h2 class="no-margin-bottom">Accueil</h2>
                            </div>
                        </header>
                        <!-- Client Section-->
                        <section class="dashboard-counts">
                            <div class="container-fluid">
                                <div class="row bg-white has-shadow">
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="item d-flex align-items-center">
                                            <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                            <div class="title"><span>Véhicules</span>
                                              <!--div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                              </div-->
                                            </div>
                                            <div class="number"><strong>{{ $stat['nbr_vehicule'] }}</strong></div>
                                        </div>
                                    </div>
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="item d-flex align-items-center">
                                            <div class="icon bg-violet"><i class="fa fa-user"></i></div>
                                            <div class="title"><span>Clients</span>
                                              <!--div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                              </div-->
                                            </div>
                                            <div class="number"><strong>{{ $stat['nbr_client'] }}</strong></div>
                                        </div>
                                    </div>
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="item d-flex align-items-center">
                                            <div class="icon bg-violet"><i class="fa fa-gear"></i></div>
                                            <div class="title"><span>Modeles</span>
                                              <!--div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                              </div-->
                                            </div>
                                            <div class="number"><strong>{{ $stat['nbr_modele'] }}</strong></div>
                                        </div>
                                    </div>
                                    <!-- Item -->
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="item d-flex align-items-center">
                                            <div class="icon bg-violet"><i class="fa fa-star"></i></div>
                                            <div class="title"><span>Utilisateurs</span>
                                              <!--div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                              </div-->
                                            </div>
                                            <div class="number"><strong>{{ $stat['nbr_user'] }}</strong></div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </section>
                        <section class="dashboard-header">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- Statistics -->
                                    <div class="statistics col-lg-3 col-12">
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                            <div class="text"><strong>{{ $stat['nbr_vehicule_val'] }}</strong><br><small>Validés</small></div>
                                        </div>
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-orange"><i class="fa fa-car"></i></div>
                                            <div class="text"><strong>{{ $stat['nbr_vehicule_cours'] }}</strong><br><small>En cours</small></div>
                                        </div>
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                            <div class="text"><strong>{{ $stat['nbr_vehicule_att'] }}</strong><br><small>En attentes</small></div>
                                        </div>
                                    </div>
                                    <!-- Line Chart            -->
                                    <div class="chart col-lg-6 col-12">
                                        <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                                            <canvas id="graph1"></canvas>
                                        </div>
                                    </div>
                                    <div class="chart col-lg-3 col-12">
                                        <!-- Bar Chart   -->
                                        <div class="bar-chart has-shadow bg-white">
                                            <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
                                            <canvas id="barChartHome"></canvas>
                                        </div>
                                        <!-- Numbers-->
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                                            <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
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
                        

                        <script>
                            var ctx = document.getElementById('graph1').getContext('2d');
                            var graph1 = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                                    datasets: [{
                                        label: 'Véhicules',
                                        data: <?php echo $stat['vehicules_t']; ?>,
                                        
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    },{
                                        label: 'Validés',
                                        data: <?php echo $stat['vehicule_by_m']; ?>,
                                        
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>









                        @endsection
