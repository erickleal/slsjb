<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-show-{{ $asignatura->id }}">
	  <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <br>
                            <div class="modal-title" align="center">
                            	<label>Informacion: </label>
                            </div>
                                <div class="modal-body">
                                    <label>Profesor: </label>
                                    <p><span class="fa fa-user-md" aria-hidden="true"></span> {{$asignatura->profesor->nombre." ".$asignatura->profesor->apellido_paterno." ".$asignatura->profesor->apellido_materno}}</p>
                                    <label>Horario: </label>
                                    <p><span class="fa fa-calendar" aria-hidden="true"></span> {{$asignatura->horario}}</p>
									<label>Sala:</label>
									<p><span class="fa fa-building" aria-hidden="true"></span> {{$asignatura->sala->nombre}}</p>		
                                </div>

                            <div class="modal-footer">
                            	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>

                           </div><!-- modal content -->
                        </div><!-- modal dialog -->
</div>