<ul class="nav nav-tabs">
  <li class="nav-item">
    <a id="menu-home" class="nav-link" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a id="menu-enquete" class="nav-link" href="/enquete">Criar enquete</a>
  </li>
  @if(!empty($logado))
	  <li id="menu-conta" class="nav-item dropdown">
	    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Conta</a>
	    <div class="dropdown-menu">
	      <a class="dropdown-item" href="/visualizar-enquetes">Suas Enquetes</a>
	      <div class="dropdown-divider"></div>
	      <a class="dropdown-item" href="/sair">Sair</a>
	    </div>
	  </li>
  @else	  
	  <li class="nav-item">
	    <a class="nav-link" href="/login">Entrar</a>
	  </li>
  @endif
</ul>