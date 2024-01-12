<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <!--div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div-->
            <div class="sidebar-brand-text mx-3">Cencosud PLM Calidad Logística</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestión
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @hasanyrole('admin|administrador|inspecciones')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInspecciones"
                    aria-expanded="true" aria-controls="collapseInspecciones">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inspecciones</span>
                </a>
                <div id="collapseInspecciones" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Inspecciones:</h6>
                        <a class="collapse-item" href="{{route('inspecciones.pre.create')}}">Nueva Inspección</a>
                        <a class="collapse-item" href="{{route('inspecciones.list.proceso')}}">Inspecciones en Proceso</a>
                        <a class="collapse-item" href="{{route('inspecciones.list.cerrado')}}">Inspecciones Cerradas</a>
                    </div>
                </div>
            </li>
        @endhasanyrole
        @hasanyrole('admin|administrador|recepciones')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecepciones"
                    aria-expanded="true" aria-controls="collapseRecepciones">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Recepciones</span>
                </a>
                <div id="collapseRecepciones" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Recepciones:</h6>
                        <a class="collapse-item" href="{{route('recepciones.pre.create')}}"> Nueva Recepción</a>
                        <a class="collapse-item" href="{{route('recepciones.list.proceso')}}"> Recepciones en Proceso</a>
                        <a class="collapse-item" href="{{route('recepciones.list.cerrado')}}"> Recepciones Cerradas</a>
                    </div>
                </div>
            </li>
        @endhasanyrole
        @hasanyrole('admin|administrador')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFrigorifico"
                    aria-expanded="true" aria-controls="collapseFrigorifico">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Frigorificos</span>
                </a>
                <div id="collapseFrigorifico" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Frigorificos:</h6>
                        <a class="collapse-item" href="{{route('frigorificos.create')}}">Nuevo Frigorifico</a>
                        <a class="collapse-item" href="{{route('frigorificos.index')}}">Frigorificos</a>
                    </div>
                </div>
            </li>
        @endhasanyrole
        @hasanyrole('admin|administrador')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCorte"
                    aria-expanded="true" aria-controls="collapseCorte">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cortes</span>
                </a>
                <div id="collapseCorte" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cortes:</h6>
                        <a class="collapse-item" href="{{route('cortes.create')}}">Nuevo Corte</a>
                        <a class="collapse-item" href="{{route('cortes.index')}}">Cortes</a>
                    </div>
                </div>
            </li>
        @endhasanyrole
        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- @hasanyrole('admin|administrador|recepcion')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuditoria"
                    aria-expanded="true" aria-controls="collapseAuditoria">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Auditorias</span>
                </a>
                <div id="collapseAuditoria" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Auditorias:</h6>
                        <a class="collapse-item" href="{{route('auditorias.pre_create')}}">Nueva Auditoria</a>
                        <a class="collapse-item" href="{{route('auditorias.index')}}">Listado de Auditorias</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVisitas"
                    aria-expanded="true" aria-controls="collapseVisitas">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Visitas Inspectivas</span>
                </a>
                <div id="collapseVisitas" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Visitas Inspectivas:</h6>
                        <a class="collapse-item" href="{{route('visita.inspectiva.pre_create')}}">Nueva Visita</a>
                        <a class="collapse-item" href="{{route('visita.inspectiva.index')}}">Listado de Visitas</a>
                    </div>
                </div>
            </li>
        @endhasanyrole --}}

        <!-- Nav Item - Utilities Collapse Menu -->        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBiblioteca"
                    aria-expanded="true" aria-controls="collapseBiblioteca">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Biblioteca</span>
                </a>
                <div id="collapseBiblioteca" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Biblioteca:</h6>
                        <a class="collapse-item" href="{{route('biblioteca.index')}}">Biblioteca</a>
                        <a class="collapse-item" href="{{route('biblioteca.create')}}">Cargar Documento</a>
                    </div>
                </div>
            </li>
        {{-- @hasanyrole('admin|administrador')
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministracion"
                    aria-expanded="true" aria-controls="collapseAdministracion">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseAdministracion" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administración:</h6>
                        <a class="collapse-item" href="{{route('documentos.index')}}">Listado tipo Documentos</a>
                        <a class="collapse-item" href="{{route('tags.index')}}">Etiquetas/Tags</a>
                    </div>
                </div>
            </li>
        @endhasanyrole --}}
    </ul>
    <!-- End of Sidebar -->