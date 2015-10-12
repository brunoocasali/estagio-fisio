<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="painel.php"><img src="images/logo.png" width="42px" height="30px;"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <!--<li><a href="painel.php">Início</a></li>-->
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="pesq_paciente.php">Buscar paciente</a></li>
            <li><a href="cad_paciente.php">Efetuar cadastro</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agenda<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="exibe_agenda.php">Verificar Agenda</a></li>
            <li><a href="cad_consulta.php">Marcar consulta</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?go=sair">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>



