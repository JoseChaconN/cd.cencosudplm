<x-layout>
	<x-slot name="breadcrumb">
		Frigorifico
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Frigorifico</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($frigorifico->id)) ? route('frigorificos.update',$frigorifico->id) : route('frigorificos.store') }}">
	        	@csrf
	        	@if(!empty($frigorifico->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre' , $frigorifico->nombre)}}" placeholder="Nombre">
								</div>
							</div>
						</div>
	        		</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="card shadow mb-4">
									<a href="#collapseCardRazonSocial" class="d-block card-header py-3" data-toggle="collapse"
										role="button" aria-expanded="true" aria-controls="collapseCardRazonSocial">
										<h6 class="m-0 font-weight-bold text-primary">Razones Sociales</h6>
									</a>
									<!-- Card Content - Collapse -->
									<div class="collapse" id="collapseCardRazonSocial">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 text-right">
													<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreRazonSocial()">
														<span class="icon text-white-50">
															<i class="fas fa-plus"></i>
														</span>
														<span class="text">Agregar Más</span>
													</button>
												</div>
												<div class="col-md-12" id="razon_social_" style="display: none;">
													<input type="hidden" class="id_razon_social" value="">
													<div class="col-md-12">
														<label>Razón Social:</label>
														<button class="btn-danger btn-circle btn-sm btn-delete-razon-social" type="button"><i class="fas fa-trash"></i></button>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">Razón Social:</label>
															<div class="col-sm-8">
																<input type="text" class="form-control form-control-sm razon_social" placeholder="Nombre" value="">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">Rut:</label>
															<div class="col-sm-8">
																<input type="text" class="form-control form-control-sm rut" placeholder="Rut" value="">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">Marca:</label>
															<div class="col-sm-8">
																<input type="text" class="form-control form-control-sm marca" placeholder="Marca" value="">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">SIF/N:</label>
															<div class="col-sm-8">
																<input type="text" class="form-control form-control-sm sif" placeholder="sif_1,sif_2,sif_3" value="">
															</div>
															<div class="col-md-12">
																<span>Recuerde los SIF/N van separados por coma(,)</span>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">País:</label>
															<div class="col-sm-8">
																<select class="form-control pais" data-live-search="true" title="Paises">
																	@foreach ($paises as $item)
																		<option value="{{$item->id}}">{{$item->nombre}}</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group row">
															<label class="col-sm-4 col-form-label font-weight-bold">Planillas:</label>
															<div class="col-sm-8">
																<select class="form-control planillas" multiple data-live-search="true" title="Planillas">
																	@foreach ($planillas_cd as $key => $value)
																		<option value="{{$value['val']}}">{{$value['text']}}</option>
																	@endforeach
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<hr>
													</div>
												</div>
												<div class="razon-social-div col-md-12">
													@if (!empty($frigorifico->id))
													@foreach ($frigorifico->razones_sociales as $razon_social)
													<div class="col-md-12" id="razon_social_{{$razon_social->id}}">
														<input type="hidden" name="id_razon_social[]" value="{{$razon_social->id}}">
														<div class="col-md-12">
															<label>Razón Social:</label>
															<button class="btn-danger btn-circle btn-sm btn-delete-razon-social" type="button"><i class="fas fa-trash"></i></button>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">Razón Social:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control form-control-sm" name="razon_social[{{$razon_social->id}}]" placeholder="Nombre" value="{{$razon_social->razon_social}}">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">Rut:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control form-control-sm" name="rut[{{$razon_social->id}}]" placeholder="Rut" value="{{$razon_social->rut}}">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">Marca:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control form-control-sm" name="marca[{{$razon_social->id}}]" placeholder="Marca" value="{{$razon_social->marca}}">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">SIF/N:</label>
																<div class="col-sm-8">
																	<input type="text" class="form-control form-control-sm" name="sif[{{$razon_social->id}}]" placeholder="sif_1,sif_2,sif_3" value="{{$razon_social->sif}}">
																</div>
																<div class="col-md-12">
																	<span>Recuerde los SIF/N van separados por coma(,)</span>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">País:</label>
																<div class="col-sm-8">
																	<select class="form-control selectpicker" name="pais[{{$razon_social->id}}]" data-live-search="true" title="Paises">
																		@foreach ($paises as $item)
																			<option {{($razon_social->pais == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->nombre}}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group row">
																<label class="col-sm-4 col-form-label font-weight-bold">Planillas:</label>
																<div class="col-sm-8">
																	<select class="form-control selectpicker" name="planillas[{{$razon_social->id}}][]" multiple data-live-search="true" title="Planillas">
																		@foreach ($planillas_cd as $key => $value)
																			<option {{(!empty($razon_social->planillas) && in_array($value['val'],json_decode($razon_social->planillas,TRUE))) ? 'selected' : ''}} value="{{$value['val']}}">{{$value['text']}}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<hr>
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
		function fnAddMoreRazonSocial() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#razon_social_").clone().removeClass("hide");
            clone.attr("id", "razon_social_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
			
			clone.find('.id_razon_social').attr('name','id_razon_social[]').val(number);
			clone.find('.razon_social').attr('name','razon_social['+number+']');
			clone.find('.rut').attr('name','rut['+number+']');
			clone.find('.marca').attr('name','marca['+number+']');
			clone.find('.sif').attr('name','sif['+number+']');
			clone.find('.pais').attr('name','pais['+number+']').addClass('selectpicker show-tick').selectpicker('render');
			clone.find('.planillas').attr('name','planillas['+number+'][]').addClass('selectpicker show-tick').selectpicker('render');
            clone.find('.btn-delete-razon-social').attr("onclick","$('#razon_social_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.razon-social-div').append(clone.show());
        }
	</script>
	<script>
		jQuery(document).ready(function(){
			$('#collapseFrigorifico').addClass('show');
		});
	</script>
</x-layout>