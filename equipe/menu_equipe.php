<!--MENU DE NAVEGAÇÃO-->

<nav class="bg-info navbar-expand-lg navbar-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item pl-3 pr-3">
                <a class="navbar-brand pl-3" href="#">SISTEMA RUI BARBOSA</a>
            </li>
            <li class="nav-item text-white bg-success pl-3 pr-3">
                <a class="nav-link text-white"  href="equipe_index.php"><strong><i class="fas fa-home"></i>     INÍCIO</strong></a>
            </li>


            <li class="nav-item dropdown pl-3 pr-3">
                <a class="nav-link dropdown-toggle text-white bg-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sd-card"></i>     <strong>CADASTRAR</strong></a>
                <div class="dropdown-menu bg-info">
                    <a class="dropdown-item text-white bg-info" href="equipe_cadastrar_horas_func.php"><i class="fas fa-business-time text-white"></i>      HORAS FUNCIONÁRIOS</a>
                    <a class="dropdown-item text-white bg-info" href="equipe_cadastrar_horas.php"><i class="fas fa-user-clock text-white"></i>      HORAS PROFESSORES</a>


                </div>
            </li>


            <li class="nav-item dropdown pl-3 pr-3">
                <a class="nav-link dropdown-toggle text-white bg-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i>     <strong>CONSULTAR</strong></a>
                <div class="dropdown-menu bg-info">
                    <a class="dropdown-item text-white bg-info" href="equipe_agenda.php"><i class="far fa-calendar-alt text-white"></i>      AGENDA</a>
                     <a class="dropdown-item text-white bg-info" href="equipe_consultar_formativa.php"><i class="fas fa-graduation-cap text-white"></i>     FORMATIVA</a>
                    <a class="dropdown-item text-white bg-info" href="equipe_consultar_horas_func.php"><i class="fas fa-business-time text-white"></i>     HORAS FUNCIONÁRIOS</a>
                    <a class="dropdown-item text-white bg-info" href="equipe_consultar_horas.php"><i class="fas fa-user-clock text-white"></i>     HORAS PROFESSORES</a>
                    <a class="dropdown-item text-white bg-info" href="equipe_visualizar_medias.php"><i class="far fa-bookmark text-white"></i>     MÉDIA</a>
                    <a class="dropdown-item text-white bg-info" href="equipe_visualizar_notas.php"><i class="fas fa-award text-white"></i>     NOTAS</a>


                </div>
            </li>

            <li class="nav-item dropdown pl-3 pr-3">
                <a class="nav-link dropdown-toggle text-white bg-info" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i> <strong>ALTERAR</strong></a>
                <div class="dropdown-menu bg-info">
                    <a class="dropdown-item text-white bg-info" href="equipe_alterar_cadastro.php"><i class="far fa-address-card text-white"></i>     DADOS CADASTRAIS</a>
                </div>
            </li>


            <li class="nav-item text-white bg-danger pl-3 pr-3" style="float: right;">
                <a class="nav-link text-white"  href="../functions/logout.php"><strong><i class="fas fa-sign-out-alt"></i>     SAIR</strong></a>
            </li>
        </ul>
    </div>
</nav>