                        <!-- index.blade.php -->

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
                        @if(session()->get('success'))
                            <div style="text-align: center;" class="alert alert-success">
                                {{ session()->get('success') }}  
                            </div><br />
                        @endif
                        <section class="tables">   
                            <div class="container-fluid">
                                <div class="row">
                                    <div style="margin-left: auto; margin-right: auto;" class="col-lg-12">
                                        <div class="card">
                                            <div class="card-close">
                                                <div class="dropdown">
                                                    <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                                    <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                                </div>
                                            </div>

                                            <div class="card-header d-flex align-items-center">
                                                <h3 class="h4">Liste des véhicules immatriculés</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nom</th>
                                                                <th>Numéro de chasis</th>
                                                                <th>Année de sortie</th>
                                                                <th>Numéro de plaque</th>
                                                                <th>Propriétaire</th>
                                                                <th>Etape</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($vehicules as $val)
                                                                <tr>
                                                                    <td>{{$val->id}}</td>
                                                                    <td>{{$val->nom}}</td>
                                                                    <td>{{$val->num_chassis}}</td>
                                                                    <td>{{$val->annee_sortie}}</td>
                                                                    <td>{{$val->plaque}}</td>
                                                                    <td>{{$val->client}}</td>
                                                                    <td><label class="badge badge-primary">{{$val->titre}}</label></td>
                                                                    <td>
                                                                        @include('/vehicule_modal')
                                                                        <button type="button" data-toggle="modal" data-target="#myModalVE{{$val->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></button> &nbsp
                                                                        <button type="button" data-toggle="modal" data-target="#myModalVD{{$val->id}}" class="btn btn-danger"><i class="fa fa-remove"></i></button> 
                                                                    </td>
                                                                    <!--td><div class="row col-lg-12">
                                                                        <a href="{{ route('vehicules.edit', $val->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a> &nbsp &nbsp
                                                                        <form action="{{ route('vehicules.destroy', $val->id)}}" method="post" style="">
                                                                          @csrf
                                                                          @method('DELETE')
                                                                          <button class="btn btn-danger" type="submit"><i class="fa fa-remove"></i></button>
                                                                        </form>
                                                                      </div>
                                                                    </td-->
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