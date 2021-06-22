<!--Modele modal -->
                                                                        <div id="myModalME{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <h4 id="exampleModalLabel" class="modal-title">Modifier le Model</h4>
                                                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <p>...</p>
                                                                                    <form class="form-horizontal" method="post" action="{{ route('modeles.update', $val->id) }}">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Marque</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="marque" placeholder="Marque de la voiture" class="form-control form-control-success" value="{{ $val->marque }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group row">
                                                                                            <label class="col-sm-3 form-control-label">Model</label>
                                                                                            <div class="col-sm-9">
                                                                                                <input type="text" name="model" placeholder="Model de la voiture" class="form-control form-control-success" value="{{ $val->model }}" ><!--small class="form-text">Example help text that remains unchanged.</small-->
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

                                                                          <div id="myModalMD{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                                                            <div role="document" class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                
                                                                                    <div class="modal-body">
                                                                                        <p>Voulez vous vraiment supprimé le model {{ $val->marque.' '.$val->model }} ?</p>
                                                                                      
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Annuler</button>
                                                                                        <form action="{{ route('modeles.destroy', $val->id)}}" method="post" style="">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>