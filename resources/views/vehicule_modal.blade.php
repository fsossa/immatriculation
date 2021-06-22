<!--Vehicule modal -->
                                                                        <div id="myModalVE{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h4 id="exampleModalLabel" class="modal-title">Modifier le Véhicule</h4>
                                                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>...</p>
                                                                                    <form class="form-horizontal" method="post" action="{{ route('vehicules.update', $val->id) }}">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Nom</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="nom" placeholder="Nom de la voiture" class="form-control form-control-success" value="{{ $val->nom }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Numéro de chassis</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="num_chassis" placeholder="" class="form-control form-control-success" value="{{ $val->num_chassis }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Année de sortie</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="year" name="annee_sortie" placeholder="Ex : 2016" class="form-control form-control-success" value="{{ $val->annee_sortie }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Numéro de plaque</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="plaque" placeholder="" class="form-control form-control-success" value="{{ $val->plaque }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Propriétaire</label>
                                                                                            <div class="col-sm-9">
                                                                                                <select name="clients_id" class="form-control mb-3">
                                                                                                    @foreach($clients as $client)
                                                                                                    <option value="{{ $client->id }}" >{{ $client->nom.' '.$client->prenoms}} </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Model</label>
                                                                                            <div class="col-sm-9">
                                                                                                <select name="modeles_id" class="form-control mb-3">
                                                                                                    @foreach($modeles as $modele)
                                                                                                    <option value="{{ $modele->id }}" >{{ $modele->marque.' '.$modele->model}} </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Etape</label>
                                                                                            <div class="col-sm-9">
                                                                                                <select name="statuses_id" class="form-control mb-3">
                                                                                                    @foreach($statuses as $status)
                                                                                                    <option value="{{ $status->id }}" >{{ $status->titre}} </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">       
                                                                                            <div class="col-sm-9 offset-sm-3">
                                                                                                <input type="submit" value="Modifier" class="btn btn-primary">
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>

                                                                          <div id="myModalVD{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                
                                                                                    <div class="modal-body">
                                                                                        <p>Voulez vous vraiment supprimé le véhicule {{ $val->nom }} ?</p>
                                                                                      
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Annuler</button>
                                                                                        <form action="{{ route('vehicules.destroy', $val->id)}}" method="post" style="">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>