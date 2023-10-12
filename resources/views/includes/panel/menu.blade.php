<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('Dashboard') }}">
                <i class="fa-solid fa-chart-line text-danger menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Agenda" aria-expanded="false" aria-controls="Agenda">
                <i class="fa-solid fa-calendar-days text-warning menu-icon"></i>
                    <span class="menu-title">Agenda</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Agenda">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('medical-consultations.index') }}">Consultas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('appointments.index') }}">Citas</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Gestion" aria-expanded="false" aria-controls="Gestion">
            <i class="fa-solid fa-bars-progress text-success menu-icon"></i>
                <span class="menu-title">Gestion</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Gestion">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('patients.index') }}">Pacientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('doctors.index') }}">Medicos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('examinations.index') }}">Examenes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('files.index') }}">Expedientes</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Administracion" aria-expanded="false" aria-controls="Administracion">
                <i class="icon-bar-graph text-info menu-icon"></i>
                    <span class="menu-title">Administracion</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Administracion">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('antecedents.index') }}">Antecedentes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('specialties.index') }}">Especialidades</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('diseases.index') }}">Enfermedades</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('disease-groups.index') }}">Enfermedades</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('medicines.index') }}">Medicamentos</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('schedules.index') }}">Horarios</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('type-examinations.index') }}">Tipo de examen</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Configuracion" aria-expanded="false" aria-controls="Configuracion">
            <i class="fa-solid fa-gear menu-icon text-dark"></i>
                <span class="menu-title">Configuracion</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Configuracion">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">Cerrar Sesion
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
                            @csrf
                        </form>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('Perfil') }}">Mi perfil</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>