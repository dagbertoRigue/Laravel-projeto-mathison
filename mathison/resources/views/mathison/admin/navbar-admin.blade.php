<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                <li>
                  @if (Auth::guest('admin'))
                    {{--<li></li><li></li>--}}
                  @else
                      <a href="#menu-toggle-side" id="menu-toggle-side">
                        <button type="button" class="btn btn-default btnMenu">
                          <i class="fa fa-list"></i>
                        </button>
                      </a>
                  @endif
                </li>
                <li>
                  <a class="navbar-brand" href="{{ route('mathison.home') }}">
                      CSNPR | PR - Dashboard
                  </a>
                </li>
              </ul>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- ATENÇÃO! Retirei a opção de registrar-se aqui por questões óbvias -->
                    @if (Auth::guest())
                      {{--
                        <li><a href="{{ url('/login') }}">Entrar</a></li>
                        <li><a href="{{ url('/register') }}">Registre-se</a></li>
                        --}}
                    @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{route('admin.password.reset')}}">Trocar Senha</a>
                              </li>
                              <li>
                                  <a href="{{ route('admin.logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Sair
                                  </a>
                                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
