<x-layout>
	<x-slot name="breadcrumb">
		Frigorificos
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Frigorificos <a class="btn btn-primary" href="{{route('frigorificos.create')}}">Nuevo Frigorifico</a></h6>
	            </div>
	            <div class="card-body">	            	
	            	<div class="col-md-12">
		            	<div class="col-md-12">
		            		<table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
		                        <thead>
		                            <tr>
		                                <th style="width: 70%">Frigorifico</th>
		                                <th>Ver</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach($frigorificos as $item)
		                        		<tr>
			                                <td>{{$item->nombre}}</td>
			                                <td>
			                                	<a class="btn btn-primary btn-circle btn-sm" href="{{route('frigorificos.edit',$item->id)}}">
			                                        <i class="fa fa-check"></i>
			                                    </a>
												<button class="btn btn-info btn-sm" type="button">Ver Razones Sociales</button>
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
			$('#collapseFrigorifico').addClass('show');
		});
	</script>
</x-layout>