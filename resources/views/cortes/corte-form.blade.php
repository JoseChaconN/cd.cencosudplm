<x-layout>
	<x-slot name="breadcrumb">
		Corte
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Corte</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($corte->id)) ? route('cortes.update',$corte->id) : route('cortes.store') }}" enctype="multipart/form-data">
	        	@csrf
	        	@if(!empty($corte->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold text-primary">Descripción del Producto</h6>
                        </div>
                    </div>
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre del corte:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre_corte" class="form-control" value="{{$corte->nombre_corte}}" placeholder="Nombre del corte">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Código:</label>
								<div class="col-sm-8">
									<input type="text" name="codigo" class="form-control" value="{{$corte->codigo}}" placeholder="Código">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Categoría:</label>
								<div class="col-sm-8">
									<input type="text" name="categoria" class="form-control" value="{{$corte->categoria}}" placeholder="Categoría">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Descripción del producto:</label>
								<div class="col-sm-8">
									<input type="text" name="descripcion_producto" class="form-control" value="{{$corte->descripcion_producto}}" placeholder="Descripción del producto">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Conformación muscular:</label>
								<div class="col-sm-8">
                                    <textarea name="conformacion_muscular" class="form-control" style="resize: none;" rows="5" placeholder="Conformación muscular">{{$corte->conformacion_muscular}}</textarea>									
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Forma de consumo:</label>
								<div class="col-sm-8">
									<input type="text" name="forma_consumo" class="form-control" value="{{$corte->forma_consumo}}" placeholder="Forma de consumo">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Formato:</label>
								<div class="col-sm-8">
									<input type="text" name="formato" class="form-control" value="{{$corte->formato}}" placeholder="Formato">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold text-primary">Fotos del Corte <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreImagenes()">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar Más</span>
                            </button></h6>                            
                            <div class="col-md-12">
                                <hr class="sidebar-divider">
                            </div>
                            <div class="col-md-12 mb-4" id="imagen_" style="display:none;">
                                <label>Imagen:</label>
                                <button class="btn-danger btn-circle btn-sm btn-delete-imagen"><i class="fas fa-trash"></i></button>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input imagen_corte">
                                  <label class="custom-file-label" >Subir Imagen</label>
                                </div>
                            </div>
                            <div class="imagenes-div row">
                                @if (!empty($imagenes_corte))
                                    @foreach ($imagenes_corte as $value)
                                        <div class="col-md-4 mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <a href="{{$value['url']}}" target="_blank">
                                                            <img src="{{$value['url']}}" alt="" style="max-height: 150px; max-width:auto">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-danger btn-sm" type="button">Eliminar Imagen</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Requerimientos del corte</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Nota: La prioridad es respetar el rango de pesos por sobre el número de piezas que es referencial</label>
                        </div>
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Cobertura de grasa:</label>
								<div class="col-sm-8">
									<input type="text" name="cobertura_grasa" class="form-control" value="{{$corte->cobertura_grasa}}" placeholder="Cobertura de grasa">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Cantidad de corte por pieza:</label>
								<div class="col-sm-8">
									<input type="text" name="cantidad_corte" class="form-control" value="{{$corte->cantidad_corte}}" placeholder="Cantidad de corte por pieza">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Peso promedio porción del corte:</label>
								<div class="col-sm-8">
									<input type="text" name="peso_prom" class="form-control" value="{{$corte->peso_prom}}" placeholder="Peso promedio porción del corte">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">kg/caja:</label>
								<div class="col-sm-8">
									<input type="text" name="kg_caja" class="form-control" value="{{$corte->kg_caja}}" placeholder="kg/caja">
								</div>
							</div>
						</div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Rotulación Producto envasado, Articulo 107, Reglamento Sanitario de los Alimentos y Ley 19,162 Clasificación de ganado y carne bovina (Envase Primario)</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold">R: Requerido | O: Opcional se puede rotular en Chile</span>
                        </div>
                        <div class="col-md-6">
                            <table class="table-bordered table table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td>
                                            Denominación del corte
                                        </td>
                                        <td>
                                            <select name="denominacion_corte" class="form-control">
                                                <option {{$corte->denominacion_corte == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->denominacion_corte == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Categoría de la canal
                                        </td>
                                        <td>
                                            <select name="categoria_canal" class="form-control">
                                                <option {{$corte->categoria_canal == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->categoria_canal == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nombre, número y domicilio del establecimiento procesador o envasador
                                        </td>
                                        <td>
                                            <select name="direccion_procesador" class="form-control">
                                                <option {{$corte->direccion_procesador == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->direccion_procesador == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nombre y numero de la planta faenadora
                                        </td>
                                        <td>
                                            <select name="nombre_planta" class="form-control">
                                                <option {{$corte->nombre_planta == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->nombre_planta == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nombre y dirección del Importador
                                        </td>
                                        <td>
                                            <select name="direccion_importador" class="form-control">
                                                <option {{$corte->direccion_importador == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->direccion_importador == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Resolución Sanitaria de Importación
                                        </td>
                                        <td>
                                            <select name="resolucion_sanitaria_importacion" class="form-control">
                                                <option {{$corte->resolucion_sanitaria_importacion == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->resolucion_sanitaria_importacion == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Peso Neto
                                        </td>
                                        <td>
                                            <select name="peso_neto" class="form-control">
                                                <option {{$corte->peso_neto == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->peso_neto == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            País de Origen
                                        </td>
                                        <td>
                                            <select name="pais_origen" class="form-control">
                                                <option {{$corte->pais_origen == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->pais_origen == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Condiciones de Almacenamiento
                                        </td>
                                        <td>
                                            <select name="condiciones_almacenamiento" class="form-control">
                                                <option {{$corte->condiciones_almacenamiento == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->condiciones_almacenamiento == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Día mes y año fecha beneficio/producción/envasado
                                        </td>
                                        <td>
                                            <select name="fecha_beneficio" class="form-control">
                                                <option {{$corte->fecha_beneficio == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->fecha_beneficio == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fecha vencimiento o duración
                                        </td>
                                        <td>
                                            <select name="fecha_vencimiento" class="form-control">
                                                <option {{$corte->fecha_vencimiento == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->fecha_vencimiento == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Lote
                                        </td>
                                        <td>
                                            <select name="lote" class="form-control">
                                                <option {{$corte->lote == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->lote == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tabla nutricional en formato chileno(indicar fuente de obtención de la información) *
                                        </td>
                                        <td>
                                            <select name="tabla_nutricional" class="form-control">
                                                <option {{$corte->tabla_nutricional == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->tabla_nutricional == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-4">
                                <label class="font-weight-bold">Etiqueta ubicada en la cara superior del corte:</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="etiqueta_superior">
                                  <label class="custom-file-label" >Subir Imagen</label>
                                </div>
                            </div>
                            @if (!empty($etiqueta_superior))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$etiqueta_superior}}" target="_blank">
                                                    <img src="{{$etiqueta_superior}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12 mb-4">
                                <label class="font-weight-bold">Etiqueta ubicada en la cara posterior del corte:</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="etiqueta_posterior">
                                  <label class="custom-file-label" >Subir Imagen</label>
                                </div>
                            </div>
                            @if (!empty($etiqueta_posterior))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$etiqueta_posterior}}" target="_blank">
                                                    <img src="{{$etiqueta_posterior}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold text-primary">Etiqueta contacto corte</h6>
                        </div>
                    </div>
                    <div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Dimensiones Etiqueta:</label>
								<div class="col-sm-8">
									<input type="text" name="dimensiones_etiqueta" class="form-control" value="{{$corte->dimensiones_etiqueta}}" placeholder="Dimensiones Etiqueta">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Materialidad Etiqueta:</label>
								<div class="col-sm-8">
									<textarea rows="5" name="materialidad_etiqueta" class="form-control" placeholder="Materialidad Etiqueta">{{$corte->materialidad_etiqueta}}</textarea>
								</div>
							</div>
						</div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold text-primary">Envase en contacto con el corte</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Materialidad Bolsa:</label>
								<div class="col-sm-8">
									<textarea rows="5" name="materialidad_bolsa" class="form-control" placeholder="Materialidad Bolsa">{{$corte->materialidad_bolsa}}</textarea>
								</div>
							</div>
						</div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Rotulación de la caja Ley 19.162 Clasificación de ganado y carne bovina (Envase Secundario)</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold">R: Requerido | O: Opcional se puede rotular en Chile</span>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td>Denominación del corte</td>
                                        <td>
                                            <select name="denominacion_corte_1" class="form-control">
                                                <option {{$corte->denominacion_corte_1 == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->denominacion_corte_1 == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Categoría de la canal</td>
                                        <td>
                                            <select name="categoria_canal_1" class="form-control">
                                                <option {{$corte->categoria_canal_1 == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->categoria_canal_1 == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nombre, número y domicilio del establecimiento procesador o envasador</td>
                                        <td>
                                            <select name="direccion_procesador_1" class="form-control">
                                                <option {{$corte->direccion_procesador_1 == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->direccion_procesador_1 == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peso bruto, peso neto y cantidad de cortes por caja</td>
                                        <td>
                                            <select name="peso_bruto" class="form-control">
                                                <option {{$corte->peso_bruto == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->peso_bruto == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Día mes y año fecha beneficio/producción/envasado</td>
                                        <td>
                                            <select name="fecha_beneficio_1" class="form-control">
                                                <option {{$corte->fecha_beneficio_1 == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->fecha_beneficio_1 == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fecha vencimiento o duración</td>
                                        <td>
                                            <select name="fecha_vencimiento_1" class="form-control">
                                                <option {{$corte->fecha_vencimiento_1 == 'R' ? 'selected' : ''}} value="R">R</option>
                                                <option {{$corte->fecha_vencimiento_1 == 'O' ? 'selected' : ''}} value="O">O</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-4">
                                <label class="font-weight-bold">Etiqueta ubicada en la caja al menos en una de las caras frontales:</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="etiqueta_frontal">
                                  <label class="custom-file-label" >Subir Imagen</label>
                                </div>
                            </div>
                            @if (!empty($etiqueta_frontal))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$etiqueta_frontal}}" target="_blank">
                                                    <img src="{{$etiqueta_frontal}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Requerimientos legales</h6>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="requerimientos_legales" placeholder="Requerimientos legales" rows="5">{{$corte->requerimientos_legales}}</textarea>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Documentos legales para importar</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Certificado Sanitario de origen:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="certificado_sanitario" placeholder="Certificado Sanitario de origen" value="{{$corte->certificado_sanitario}}">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Numero de la planta habilitación SAG:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="numero_planta" placeholder="Numero de la planta habilitación SAG" value="{{$corte->numero_planta}}">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Packing list:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="packing_list" placeholder="Packing list" value="{{$corte->packing_list}}">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Resolucion Nº833 del SAG:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="resolucion_sag" placeholder="Resolucion Nº833 del SAG" value="{{$corte->resolucion_sag}}">
								</div>
							</div>
						</div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Requerimientos del transporte</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Paletizado:</label>
								<div class="col-sm-8">
									<textarea rows="5" class="form-control" name="paletizado" placeholder="Paletizado">{{$corte->paletizado}}</textarea>
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Imagén 1 de Paletizado:</label>
								<div class="col-sm-8">
									<div class="custom-file">
                                        <input type="file" class="custom-file-input" name="paleta_1">
                                        <label class="custom-file-label" >Subir Imagen</label>
                                      </div>
								</div>
							</div>
                            @if (!empty($paleta_1))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$paleta_1}}" target="_blank">
                                                    <img src="{{$paleta_1}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Imagén 2 de Paletizado:</label>
								<div class="col-sm-8">
									<div class="custom-file">
                                        <input type="file" class="custom-file-input" name="paleta_2">
                                        <label class="custom-file-label" >Subir Imagen</label>
                                      </div>
								</div>
							</div>
                            @if (!empty($paleta_2))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$paleta_2}}" target="_blank">
                                                    <img src="{{$paleta_2}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Imagén 3 de Paletizado:</label>
								<div class="col-sm-8">
									<div class="custom-file">
                                        <input type="file" class="custom-file-input" name="paleta_3">
                                        <label class="custom-file-label" >Subir Imagen</label>
                                      </div>
								</div>
							</div>
                            @if (!empty($paleta_3))
                                <div class="col-md-4 mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{$paleta_3}}" target="_blank">
                                                    <img src="{{$paleta_3}}" alt="" style="max-height: 150px; max-width:auto">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Carga y estiba:</label>
								<div class="col-sm-8">
									<textarea rows="5" class="form-control" name="carga_estiba" placeholder="Carga y estiba">{{$corte->carga_estiba}}</textarea>
								</div>
							</div>
						</div>
	        		</div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Cadena de Frío</h6>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="cadena_frio" placeholder="Cadena de Frío" rows="5">{{$corte->cadena_frio}}</textarea>
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-12">
                            <h6 class="font-weight-bold text-primary">Tolerancia de fechas</h6>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="tolerancia_fechas" placeholder="Tolerancia de fechas" rows="5">{{$corte->tolerancia_fechas}}</textarea>
                        </div>
                    </div>
					<div class="mt-4 row">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="card shadow mb-4">
									<a href="#collapseCardRevision" class="d-block card-header py-3" data-toggle="collapse"
										role="button" aria-expanded="true" aria-controls="collapseCardRevision">
										<h6 class="m-0 font-weight-bold text-primary">Tabla de Revisiones</h6>
									</a>
									<!-- Card Content - Collapse -->
									<div class="collapse show" id="collapseCardRevision">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreRevision()">
														<span class="icon text-white-50">
															<i class="fas fa-plus"></i>
														</span>
														<span class="text">Agregar Más</span>
													</button>
												</div>
                                                <div class="mt-4 col-md-12">
                                                    <table class="table table-bordered table-hover table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th width="20%">Numero de Revisión</th>
                                                                <th>Fecha de Revisión</th>
                                                                <th>Descripción del Cambio</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bodyTableRevisiones">
                                                            <tr id="tr_" style="display: none;">
                                                                <td class="n_revision">-</td>
                                                                <td><input type="date" class="form-control fecha_revision"></td>
                                                                <td><textarea rows="3" class="form-control obs_revision" style="resize: none" placeholder="Descripción del Cambio"></textarea></td>
                                                                <td><button class="btn-danger btn-circle btn-sm btn-delete-revision"><i class="fas fa-trash"></i></button></td>
                                                            </tr>
                                                            @if (!empty($corte->revisiones))
                                                                @foreach (json_decode($corte->revisiones,TRUE) as $item)
                                                                    <tr>
                                                                        <td class="n_revision">-</td>
                                                                        <td><input type="hidden" name="fecha_revision[]" value="{{$item['fecha_revision']}}">{{date('d-m-Y',strtotime($item['fecha_revision']))}}</td>
                                                                        <td><input type="hidden" name="obs_revision[]" value="{{$item['obs_revision']}}">{{$item['obs_revision']}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table-bordered table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Preparado por</th>
                                        <th style="text-align: center;">Aprobado por</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <textarea class="form-control" placeholder="Preparado por" name="responsable_preparado" style="resize: none;" rows="2">{{$corte->responsable_preparado}}</textarea>
                                        </td>
                                        <td>
                                            <textarea class="form-control" placeholder="Aprobado por" name="responsable_aprobado" style="resize: none;" rows="2">{{$corte->responsable_aprobado}}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
	        	</div>
	        	<div class="card-footer text-right">
                    @if (!empty($corte->id))
                        <button class="btn btn-danger btn-icon-split" type="button">
                            <span class="icon text-white-50">
                                <i class="fa fa-times"></i>
                            </span>
                            <span class="text">Eliminar</span>
                        </button>
                        <button class="btn btn-primary btn-icon-split" type="button">
                            <span class="icon text-white-50">
                                <i class="fa fa-file"></i>
                            </span>
                            <span class="text">PDF</span>
                        </button>
                    @endif
		        	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fa fa-check"></i>
	                    </span>
	                    <span class="text">Guardar</span>
	                </button>
		        </div>
	        </form>
	    </div>
	</div>
	<script>
		function fnAddMoreImagenes() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#imagen_").clone().removeClass("hide");
            clone.attr("id", "imagen_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.imagen_corte').attr('name','imagen_corte[]');
            clone.find('.btn-delete-imagen').attr("onclick","$('#imagen_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.imagenes-div').append(clone.show());
        }
        function fnAddMoreRevision() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#tr_").clone().removeClass("hide");
            clone.attr("id", "tr_"+number).removeClass("hide");
            clone.find('.fecha_revision').attr("name","fecha_revision[]").val('');
            clone.find('.obs_revision').attr("name","obs_revision[]").val('');

            clone.find('.btn-delete-revision').attr("onclick","$('#tr_"+number+"').remove()");
            $('.bodyTableRevisiones').append(clone.show());
        }
	</script>
    <script>
		jQuery(document).ready(function(){
			$('#collapseCorte').addClass('show');
		});
	</script>
</x-layout>