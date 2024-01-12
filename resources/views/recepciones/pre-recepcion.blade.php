<x-layout>
	<x-slot name="breadcrumb">
		
	</x-slot>

    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Buscar Proveedor</h6>
                </div>
                <div class="card-body">
                       <form method="POST" action="{{ route('recepciones.pre.create')}}">
                           @csrf
                           <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ empty($request['nombre']) ? '' : $request['nombre'] }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rut">Rut:</label>
                                    <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut" value="{{ empty($request['rut']) ? '' : $request['rut'] }}">
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
        @if(!empty($proveedores))
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
                                        <th>Proveedor</th>
                                        <th>Rut</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proveedores as $item)
                                        <tr>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->rut}}</td>
                                            <td>
                                                <a href="{{ route('recepciones.create',$item->id)}}" class="btn btn-primary btn-sm">
                                                   Crear Importación
                                                </a>
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
            $('#collapseRecepciones').addClass('show');
        });
    </script>
</x-layout>