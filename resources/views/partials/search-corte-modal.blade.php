<div class="modal" tabindex="-1" id="searchCorteModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar Corte.</h5>
            </div>
            <form method="POST" id="searchCorteForm" action="{{route('cortes.search')}}">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre_corte">Nombre Corte:</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_corte" id="nombre_corte" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="codigo_corte">Código Corte:</label>
                            <input type="text" class="form-control form-control-sm" name="codigo_corte" id="codigo_corte" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Corte</th>
                                    <th>Código</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody id="searchCorteTableBody"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="searchCorteBtn">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>