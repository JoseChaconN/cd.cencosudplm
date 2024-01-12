<x-layout>
	<x-slot name="breadcrumb">
        Recepciones
    </x-slot>
    <div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Recepción</h6>
	        </div>
	        <form method="POST" id="recepcionForm" enctype="multipart/form-data" action="{{ (!empty($recepcion->id)) ? route('recepciones.update',$recepcion->id) : route('recepciones.store') }}">
                @csrf
	        	@if(!empty($recepcion->id))
	        		@method('PATCH')
                    <input type="hidden" name="status" id="status" value="{{$recepcion->status}}">
	        	@endif
                @if(empty($recepcion->id))
                    <input type="hidden" name="id_proveedor" id="id_proveedor" value="{{$proveedor->id}}">
	        	@endif
                <div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Orden de Compra (OC):</label>
                                <input type="text" name="oc" class="form-control form-control-sm" placeholder="Orden de Compra (OC)" value="{{$recepcion->oc}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Contrato Marco:</label>
                                <input type="text" name="contrato_marco" class="form-control form-control-sm" placeholder="Contrato Marco" value="{{$recepcion->contrato_marco}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Proveedor:</label>
                                <input type="text" name="proveedor" class="form-control form-control-sm" placeholder="Proveedor" value="{{empty($recepcion->proveedor) ? $proveedor->nombre : $recepcion->proveedor}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Nombre Contenedor:</label>
                                <input type="text" name="n_contenedor" class="form-control form-control-sm" placeholder="Nombre Contenedor" value="{{$recepcion->n_contenedor}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">País de Origen:</label>
                                <select class="form-control form-control-sm" name="pais_origen">
                                    <option value="">País</option>
                                    @foreach ($paises as $pais)
                                        <option {{($recepcion->pais_origen == $pais->code) ? 'selected' : '';}} value="{{$pais->code}}">{{$pais->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Cantidad de contenedores por OC:</label>
                                <input type="text" name="cantidad_contenedor" class="form-control form-control-sm inputInt" placeholder="Cantidad de contenedores por OC" value="{{$recepcion->cantidad_contenedor}}">
                            </div>
                        </div>                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha Recepción:</label>
                                <input type="date" id="f_recepcion" name="f_recepcion" class="form-control form-control-sm" placeholder="Fecha Recepción" value="{{$recepcion->f_recepcion}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Cantidad de contenedores recepcionados por OC:</label>
                                <input type="text" name="cantidad_contenedor_recepcionados" class="form-control form-control-sm inputInt" placeholder="Cantidad de contenedores recepcionados por OC" value="{{$recepcion->cantidad_contenedor_recepcionados}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Temperatura Apertura:</label>
                                <input type="text" name="t_apertura" class="form-control form-control-sm" placeholder="Temperatura Apertura" value="{{$recepcion->t_apertura}}">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">CDA:</label>
                                <input type="text" name="cda" class="form-control form-control-sm" placeholder="CDA" value="{{$recepcion->cda}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha emisión CDA:</label>
                                <input type="date" name="f_cda" class="form-control form-control-sm" placeholder="Fecha Liberado por ACA" value="{{$recepcion->f_cda}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Toma de Muestra:</label>
                                <select class="form-control form-control-sm" name="toma_muestra">
                                    <option value="">Seleccione</option>
                                    <option {{($recepcion->toma_muestra == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                    <option {{($recepcion->toma_muestra == 'no') ? 'selected' : '';}} value="no">No</option>
                                    <option {{($recepcion->toma_muestra == 'N/A') ? 'selected' : '';}} value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Cantidad de Cajas Recepcionadas:</label>
                                <input type="text" id="cant_recepcionadas" name="cant_recepcionadas" class="form-control form-control-sm inputInt" placeholder="Cantidad de Cajas Recepcionadas" value="{{$recepcion->cant_recepcionadas}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Temperatura Termógrafo:</label>
                                <input type="text" name="t_termografo" class="form-control form-control-sm" placeholder="Temperatura Termógrafo" value="{{$recepcion->t_termografo}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Cantidad de Cajas Revisadas:</label>
                                <input type="text" id="cant_revisadas" name="cant_revisadas" class="form-control form-control-sm inputInt" placeholder="Cantidad de Cajas Revisadas" value="{{$recepcion->cant_revisadas}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">N° Termógrafo:</label>
                                <input type="text" name="n_termografo_pallet" class="form-control form-control-sm" placeholder="N° Termógrafo" value="{{$recepcion->n_termografo_pallet}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Tipo Termógrafo:</label>
                                <select class="form-control form-control-sm" name="tipo_termografo">
                                    <option value="">Seleccione</option>
                                    <option {{($recepcion->tipo_termografo == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                    <option {{($recepcion->tipo_termografo == 'no') ? 'selected' : '';}} value="no">No</option>
                                    <option {{($recepcion->tipo_termografo == 'No Aplica') ? 'selected' : '';}} value="No Aplica">No Aplica</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">% Muestreo:</label>
                                <input type="text" id="porcentaje_muestra" name="porcentaje_muestra" class="form-control form-control-sm" placeholder="% Muestreo" value="{{$recepcion->porcentaje_muestra}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Condición de Almacenaje:</label>
                                <select class="form-control form-control-sm" name="almacenaje">
                                    <option value="">Seleccione</option>
                                    @foreach ($almacenaje_array as $key => $val)
                                        <option value="{{$val['val']}}">{{$val['text']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha Liberado por ACA:</label>
                                <input type="date" name="fecha_liberado_aca" class="form-control form-control-sm" placeholder="Fecha Liberado por ACA" value="{{$recepcion->fecha_liberado_aca}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha liberacion ACA de forma parcial:</label>
                                <input type="date" name="fecha_liberado_parcial" class="form-control form-control-sm" placeholder="Fecha liberacion ACA de forma parcial" value="{{$recepcion->fecha_liberado_parcial}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Bodega:</label>
                                <select class="form-control form-control-sm" name="bodega">
                                    <option value="">Seleccione</option>
                                    @foreach ($bodegas as $item)
                                        <option {{($recepcion->bodega == $item->id) ? 'selected' : '';}} value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Revisión Proyecto Rotulo:</label>
                                <select class="form-control form-control-sm" name="revision_proyecto_rotulo">
                                    <option value="">Seleccione</option>
                                    <option {{($recepcion->revision_proyecto_rotulo == 'Ok') ? 'selected' : '';}} value="Ok">Ok</option>
                                    <option {{($recepcion->revision_proyecto_rotulo == 'N/A') ? 'selected' : '';}} value="N/A">N/A</option>
                                    <option {{($recepcion->revision_proyecto_rotulo == 'Pendiente') ? 'selected' : '';}} value="Pendiente">Pendiente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Días entre Recepción y Proyecto:</label>
                                <input type="text" name="dias_recepcion_x_proyecto" class="form-control form-control-sm inputInt" placeholder="Días entre Recepción y Proyecto" value="{{$recepcion->dias_recepcion_x_proyecto}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Tecnólogo que aprueba:</label>
                                <select class="form-control form-control-sm selectpicker" data-live-search="true" name="tecnologo_aprueba">
                                    <option value="">Seleccione</option>
                                    @foreach ($tecnologos as $item)
                                        <option {{($recepcion->tecnologo_aprueba == $item->id) ? 'selected' : '';}} value="{{$item->id}}">{{$item->name.' '.$item->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Tecnólogo que recepciona contenedor:</label>
                                <select class="form-control form-control-sm selectpicker" data-live-search="true" name="tecnologo_recepciona">
                                    <option value="">Seleccione</option>
                                    @foreach ($tecnologos as $item)
                                        <option {{($recepcion->tecnologo_recepciona == $item->id) ? 'selected' : '';}} value="{{$item->id}}">{{$item->name.' '.$item->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="sidebar-divider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">UYD:</label>
                                <input type="text" name="uyd" class="form-control form-control-sm" placeholder="UYD" value="{{$recepcion->uyd}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha Emisión UYD:</label>
                                <input type="date" name="f_uyd" class="form-control form-control-sm" placeholder="Fecha Emisión UYD" value="{{$recepcion->f_uyd}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >SEREMI Fecha Inspección:</label>
                                <input type="date" name="seremi_f_inspeccion" class="form-control form-control-sm" placeholder="SEREMI Fecha Inspección" value="{{$recepcion->seremi_f_inspeccion}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha OK Proyecto Rotulo:</label>
                                <input type="date" name="f_aprueba_proyecto" class="form-control form-control-sm" placeholder="Fecha OK Proyecto Rotulo" value="{{$recepcion->f_aprueba_proyecto}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Seremi que otorga resolución:</label>
                                <select class="form-control form-control-sm selectpicker" data-live-search="true" name="seremi_resolucion">
                                    <option value="">Seleccione</option>
                                    @foreach ($seremi_recepcion_array as $key => $val)
                                        <option {{($recepcion->seremi_resolucion == $val['val']) ? 'selected' : '';}} value="{{$val['val']}}">{{$val['text']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Fecha Resolución:</label>
                                <input type="date" name="f_resolucion" class="form-control form-control-sm" placeholder="Fecha Resolución" value="{{$recepcion->f_resolucion}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Requiere etiquetado (Si/No):</label>
                                <select class="form-control form-control-sm" name="etiquetado">
                                    <option value="">Seleccione</option>
                                    <option {{($recepcion->etiquetado == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                    <option {{($recepcion->etiquetado == 'no') ? 'selected' : '';}} value="no">No</option>
                                    <option {{($recepcion->etiquetado == 'Parcial') ? 'selected' : '';}} value="Parcial">Parcial</option>
                                    <option {{($recepcion->etiquetado == 'N/A') ? 'selected' : '';}} value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" >Etiquetado de SELLO ALTO EN:</label>
                                <select class="form-control form-control-sm" name="etiquetado_sello_alto_en">
                                    <option value="">Seleccione</option>
                                    <option {{($recepcion->etiquetado_sello_alto_en == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                    <option {{($recepcion->etiquetado_sello_alto_en == 'no') ? 'selected' : '';}} value="no">No</option>
                                    <option {{($recepcion->etiquetado_sello_alto_en == 'Parcial') ? 'selected' : '';}} value="Parcial">Parcial</option>
                                    <option {{($recepcion->etiquetado_sello_alto_en == 'N/A') ? 'selected' : '';}} value="N/A">N/A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="sidebar-divider">
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
                                                    {{-- @if ($recepcion->status == 1 ) --}}
                                                        <button class="btn btn-primary btn-icon-split btn-sm" type="button" data-toggle="modal" data-target="#searchProductoModal">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-plus"></i>
                                                            </span>
                                                            <span class="text">Agregar Más</span>
                                                        </button>
                                                    {{-- @endif --}}
												</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 productos-div">
                                                    <div class="col-md-12 mt-3 d-none" id="producto_">
                                                        <div class="card shadow mb-4">
                                                            <div class="card-header">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h6 class="font-weight-bold tittle-producto">CORTE BLABLABLABLA</h6>
                                                                    </div>
                                                                    <div class="col-md-6 text-right">
                                                                        <input type="hidden" class="producto" value="">
                                                                        <input type="hidden" class="id-producto" value="">
                                                                        <input type="hidden" class="id-producto-recepcion" value="">
                                                                        <input type="hidden" class="sap-producto" value="">
                                                                        <input type="hidden" class="vida-util-producto" value="">
                                                                        <input type="hidden" class="tolerancia-ingreso" value="">
                                                                        <input type="hidden" class="tolerancia-despacho" value="">
                                                                        <input type="hidden" class="dias-antes-vencer" value="">
                                                                        <button class="btn btn-sm btn-primary add-more-box" type="button">Agregar Fecha</button>
                                                                        <!--button class="btn btn-sm btn-primary add-more-copy-box" type="button">Agregar Cajas Copiando</button-->
                                                                        <button class="btn btn-sm btn-default show-hide-box" type="button"><i class="fas fa-arrow-down fa-arrow-up"></i></button>
                                                                        <button class="btn btn-sm btn-danger btn-delete-producto"  type="button">X</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-block collapseCardCorte_">
                                                                <div class="card-body">
                                                                    <div class="row box-producto">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 d-none" id="producto_box_">
                                                        <input type="hidden" class="id-producto-box" value="">
                                                        <table class="table table-bordered table-sm">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="box-number">N°</th>
                                                                    <th>Fecha elaboración</th>
                                                                    <th>Sap</th>
                                                                    <th>Lote</th>
                                                                    <th>Marca</th>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="7"><button class="btn btn-danger btn-sm btn-delete-box" type="button">X</button></td>
                                                                    <td><input type="date" class="form-control form-control-sm fecha-elab-box" placeholder="Fecha elaboración" value=""></td>
                                                                    <td><input type="text" class="form-control form-control-sm sap-box" placeholder="Sap" value=""></td>
                                                                    <td><input type="text" class="form-control form-control-sm lote-box" placeholder="Lote" value=""></td>
                                                                    <td><input type="text" class="form-control form-control-sm marca-box" value="" placeholder="Marca"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Vencimiento</th>
                                                                    <th>Cantidad de cajas</th>
                                                                    <th>Requiere etiquetado o ingredientes, tabla nutricional, etc</th>
                                                                    <th>Requiere Sello alto en</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="date" class="form-control form-control-sm vencimiento-box" value="" placeholder="Vencimiento"></td>
                                                                    <td><input type="text" class="form-control form-control-sm cant-cajas-box inputInt" value="" placeholder="Cantidad de cajas"></td>
                                                                    <td>
                                                                        <select class="form-control form-control-sm requiere-etiquetado-box">
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Sí</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control form-control-sm requiere-sello-alto-box">
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Sí</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Requiere trabajo adicional</th>
                                                                    <th>Porcentaje vida útil trascurrida</th>
                                                                    <th>Tº Producto</th>
                                                                    <th>Defectos desplegables</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <select class="form-control form-control-sm requiere-trabajo-box">
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Sí</option>
                                                                            <option value="no">No</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" class="form-control form-control-sm procentaje-vida-util-box" readonly value="" placeholder="Porcentaje vida útil trascurrida"></td>
                                                                    <td><input type="text" class="form-control form-control-sm temp-producto-box" value="" placeholder="Tº Producto"></td>
                                                                    <td>
                                                                        <select class="defecto-box" data-live-search="true" data-width="100%" title="Seleccione">
                                                                            @foreach ($defectos as $item)
                                                                                <option {{($recepcion->tecnologo_recepciona == $item->id) ? 'selected' : '';}} value="{{$item->id}}">{{$item->nombre}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4">Observaciones</th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <textarea class="form-control form-control-sm observacion-box" rows="3" placeholder="Observaciones"></textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if (!empty($recepcion->productos_recepcion))
                                                        @foreach ($recepcion->productos_recepcion as $producto)
                                                            <div class="col-md-12 mt-3" id="producto_{{$producto->id}}">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-header">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6 class="font-weight-bold tittle-producto">{{$producto->producto}}</h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-right">
                                                                                <input type="hidden" name="producto[]" value="{{$producto->producto}}">
                                                                                <input type="hidden" name="id_producto[]" value="{{$producto->id_producto}}">
                                                                                <input type="hidden" name="id_producto_recepcion[]" value="{{$producto->id}}">
                                                                                <input type="hidden" name="sap_producto[]" value="{{$producto->sap}}">
                                                                                <input type="hidden" name="vida_util_producto[]" id="vida_util_producto_{{$producto->id}}" value="{{$producto->vida_util}}">
                                                                                <input type="hidden" name="tolerancia_ingreso[]" id="tolerancia_ingreso_{{$producto->id}}" value="{{$producto->tolerancia_ingreso}}">
                                                                                <input type="hidden" name="tolerancia_despacho[]" id="tolerancia_despacho_{{$producto->id}}" value="{{$producto->tolerancia_despacho}}">
                                                                                <input type="hidden" name="dias_antes_vencer[]" id="dias_antes_vencer_{{$producto->id}}" value="{{$producto->dias_antes_vencer}}">
                                                                                @if ($recepcion->status == 1)
                                                                                    <button class="btn btn-sm btn-primary add-more-box" onclick="fnAddMoreBox({{$producto->id}},{{$producto->sap}})" type="button">Agregar Fecha</button>
                                                                                @endif
                                                                                <!--button class="btn btn-sm btn-primary add-more-copy-box" type="button">Agregar Cajas Copiando</button-->
                                                                                <button class="btn btn-sm btn-default show-hide-box" type="button"><i class="fas fa-arrow-down fa-arrow-up"></i></button>
                                                                                <button class="btn btn-sm btn-danger btn-delete-producto" onclick="fnDeleteProducto({{$producto->id}})" type="button">X</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-block collapseCardCorte_{{$producto->id}}">
                                                                        <div class="card-body">
                                                                            <div class="row box-producto box-producto-{{$producto->id}}">
                                                                                @foreach ($recepcion->productos_cajas_recepcion as $caja)
                                                                                    @if ($caja->id_producto == $producto->id)
                                                                                        <div class="col-md-12" id="producto_box_{{$caja->id}}">
                                                                                            <input type="hidden" class="id-producto-box" value="{{$caja->id}}">
                                                                                            <table class="table table-bordered table-sm">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th class="box-number">N°</th>
                                                                                                        <th>Fecha elaboración</th>
                                                                                                        <th>Sap</th>
                                                                                                        <th>Lote</th>
                                                                                                        <th>Marca</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td rowspan="7"><button class="btn btn-danger btn-sm btn-delete-box" onclick="$('#producto_box_{{$caja->id}}').remove()" type="button">X</button></td>
                                                                                                        <td><input type="date" class="form-control form-control-sm" name="fecha_elab_box[{{$producto->id}}][]" placeholder="Fecha elaboración" value="{{$caja->fecha_elab}}"></td>
                                                                                                        <td><input type="text" class="form-control form-control-sm sap-box" name="sap_box[{{$producto->id}}][]" placeholder="Sap" value="{{$caja->sap}}"></td>
                                                                                                        <td><input type="text" class="form-control form-control-sm" name="lote_box[{{$producto->id}}][]" placeholder="Lote" value="{{$caja->lote}}"></td>
                                                                                                        <td><input type="text" class="form-control form-control-sm" name="marca_box[{{$producto->id}}][]" value="{{$caja->marca}}" placeholder="Marca"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th>Vencimiento</th>
                                                                                                        <th>Cantidad de cajas</th>
                                                                                                        <th>Requiere etiquetado o ingredientes, tabla nutricional, etc</th>
                                                                                                        <th>Requiere Sello alto en</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><input type="date" class="form-control form-control-sm" id="vencimiento_box_{{$caja->id}}" name="vencimiento_box[{{$producto->id}}][]" value="{{$caja->vencimiento}}" onchange="fnChangePorceVU({{$producto->id}},{{$caja->id}})" placeholder="Vencimiento"></td>
                                                                                                        <td><input type="text" class="form-control form-control-sm inputInt" name="cant_cajas_box[{{$producto->id}}][]" value="{{$caja->cant_cajas}}" placeholder="Cantidad de cajas"></td>
                                                                                                        <td>
                                                                                                            <select class="form-control form-control-sm" name="requiere_etiquetado_box[{{$producto->id}}][]">
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{($caja->requiere_etiquetado == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                                                                                                <option {{($caja->requiere_etiquetado == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                            </select>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <select class="form-control form-control-sm" name="requiere_sello_alto_box[{{$producto->id}}][]">
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{($caja->requiere_sello_alto == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                                                                                                <option {{($caja->requiere_sello_alto == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                            </select>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th>Requiere trabajo adicional</th>
                                                                                                        <th>Porcentaje vida útil trascurrida</th>
                                                                                                        <th>Tº Producto</th>
                                                                                                        <th>Defectos desplegables</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <select class="form-control form-control-sm" name="requiere_trabajo_box[{{$producto->id}}][]">
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{($caja->requiere_trabajo == 'Si') ? 'selected' : '';}} value="Si">Sí</option>
                                                                                                                <option {{($caja->requiere_trabajo == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                            </select>
                                                                                                        </td>
                                                                                                        <td><input type="text" class="form-control form-control-sm" id="porcentaje_vida_util_box_{{$caja->id}}" name="porcentaje_vida_util_box[{{$producto->id}}][]" readonly value="{{$caja->porcentaje_vida_util}}" placeholder="Porcentaje vida útil trascurrida"></td>
                                                                                                        <td><input type="text" class="form-control form-control-sm" name="temp_producto_box[{{$producto->id}}][]" value="{{$caja->temp_producto}}" placeholder="Tº Producto"></td>
                                                                                                        <td>
                                                                                                            <select class="selectpicker" name="defecto_box[{{$producto->id}}][]" data-live-search="true" data-width="100%" title="Seleccione">
                                                                                                                @foreach ($defectos as $item)
                                                                                                                    <option {{($caja->defectos == $item->id) ? 'selected' : '';}} value="{{$item->id}}">{{$item->nombre}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th colspan="4">Observaciones</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="4">
                                                                                                            <textarea class="form-control form-control-sm" id="observacion_box_{{$caja->id}}" name="observacion_box[{{$producto->id}}][]" rows="3" placeholder="Observaciones">{{$caja->obs}}</textarea>
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
                                                    @endif
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
                    @if ($recepcion->status == 1 || empty($recepcion->id))
                        <button class="btn btn-primary btn-icon-split" type="submit">
                            <span class="icon text-white-50">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Guardar</span>
                        </button>
                    @endif
                    @if ($recepcion->status != 2 && !empty($recepcion->id))
                        <button class="btn btn-danger btn-icon-split" type="button" id="cerrarBtn">
                            <span class="icon text-white-50">
                                <i class="fa fa-times"></i>
                            </span>
                            <span class="text">Cerrar</span>
                        </button>
                    @endif
                    @if ($recepcion->status == 2 && !empty($recepcion->id))
                        <button class="btn btn-primary btn-icon-split" type="button" id="abrirBtn">
                            <span class="icon text-white-50">
                                <i class="fa fa-check"></i>
                            </span>
                            <span class="text">Abrir</span>
                        </button>
                    @endif
		        </div>
            </form>
        </div>
    </div>
    @include('partials.search-productos-modal')
    
    <script>
        function fnAddMoreProducto(id,producto,sap,vida_util,tolerancia_ingreso,tolerancia_despacho,dias_antes_vencer) {
            //n_cortes = parseInt($('#n_cortes_r').val());
			//$('#n_cortes_r').val(n_cortes+1);
            
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#producto_").clone().removeClass("d-none");
            clone.find('.tittle-producto').html(producto);
            clone.attr("id", "producto_"+number).removeClass("d-none");
            clone.find('.producto').attr('name','producto[]').val(producto);
            clone.find('.id-producto').attr('name','id_producto[]').val(id);
            clone.find('.sap-producto').attr('name','sap_producto[]').val(sap);
            clone.find('.vida-util-producto').attr('name','vida_util_producto[]').val(vida_util).attr('id','vida_util_producto_'+number);
            clone.find('.tolerancia-ingreso').attr('name','tolerancia_ingreso[]').val(tolerancia_ingreso).attr('id','tolerancia_ingreso_'+number);
            clone.find('.tolerancia-despacho').attr('name','tolerancia_despacho[]').val(tolerancia_despacho).attr('id','tolerancia_despacho_'+number);
            clone.find('.dias-antes-vencer').attr('name','dias_antes_vencer[]').val(dias_antes_vencer).attr('id','dias_antes_vencer_'+number);
            clone.find('.id-producto-recepcion').attr('name','id_producto_recepcion[]').val(number);
            clone.find('.add-more-box').attr("onclick","fnAddMoreBox("+number+","+sap+")");
            clone.find('.box-producto').addClass("box-producto-"+number);
            clone.find('.btn-delete-producto').attr("onclick","fnDeleteProducto("+number+")");
            $('.productos-div').append(clone.show());
            
        }
        function fnAddMoreBox(number,sap) {
            //n_cajas_revisadas = parseInt($('#n_cajas_revisadas').val());
		    //$('#n_cajas_revisadas').val(n_cajas_revisadas+1).trigger("change");            
            random = Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#producto_box_").clone().removeClass("d-none").addClass('count-box');
            clone.attr("id", "producto_box_"+random).removeClass("d-none").addClass('box-'+number);
            clone.find('.fecha-elab-box').attr('name','fecha_elab_box['+number+'][]');
            clone.find('.sap-box').attr('name','sap_box['+number+'][]').val(sap);
            clone.find('.lote-box').attr('name','lote_box['+number+'][]');
            clone.find('.marca-box').attr('name','marca_box['+number+'][]');
            clone.find('.vencimiento-box').attr('name','vencimiento_box['+number+'][]').attr('id','vencimiento_box_'+random).attr('onchange','fnChangePorceVU('+number+','+random+')');
            clone.find('.cant-cajas-box').attr('name','cant_cajas_box['+number+'][]');
            clone.find('.requiere-etiquetado-box').attr('name','requiere_etiquetado_box['+number+'][]');
            clone.find('.requiere-sello-alto-box').attr('name','requiere_sello_alto_box['+number+'][]');
            clone.find('.requiere-trabajo-box').attr('name','requiere_trabajo_box['+number+'][]');
            clone.find('.procentaje-vida-util-box').attr('name','porcentaje_vida_util_box['+number+'][]').attr('id','porcentaje_vida_util_box_'+random);
            clone.find('.temp-producto-box').attr('name','temp_producto_box['+number+'][]');
            clone.find('.defecto-box').attr('name','defecto_box['+number+'][]').addClass('selectpicker').selectpicker('render');
            clone.find('.observacion-box').attr('name','observacion_box['+number+'][]').attr('id','observacion_box_'+random);
            clone.find('.btn-delete-box').attr('onclick',"$('#producto_box_"+random+"').remove()");
            $('.box-producto-'+number).append(clone.show());
            //fnPorceCajaRev()
            sonn=1;
            $('.box-'+number).each(function(){
                $(this).find('.box-number').html(sonn)
                if(sonn == 1){
                    $(this).addClass('first-box'+number);
                }
                sonn++;
            });	
        }
        function fnDeleteProducto(id) {
            $('#producto_'+id).remove();
            //n_cortes = parseInt($('#n_cortes_r').val());
            //$('#n_cortes_r').val(n_cortes-1);
            //fnPorceCajaRev();
        }
        function fnCalculateMuestra() {
            cant_revisadas=0;
            cant_revisadas=$('#cant_revisadas').val();
            cant_recepcionadas=$('#cant_recepcionadas').val();
            $('#porcentaje_muestra').val(parseFloat(cant_revisadas/cant_recepcionadas*100).toFixed(2));
        }
        $('#cant_revisadas, #cant_recepcionadas').on('blur', fnCalculateMuestra);

        function fnChangePorceVU(id_prod,aleatorio) {
            porcentaje_vida_util=0;
            fecha_despacho_msj='';
            msj='';
            if($('#vencimiento_box_'+aleatorio).val() && $('#f_recepcion').val()){
                f_recepcion = moment($('#f_recepcion').val());
                f_vencimiento = moment($('#vencimiento_box_'+aleatorio).val());
                vu_sap = $('#vida_util_producto_'+id_prod).val();
                dias_para_vencer=f_vencimiento.diff(f_recepcion, 'days');
                //vu_sap = 200;
                dias_transcurridos = vu_sap - dias_para_vencer;
                porcentaje_vida_util = parseFloat(dias_transcurridos/vu_sap*100).toFixed(2);


                //Fecha vencimiento – días de despacho 
                //CAMBIAR 03112020 dias_despachop = $('#plazo_despacho_bodega_'+id_prod).val();
                dias_despachop = $('#tolerancia_despacho_'+id_prod).val() //10;
                fecha_venc=$('#vencimiento_box_'+aleatorio).val();
                fecha_venc = fecha_venc.split('-');
                fecha_vencimiento = fecha_venc[2]+'/'+fecha_venc[1]+'/'+fecha_venc[0];
                console.log(fecha_vencimiento);
                fecha_despacho = sumaFecha(dias_despachop,fecha_vencimiento);
                fecha_despacho_msj = ' fecha de despacho desde la bodega '+fecha_despacho;
                //$('#obs_'+aleatorio).val(fecha_despacho_msj)
                if(porcentaje_vida_util > $('#tolerancia_ingreso_'+id_prod).val()){
                    $('#porcentaje_vida_util_'+aleatorio).css('background-color','red').css('color','white');
                }else{
                    $('#porcentaje_vida_util_'+aleatorio).css('background-color','#eeeeee').css('color','#555555');                
                }
            }
            dias_antes_vencer=$('#dias_antes_vencer_'+id_prod).val();
            plazo_aceptacion_bodega = sumaFecha(dias_antes_vencer,fecha_vencimiento); 
            //Vencimiento - dias_antes_vencer = mensaje 3
                    //Hay que hacer la resta:
                    //09-11-2023 – 1152 = 13-09-2020
                    //Y nos da 
                    //Mensaje 3: Plazo aceptación bodega: 13-09-2020
            msj='';
            msj_2= 'Plazo aceptación bodega: '+plazo_aceptacion_bodega
            $('#observacion_box_'+aleatorio).val($('#observacion_box_'+aleatorio).val()+msj_2)
            if(porcentaje_vida_util > $('#tolerancia_ingreso_'+id_prod).val()){
                msj = ' Producto debería ingresar con '+$('#tolerancia_ingreso_'+id_prod).val()+"%";
                obs = $('#observacion_box_'+aleatorio).val()
                
                if(obs.includes(msj)){

                }else{
                    $('#observacion_box_'+aleatorio).val(obs+msj)
                } 
            }else{
                obs = $('#observacion_box_'+aleatorio).val()
                obs.replace('', msj);
            }
            $('#observacion_box_'+aleatorio).val(fecha_despacho_msj+' '+msj+' '+msj_2)
            $('#porcentaje_vida_util_box_'+aleatorio).val(porcentaje_vida_util);
        }
        function sumaFecha(d, fecha){
            var Fecha = new Date();
            var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
            var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
            var aFecha = sFecha.split(sep);
            var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
            fecha= new Date(fecha);
            fecha.setDate(fecha.getDate()-parseInt(d));
            var anno=fecha.getFullYear();
            var mes= fecha.getMonth()+1;
            var dia= fecha.getDate();
            mes = (mes < 10) ? ("0" + mes) : mes;
            dia = (dia < 10) ? ("0" + dia) : dia;
            var fechaFinal = dia+sep+mes+sep+anno;
            return (fechaFinal);
        }
        $('#cerrarBtn').click(function (e) { 
            $('#status').val(2);
            $('#recepcionForm').submit();
        });
        $('#abrirBtn').click(function (e) { 
            $('#status').val(1);
            $('#recepcionForm').submit();
        });
        ///////////////////////////////////////////////////////////////
        
    </script>
</x-layout>