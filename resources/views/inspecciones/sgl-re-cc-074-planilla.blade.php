<x-layout>
	<x-slot name="breadcrumb">
		Inspección
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Plantilla de Inspección SGL-RE-CC-074</h6>
	        </div>
	        <form method="POST" id="inspeccionForm" enctype="multipart/form-data" action="{{ (!empty($inspeccion->id)) ? route('inspecciones.update',$inspeccion->id) : route('inspecciones.store') }}">
                @if(empty($inspeccion->id))
                    <input type="hidden" name="planilla" value="2">
                    <input type="hidden" name="id_razon_social" value="{{$razon_social->id}}">
                @endif
	        	@csrf
	        	@if(!empty($inspeccion->id))
	        		@method('PATCH')
                    <input type="hidden" name="status" id="status" value="{{$inspeccion->status}}">
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Número de Resolución Sanitaria:</label>
                                <input type="text" name="n_resolucion" class="form-control form-control-sm" placeholder="Número de Resolución Sanitaria" value="{{$inspeccion->n_resolucion}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha de Resolución Sanitaria:</label>
                                <input type="date" name="fecha_resolucion" class="form-control form-control-sm" placeholder="Fecha de Resolución Sanitaria" value="{{$inspeccion->fecha_resolucion}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >T° Apertura:</label>
                                <input type="text" name="t_apertura" class="form-control form-control-sm" placeholder="T° Apertura" value="{{$inspeccion->t_apertura}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha ingreso a la plataforma:</label>
                                <input type="date" name="fecha_recepcion" readonly class="form-control form-control-sm" placeholder="Fecha ingreso a la plataforma" value="{{$inspeccion->fecha_recepcion}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Camión N°:</label>
                                <input type="text" name="n_camion" class="form-control form-control-sm" placeholder="Camión N°" value="{{$inspeccion->n_camion}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >N° de Cortes / Productos en factura:</label>
                                <input type="text" name="n_cortes_factura" class="form-control form-control-sm" placeholder="N° de Cortes / Productos en factura" value="{{$inspeccion->n_cortes_factura}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha de revisión:</label>
                                <input type="date" name="fecha_revision" class="form-control form-control-sm" placeholder="Fecha de revisión" value="{{$inspeccion->fecha_revision}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >N° de Cortes / Productos revisados:</label>
                                <input type="text" id="n_cortes_revisados" value="0" readonly class="form-control form-control-sm" placeholder="N° de Cortes / Productos revisados" value="{{$inspeccion->n_cortes_revisados}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Peso Neto:</label>
                                <input type="text" name="peso_neto" class="form-control form-control-sm" placeholder="Peso Neto" value="{{$inspeccion->peso_neto}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Temperatura entre cortes:</label>
                                <input type="text" name="t_entre_cortes" class="form-control form-control-sm" placeholder="Temperatura entre cortes" value="{{$inspeccion->t_entre_cortes}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >N° Total de Cajas:</label>
                                <input type="text" name="n_cajas" id="n_cajas" onkeyup="fnPorceCajaRev()" class="form-control form-control-sm" placeholder="N° Total de Cajas" value="{{$inspeccion->n_cajas}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >N° cajas revisadas:</label>
                                <input type="text" id="n_cajas_revisadas" onchange="fnPorceCajaRev()" value="0" readonly class="form-control form-control-sm" placeholder="N° cajas revisadas" value="{{$inspeccion->n_cajas_revisadas}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Orden de compra:</label>
                                <input type="text" name="orden_compra" class="form-control form-control-sm" placeholder="Orden de compra" value="{{$inspeccion->orden_compra}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >% de cajas revisadas:</label>
                                <input type="text" name="porcent_cajas_revisadas" id="porcent_cajas_revisadas" value="0" readonly class="form-control form-control-sm" placeholder="% de cajas revisadas" value="{{$inspeccion->porcent_cajas_revisadas}}">
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12"><hr></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
								<div class="card shadow mb-4">
									<a href="#collapseCardTecnologo" class="d-block card-header py-3" data-toggle="collapse"
										role="button" aria-expanded="true" aria-controls="collapseCardTecnologo">
										<h6 class="m-0 font-weight-bold text-primary">Técnologos</h6>
									</a>
									<!-- Card Content - Collapse -->
									<div class="collapse" id="collapseCardTecnologo">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreTecnologo()">
														<span class="icon text-white-50">
															<i class="fas fa-plus"></i>
														</span>
														<span class="text">Agregar Más</span>
													</button>
												</div>
												<div class="col-md-12" id="tecnologo_" style="display: none;">
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">Tecnólogo:</label>
															<div class="col-sm-6">
																<select class="form-control id_tecnologo" data-live-search="true" title="Tecnólogo">
																	@foreach ($tecnologos as $item)
																		<option value="{{$item->id}}">{{$item->name.' '.$item->last_name}}</option>
																	@endforeach
																</select>
															</div>
                                                            <div class="col-md-2">
                                                                <button class="btn-danger btn-circle btn-sm btn-delete-tecnologo" type="button"><i class="fas fa-trash"></i></button>
                                                            </div>
														</div>
													</div>
													<div class="col-md-12">
														<hr>
													</div>
												</div>
												<div class="tecnologo-div col-md-12">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><hr></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">1-. Datos del proveedor</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >Frigorífico Distribuidor (Razón Social):</label>
                                        <input type="text" readonly class="form-control form-control-sm" placeholder="Frigorífico Distribuidor (Razón Social)">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >Fecha despacho origen:</label>
                                        <input type="date" name="fecha_despacho_origen" class="form-control form-control-sm" placeholder="Fecha despacho origen" value="{{$inspeccion->fecha_despacho_origen}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >% Vida útil transcurrida:</label>
                                        <input type="text" name="porc_vida_util" class="form-control form-control-sm" placeholder="% Vida útil transcurrida" value="{{$inspeccion->porc_vida_util}}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >Vida útil transcurrida unidad:</label>
                                        <select name="porc_vida_util_unidad" class="form-control form-control-sm">
                                            <option {{(!empty($inspeccion->porc_vida_util_unidad) && $inspeccion->porc_vida_util_unidad == 'dia') ? 'selected' : '' }} value="dia">Día/s</option>
                                            <option {{(!empty($inspeccion->porc_vida_util_unidad) && $inspeccion->porc_vida_util_unidad == 'mes') ? 'selected' : '' }} value="mes">Mes/es</option>
                                            <option {{(!empty($inspeccion->porc_vida_util_unidad) && $inspeccion->porc_vida_util_unidad == 'ano') ? 'selected' : '' }} value="ano">Año/s</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >N° Factura:</label>
                                        <input type="text" name="n_factura" class="form-control form-control-sm" placeholder="N° Factura" value="{{$inspeccion->n_factura}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >Tipo de Termógrafo:</label>
                                        <select name="tipo_termografo" class="form-control form-control-sm">
                                            <option {{(!empty($inspeccion->tipo_termografo) && $inspeccion->tipo_termografo == 'Digital') ? 'selected' : '' }} value="Digital">Digital</option>
                                            <option {{(!empty($inspeccion->tipo_termografo) && $inspeccion->tipo_termografo == 'Papel') ? 'selected' : '' }} value="Papel">Papel</option>
                                            <option {{(!empty($inspeccion->tipo_termografo) && $inspeccion->tipo_termografo == 'Sensitech RF') ? 'selected' : '' }} value="Sensitech RF">Sensitech RF</option>
                                            <option {{(!empty($inspeccion->tipo_termografo) && $inspeccion->tipo_termografo == 'Sin termógrafo') ? 'selected' : '' }} value="Sin termógrafo">Sin termógrafo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >N° de Termógrafo:</label>
                                        <input type="text" name="n_termografo" class="form-control form-control-sm" placeholder="N° de Termógrafo" value="{{$inspeccion->n_termografo}}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >T° Termógrafo min. y máx.:</label>
                                        <input type="text" name="t_min_max_termografo" class="form-control form-control-sm" placeholder="T° Termógrafo min. y máx." value="{{$inspeccion->t_min_max_termografo}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><hr></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">2-. Características de embalaje y estiba</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >Tipo de Estiba:</label>
                                        <select name="tipo_estiba" class="form-control form-control-sm">
                                            <option {{(!empty($inspeccion->tipo_estiba) && $inspeccion->tipo_estiba == 'Panal') ? 'selected' : '' }} value="Panal">Panal</option>
                                            <option {{(!empty($inspeccion->tipo_estiba) && $inspeccion->tipo_estiba == 'Paletizado') ? 'selected' : '' }} value="Paletizado">Paletizado</option>
                                            <option {{(!empty($inspeccion->tipo_estiba) && $inspeccion->tipo_estiba == 'Sin Estibar') ? 'selected' : '' }} value="Sin Estibar">Sin Estibar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><hr></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span><b>Nota:</b> El formato para el llenado de los Kg Rechazados permite el ingreso de máximo 2 decimales y como separación de decimales se utiliza el . (punto).
                                Ej: 10 - 10.14</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="col-md-12">
								<div class="card shadow mb-4">
									<a href="#collapseCardProducto" class="d-block card-header py-3" data-toggle="collapse"
										role="button" aria-expanded="true" aria-controls="collapseCardProducto">
										<h6 class="m-0 font-weight-bold text-primary">Productos</h6>
									</a>
									<!-- Card Content - Collapse -->
									<div class="collapse" id="collapseCardProducto">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-primary btn-icon-split btn-sm" type="button" data-toggle="modal" data-target="#searchCorteModal">
														<span class="icon text-white-50">
															<i class="fas fa-plus"></i>
														</span>
														<span class="text">Agregar Más</span>
													</button>
												</div>
                                                <div class="col-md-12 d-none" id="corte_box_">
                                                    <input type="hidden" class="id-corte-box" value="">
                                                    <table class="table table-bordered table-sm">
                                                        <tbody>
                                                            <tr>
                                                                <th class="box-number">N°</th>
                                                                <th>F.Faena</th>
                                                                <th>F.Elab.</th>
                                                                <th>F.Venc.</th>
                                                                <th>Temp.°C</th>
                                                            </tr>
                                                            <tr>
                                                                <td rowspan="5"><button class="btn btn-danger btn-sm btn-delete-box" type="button">X</button></td>
                                                                <td><input type="date" class="form-control form-control-sm f-faena-box" value=""></td>
                                                                <td><input type="date" class="form-control form-control-sm f-elaboracion-box" value=""></td>
                                                                <td><input type="date" class="form-control form-control-sm f-vencimiento-box" value=""></td>
                                                                <td><input type="text" class="form-control form-control-sm temperatura-box" value="" placeholder="Temp.°C"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Frigorífico de Origen</th>
                                                                <th>Unidades Defectuosas</th>
                                                                <th>Kg Rechazados</th>
                                                                <th>Defecto</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control form-control-sm frigorifico-origen-box" value="" placeholder="Frigorífico de Origen"></td>
                                                                <td><input type="text" class="form-control form-control-sm unidad-defectuosas-box" value="" placeholder="Unidades Defectuosas"></td>
                                                                <td><input type="text" class="form-control form-control-sm kg-rechazados-box" value="" placeholder="Kg Rechazados"></td>
                                                                <td>
                                                                    <select class="defecto-box" multiple data-live-search="true" data-width="100%" title="Seleccione" data-selected-text-format="count">
                                                                        <option value="1">Pardeamiento</option>
                                                                        <option value="2">Exuado</option>
                                                                        <option value="3">Grasa</option>
                                                                        <option value="4">Envasado/Termoencodigo</option>
                                                                        <option value="5">Aroma Atípico</option>
                                                                        <option value="6">Producto con golpe de frío </option>
                                                                        <option value="7">Temperatura</option>
                                                                        <option value="8">Perdida de vacío</option>
                                                                        <option value="9">Exceso de burbujas</option>
                                                                        <option value="10">Otros</option>
                                                                </select>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3">Observaciones</th>
                                                                <th>Imagen</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <textarea class="form-control form-control-sm observacion-box" rows="3" placeholder="Observaciones"></textarea>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input archivo-box">
                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 mt-3 d-none" id="corte_">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h6 class="font-weight-bold tittle-corte">CORTE BLABLABLABLA</h6>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <input type="hidden" class="id-corte" value="">
                                                                    <input type="hidden" class="id-producto" value="">
                                                                    <button class="btn btn-sm btn-primary add-more-box" type="button">Agregar Cajas</button>
                                                                    <button class="btn btn-sm btn-primary add-more-copy-box" type="button">Agregar Cajas Copiando</button>
                                                                    <button class="btn btn-sm btn-default show-hide-box" type="button"><i class="fas fa-arrow-down fa-arrow-up"></i></button>
                                                                    <button class="btn btn-sm btn-danger btn-delete-corte"  type="button">X</button>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Vida Útil:</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control vida-util-corte" value="" placeholder="Vida Útil">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Código SAP:</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control codigo-sap-corte" value="" placeholder="Código SAP">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-block collapseCardCorte_">
                                                            <div class="card-body">
                                                                <div class="row box-corte">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="cortes-div col-md-12">
                                                    @foreach ($inspeccion->productos_inspeccion as $producto)
                                                        <div class="col-md-12 mt-3" id="corte_{{$producto->id}}">
                                                            <div class="card shadow mb-4">
                                                                <div class="card-header">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6 class="font-weight-bold tittle-corte">{{$producto->producto}}</h6>
                                                                        </div>
                                                                        <div class="col-md-6 text-right">
                                                                            <input type="hidden" name="id_producto_exist[]" value="{{$producto->id}}">
                                                                            <button class="btn btn-sm btn-primary add-more-box" type="button">Agregar Cajas</button>
                                                                            <button class="btn btn-sm btn-primary add-more-copy-box" type="button">Agregar Cajas Copiando</button>
                                                                            <a href="#collapseCardBoxProducto_{{$producto->id}}" class="btn btn-sm btn-default show-hide-box" data-toggle="collapse"
                                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto"><i class="fas fa-arrow-down fa-arrow-up"></i></a>
                                                                            <button class="btn btn-sm btn-danger btn-delete-corte"  type="button">X</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Vida Útil:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" name="vida_util_corte_exist[{{$producto->id}}]" value="{{$producto->vida_util}}" placeholder="Vida Útil">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Código SAP:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" name="codigo_sap_corte_exist[{{$producto->id}}]" value="{{$producto->codigo_sap}}" placeholder="Código SAP">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="collapse" id="collapseCardBoxProducto_{{$producto->id}}">
                                                                    <div class="card-body">
                                                                        <div class="row box-corte">
                                                                            @foreach ($inspeccion->productos_cajas_inspeccion as $caja)
                                                                                @if ($caja->id_producto == $producto->id)
                                                                                    <div class="col-md-12" id="corte_box_{{$caja->id}}">
                                                                                        <input type="hidden" name="id_corte_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->id}}">
                                                                                        <table class="table table-bordered table-sm">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th class="box-number">N°</th>
                                                                                                    <th>F.Faena</th>
                                                                                                    <th>F.Elab.</th>
                                                                                                    <th>F.Venc.</th>
                                                                                                    <th>Temp.°C</th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td rowspan="5"><button class="btn btn-danger btn-sm btn-delete-box" type="button">X</button></td>
                                                                                                    <td><input type="date" class="form-control form-control-sm" name="f_faena_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->fecha_faena}}"></td>
                                                                                                    <td><input type="date" class="form-control form-control-sm" name="f_elaboracion_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->fecha_elaboracion}}"></td>
                                                                                                    <td><input type="date" class="form-control form-control-sm" name="f_vencimiento_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->fecha_vencimiento}}"></td>
                                                                                                    <td><input type="text" class="form-control form-control-sm" name="temperatura_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->temperatura}}" placeholder="Temp.°C"></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th>Frigorífico de Origen</th>
                                                                                                    <th>Unidades Defectuosas</th>
                                                                                                    <th>Kg Rechazados</th>
                                                                                                    <th>Defecto</th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><input type="text" class="form-control form-control-sm" name="frigorifico_origen_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->frigorifico_origen}}" placeholder="Frigorífico de Origen"></td>
                                                                                                    <td><input type="text" class="form-control form-control-sm" name="unidad_defectuosas_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->unidades_defectuosas}}" placeholder="Unidades Defectuosas"></td>
                                                                                                    <td><input type="text" class="form-control form-control-sm" name="kg_rechazados_box_exist[{{$producto->id}}][{{$caja->id}}]" value="{{$caja->kg_rechazados}}" placeholder="Kg Rechazados"></td>
                                                                                                    <td>
                                                                                                        <select class="selectpicker" name="defecto_box_exist[{{$producto->id}}][{{$caja->id}}][]" multiple data-live-search="true" data-width="100%" title="Seleccione" data-selected-text-format="count">
                                                                                                            <option {{((!empty($caja->defecto) && in_array(1,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="1">Pardeamiento</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(2,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="2">Exuado</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(3,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="3">Grasa</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(4,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="4">Envasado/Termoencodigo</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(5,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="5">Aroma Atípico</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(6,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="6">Producto con golpe de frío </option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(7,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="7">Temperatura</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(8,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="8">Perdida de vacío</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(9,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="9">Exceso de burbujas</option>
                                                                                                            <option {{((!empty($caja->defecto) && in_array(10,json_decode($caja->defecto,TRUE)))) ? 'selected' : ''}} value="10">Otros</option>
                                                                                                    </select>
                                                                                                </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th colspan="3">Observaciones</th>
                                                                                                    <th>Imagen</th>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td colspan="3">
                                                                                                        <textarea class="form-control form-control-sm" name="observacion_box_exist[{{$producto->id}}][{{$caja->id}}]" rows="3" placeholder="Observaciones">{{$caja->observaciones}}</textarea>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <div class="custom-file">
                                                                                                            <input type="file" class="custom-file-input" name="archivo_box_exist[{{$producto->id}}][{{$caja->id}}]">
                                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                        </div>
                                                                                                        @if (!empty($caja->getMedia('inspeccion_imagen_producto_corte')->last()))
                                                                                                            <a class="btn btn-primary btn-sm mt-1" download="" href="{{$caja->getMedia('inspeccion_imagen_producto_corte')->last()->getUrl()}}" target="_blank">Descargar
                                                                                                            </a>
                                                                                                            <a class="btn btn-danger btn-sm mt-1" download="" href="{{$caja->getMedia('inspeccion_imagen_producto_corte')->last()->getUrl()}}" target="_blank">X
                                                                                                            </a>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="col-md-12">
								<div class="card shadow mb-4">
									<div class="d-block card-header py-3"
										role="button" aria-expanded="true" aria-controls="collapseCardProducto">
										<h6 class="m-0 font-weight-bold text-primary">Archivos</h6>
                                    </div>
									<!-- Card Content - Collapse -->
									<div>
										<div class="card-body">
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Documento Origen 1:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="doc_origen_1" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Documento Origen 2:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="doc_origen_2" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Documento Origen 3:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="doc_origen_3" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Resolución Sanitaria 1:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="res_sanitaria_1" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Resolución Sanitaria 2:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="res_sanitaria_2" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bold">Resolución Sanitaria 3:</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-file">
                                                                <input type="file" name="res_sanitaria_3" class="custom-file-input">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	        	</div>
	        	<div class="card-footer text-right">
		        	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fa fa-check"></i>
	                    </span>
	                    <span class="text">Guardar</span>
	                </button>
                    <button class="btn btn-primary btn-icon-split" type="button" id="cerrarBtn">
	                    <span class="icon text-white-50">
	                        <i class="fa fa-check"></i>
	                    </span>
	                    <span class="text">Cerrar</span>
	                </button>
		        </div>
	        </form>
	    </div>
	</div>
    @include('partials.search-corte-modal')
    <script>
		function fnAddMoreTecnologo() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#tecnologo_").clone().removeClass("hide");
            clone.attr("id", "tecnologo_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
			
			clone.find('.id_tecnologo').attr('name','id_tecnologo[]').addClass('selectpicker show-tick').selectpicker('render');
            clone.find('.btn-delete-tecnologo').attr("onclick","$('#tecnologo_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.tecnologo-div').append(clone.show());
        }
        function fnAddMoreProducto(id,corte) {
            n_cortes = parseInt($('#n_cortes_r').val());
			$('#n_cortes_r').val(n_cortes+1);
            
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#corte_").clone().removeClass("d-none");
            clone.attr("id", "corte_"+number).removeClass("d-none");
            //clone.find('.res_sanitaria_importacion_') 
            
            
            clone.find('.tittle-corte').html(corte);
            clone.find('.id-corte').attr('name','id_corte['+number+']').val(number);
            clone.find('.id-producto').attr('name','id_producto['+number+']').val(id);
            clone.find('.vida-util-corte').attr('name','vida_util_corte['+number+']');
            clone.find('.codigo-sap-corte').attr('name','codigo_sap_corte['+number+']');

            
            clone.find('.add-more-box').attr("onclick","fnAddMoreBox("+number+")");
            clone.find('.add-more-copy-box').attr("onclick","fnAddMoreCopyBox("+number+")");
            clone.find('.show-hide-box').attr("onclick","$('#tecnologo_"+number+"').remove()");
            
            clone.find('.btn-delete-corte').attr("onclick","fnDeleteProducto("+number+")");
            //clone.find('.btn-delete-corte').attr("onclick","$('#corte_"+number+"').remove()");
            clone.find('.box-corte').addClass("box-corte-"+number);
            
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.cortes-div').append(clone.show());
        }
        function fnAddMoreBox(number) {
            //n_cajas_revisadas = parseInt($('#n_cajas_revisadas').val());
		    //$('#n_cajas_revisadas').val(n_cajas_revisadas+1).trigger("change");            
            random = Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#corte_box_").clone().removeClass("d-none").addClass('count-box');
            clone.attr("id", "corte_box_"+random).removeClass("d-none").addClass('box-'+number);
            clone.find('.id-corte-box').attr('name','id_corte_box['+number+'][]').val(1);
            clone.find('.f-faena-box').attr('name','f_faena_box['+number+'][]');
            clone.find('.f-elaboracion-box').attr('name','f_elaboracion_box['+number+'][]');
            clone.find('.f-vencimiento-box').attr('name','f_vencimiento_box['+number+'][]');
            clone.find('.temperatura-box').attr('name','temperatura_box['+number+'][]');
            clone.find('.frigorifico-origen-box').attr('name','frigorifico_origen_box['+number+'][]');
            clone.find('.unidad-defectuosas-box').attr('name','unidad_defectuosas_box['+number+'][]');
            clone.find('.kg-rechazados-box').attr('name','kg_rechazados_box['+number+'][]');
            clone.find('.defecto-box').attr('name','defecto_box['+number+']['+number+'][]').addClass('selectpicker').selectpicker('render');
            clone.find('.observacion-box').attr('name','observacion_box['+number+'][]');
            clone.find('.archivo-box').attr('name','archivo_box['+number+'][]');
            clone.find('.btn-delete-box').attr("onclick","fnDeleteBox("+number+","+random+")");

            $('.box-corte-'+number).append(clone.show());
            fnPorceCajaRev()
            sonn=1;
            $('.box-'+number).each(function(){
                $(this).find('.box-number').html(sonn)
                if(sonn == 1){
                    $(this).addClass('first-box'+number);
                }
                sonn++;
            });	
        }
        function fnAddMoreCopyBox(number) {
            alert('COPY'+number)
        }
        function fnPorceCajaRev() {
            n_cajas_revisadas_div = $('.count-box');
            // Obtiene la cantidad de elementos seleccionados
            n_cajas_revisadas = n_cajas_revisadas_div.length;
            $('#n_cajas_revisadas').val(n_cajas_revisadas)
            //n_cajas_revisadas=parseInt($('#n_cajas_revisadas').val());
            n_cajas=parseInt($('#n_cajas').val());
            //alert(n_cajas_revisadas+"----"+n_cajas)
            total = n_cajas_revisadas*100/n_cajas
            $('#porcent_cajas_revisadas').val(parseFloat(total).toFixed(0));
        }
        function fnDeleteProducto(id) {
            $('#corte_'+id).remove();
            n_cortes = parseInt($('#n_cortes_r').val());
            $('#n_cortes_r').val(n_cortes-1);
            fnPorceCajaRev();
        }
        function fnDeleteBox(id,aleatorio) {
            $('#corte_box_'+aleatorio).remove();
            fnPorceCajaRev()
            /*n_cajas_revisadas = parseInt($('#n_cajas_revisadas').val());
            $('#n_cajas_revisadas').val(n_cajas_revisadas-1).trigger("change");
            sonn=1;
            $('.box-'+id).each(function(){			
                $(this).find('.box-number').html(sonn)
                if(sonn == 1){
                    $(this).addClass('first-box'+id);
                }
                sonn++;
            });*/
        }
        $('#searchCorteBtn').click(function () {
            $('#searchCorteTableBody').html('');
            $.post("{{route('cortes.search')}}",$("#searchCorteForm").serialize(),function (response) {
                
                $.each(response.cortes, function (index, value) {
                    btn = '<button class="btn btn-circle btn-primary" type="button" onclick="fnAddMoreProducto('+value.id+',\''+value.nombre_corte+'\')"><i class="fa fa-check"></i></button>';
                    $('#searchCorteTableBody').append('<tr><td>'+value.nombre_corte+'</td><td>'+value.codigo+'</td><td>'+btn+'</td></tr>');
                });
                    
            });
        });
        $('#cerrarBtn').click(function (e) { 
            $('#status').val(2);
            $('#inspeccionForm').submit();
        });
	</script>
    <script>
        jQuery(document).ready(function(){
            $('#collapseInspecciones').addClass('show');
        });
    </script>
</x-layout>