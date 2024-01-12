<x-layout>
	<x-slot name="breadcrumb">
		Recepciones
	</x-slot>
<div class="row">
	<div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buscar Recepciones</h6>
            </div>
            <div class="card-body">
               	<form method="POST" action="{{ route('recepciones.list.proceso')}}">
               		@csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nombreProv">Mes Creado:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" name="mes_creado" id="mes_creado" data-live-search="true" title="Mes Creado">
                                    <option value="99">Todos</option>
                                    @foreach ($meses_array as $key => $value)
                                        <option {{($key == $request['mes_creado']) ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nombreProv">Año Creado:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" name="ano_creado" id="ano_creado" data-live-search="true" title="Año Creado">
                                    @for ($i = 2023; $i <= date('Y'); $i++)
                                        <option {{($i == $request['ano_creado']) ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
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
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recepciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>OC</th>
                                <th>Proveedor</th>
                                <th>Fecha Revisión</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recepciones as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->oc}}</td>
                                    <td>{{$item->proveedor}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->f_recepcion))}}</td>
                                    <td>
                                        <form class="form-inline" id="deleteForm_{{$item->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <a class="btn btn-primary btn-circle btn-sm" href="{{route('recepciones.edit',$item->id)}}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('recepciones.delete')}}',{{$item->id}},'{{$item->id}}')">
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
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        $('#collapseRecepciones').addClass('show');
    });
</script>
</x-layout>