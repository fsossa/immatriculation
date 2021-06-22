                                                                        <!--client modal -->
                                                                        <div id="myModalCE{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h4 id="exampleModalLabel" class="modal-title">Modifier le Client</h4>
                                                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <p>...</p>
                                                                                  <form class="form-horizontal" method="post" action="{{ route('clients.update', $val->id) }}">
                                                                                    @csrf
                                                                                    @method('PATCH')
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Nom</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="nom" placeholder="Nom de famille" class="form-control form-control-success" value="{{ $val->nom }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">prenoms</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="prenoms" placeholder="Le ou les prénom(s)" class="form-control form-control-success" value="{{ $val->prenoms }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Date de naissance</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="date" name="date_naissance" class="form-control form-control-success" value="{{ $val->date_naissance }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Lieu de naissance</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="lieu_naissance" placeholder="Ex : Couffo" class="form-control form-control-success" value="{{ $val->lieu_naissance }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Département</label>
                                                                                            <div class="col-sm-9">
                                                                                                <select name="departements_id" class="form-control mb-3">
                                                                                                    @foreach($departements as $dep)
                                                                                                    <option value="{{ $dep->id }}" >{{ $dep->nom}} </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Résidence</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="adresse" placeholder="Lieu d'habitation" class="form-control form-control-success" value="{{ $val->adresse }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Email</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="email" name="email" placeholder="Email Address" class="form-control form-control-success" value="{{ $val->email }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Téléphone</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="tel" name="phone" placeholder="Ex : 98563147" class="form-control form-control-success" value="{{ $val->phone }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Carte d'identité</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="num_ci" placeholder="numéro de carte d'identité" class="form-control form-control-success" value="{{ $val->num_ci }}">
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
                                                                          <div id="myModalCD{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                
                                                                                    <div class="modal-body">
                                                                                        <p>Voulez vous vraiment supprimé le client {{ $val->nom.' '.$val->prenoms }} ?</p>
                                                                                      
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Annuler</button>
                                                                                        <form action="{{ route('clients.destroy', $val->id)}}" method="post" style="">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        