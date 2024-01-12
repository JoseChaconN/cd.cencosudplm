<x-layout>
	<x-slot name="breadcrumb">
		Cortes
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Cortes <a class="btn btn-primary" href="{{route('cortes.create')}}">Nuevo Corte</a></h6>
	            </div>
	            <div class="card-body">	            	
	            	<div class="col-md-12">
		            	<div class="col-md-12">
		            		<table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
		                        <thead>
		                            <tr>
		                                <th>Nombre del Corte</th>
                                        <th>Código</th>
                                        <th>Fecha creado</th>
                                        <th>Responsable</th>
		                                <th>Ver</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach($cortes as $item)
		                        		<tr>
			                                <td>{{$item->nombre_corte}}</td>
                                            <td>{{$item->codigo}}</td>
                                            <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                            <td>{{$item->responsable->name.' '.$item->responsable->last_name}}</td>
			                                <td>
                                                <form class="form-inline" id="deleteForm_{{$item->id}}">
                                                    @csrf  
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <a class="btn btn-primary btn-circle btn-sm" href="{{route('cortes.edit',$item->id)}}"><i class="fa fa-check"></i></a>
                                                    <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('cortes.delete')}}',{{$item->id}},'{{$item->nombre_corte}}')">
                                                        <i class="fa fa-trash" title="Eliminar"></i>
                                                    </button>
                                                </form>
			                                </td>
			                            </tr>
		                        	@endforeach
		                        </tbody>
		                    </table>
		            	</div>
	            	</div>
	            	<div class="col-md-12">
	            		<hr class="sidebar-divider">
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
	<script>
		jQuery(document).ready(function(){
			$('#collapseCorte').addClass('show');
		});
	</script>
</x-layout>