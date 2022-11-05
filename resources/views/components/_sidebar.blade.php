<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-school"></i>
        </div>
        <div class="sidebar-brand-text">Sistema Escolar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('aluno.index') }}">
            <i class="fa-solid fa-screen-users"></i>
            <span>Alunos</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('curso.index') }}">
            <i class="fa-solid fa-books"></i>
            <span>Cursos</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('matricula.index') }}">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Matriculas</span>
        </a>
    </li>
</ul>
