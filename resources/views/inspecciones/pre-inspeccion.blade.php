<x-layout>

	<x-slot name="breadcrumb">
		
	</x-slot>

<div class="row">
	<div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buscar Frigorifico</h6>
            </div>
            <div class="card-body">
               	<form method="POST" action="{{ route('inspecciones.pre.create')}}">
               		@csrf
               		<div class="row">
               			<div class="col-md-4">
							<div class="form-group">
								<label for="nombre_frigorifico">Nombre Frigorifico:</label>
								<input type="text" class="form-control" id="nombre_frigorifico" name="nombre_frigorifico" placeholder="Nombre Frigorifico" value="{{ empty($request['nombre_frigorifico']) ? '' : $request['nombre_frigorifico'] }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="nombre_razon_social">Nombre Razón Social:</label>
								<input type="text" class="form-control" id="nombre_razon_social" name="nombre_razon_social" placeholder="Nombre Razón Social" value="{{ empty($request['nombre_razon_social']) ? '' : $request['nombre_razon_social'] }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rut_razon_social">Rut Razón Social:</label>
								<input type="text" class="form-control" id="rut_razon_social" name="rut_razon_social" placeholder="Rut Razón Social" value="{{ empty($request['rut_razon_social']) ? '' : $request['rut_razon_social'] }}">
							</div>
						</div>
					</div>
				  	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fas fa-search"></i>
	                    </span>
	                    <span class="text">Buscar</span>
	                </button>
               	</form>
            </div>
        </div>
    </div>
    @if(!empty($frigorificos))
	    <div class="col-lg-12">
	    	<div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Razones Sociales Encontradas</h6>
	            </div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
	                        <thead>
	                            <tr>
	                                <th>País</th>
	                                <th>Frigorifico</th>
	                                <th>Razón Social</th>
	                                <th>Rut Razón Social</th>
	                                <th>Formulario</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach($frigorificos as $item)
	                        		<tr>
		                                <td>{{$item->pais_razon->nombre}}</td>
		                                <td>{{$item->frigorifico_razon->nombre}}</td>
		                                <td>{{$item->razon_social}}</td>
		                                <td>{{$item->rut}}</td>
		                                <td>
											@if (!empty($item->planillas))
												@foreach ($planillas_cd as $planilla)
													@if ((!empty($item->planillas) && in_array($planilla['val'],json_decode($item->planillas,TRUE))))
														<a href="{{ route('inspecciones.create',['id' => $item->id , 'planilla' => $planilla['val']])}}" class="btn btn-primary btn-sm">
															Planilla {{$planilla['text']}}
														</a>
													@endif
												@endforeach
											@endif
		                                </td>
		                            </tr>
	                        	@endforeach	                        	
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
    @endif
</div>
<script>
    jQuery(document).ready(function(){
        $('#collapseInspecciones').addClass('show');
    });
</script>
</x-layout>