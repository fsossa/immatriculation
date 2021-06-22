<!--User modal -->
                                                                        <div id="myModalUE{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h4 id="exampleModalLabel" class="modal-title">Modifier l'utilisateur</h4>
                                                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <p>...</p>
                                                                                  <form class="form-horizontal" method="post" action="{{ route('users.update', $val->id) }}">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                            <div class="form-group row">
                                                                                                <label class="col-sm-3 form-control-label">Noms</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="text" name="name" placeholder="Noms et prénoms" class="form-control form-control-success" value="{{ $val->name }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-sm-3 form-control-label">Email</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="email" name="email" placeholder="Email Address" class="form-control form-control-success" value="{{ $val->email }}"><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-sm-3 form-control-label">Téléphone</label>
                                                                                                <div class="col-sm-9">
                                                                                                    <input type="tel" name="phone" placeholder="Ex : 98563147" class="form-control form-control-success" value="{{ $val->phone }}"><!--small class="form-text">Example help text that remains unchanged.</small-->
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

                                                                          <div id="myModalUD{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                
                                                                                    <div class="modal-body">
                                                                                        <p>Voulez vous vraiment supprimé l'utilisateur {{ $val->name }} ?</p>
                                                                                      
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Annuler</button>
                                                                                        <form action="{{ route('users.destroy', $val->id)}}" method="post" style="">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>