<div class="modal" tabindex="-1" id="searchProductoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar Producto.</h5>
            </div>
            <form method="POST" id="searchProductoForm" action="{{route('productos.search')}}">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre_producto">Nombre producto:</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_producto" id="nombre_producto" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="codigo_producto">Código SAP:</label>
                            <input type="text" class="form-control form-control-sm" name="codigo_producto" id="codigo_producto" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Código</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody id="searchProductoTableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="searchProductoBtn">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#searchProductoBtn').click(function () {
        $('#searchProductoTableBody').html('');
        $.post("{{route('productos.search')}}",$("#searchProductoForm").serialize(),function (response) {
            $.each(response.productos, function (index, value) {
                btn = '<button class="btn btn-circle btn-primary" type="button" onclick="fnAddMoreProducto('+value.id+',\''+value.nombre+'\',\''+value.sap+'\',\''+value.vida_util+'\',\''+value.tolerancia_ingreso+'\',\''+value.tolerancia_despacho+'\',\''+value.dias_antes_vence+'\')"><i class="fa fa-check"></i></button>';
                $('#searchProductoTableBody').append('<tr><td>'+value.nombre+'</td><td>'+value.sap+'</td><td>'+btn+'</td></tr>');
            });
                
        });
    });
</script>