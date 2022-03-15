<header>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <a href="{{route('contacts.index')}}"><img src="{{asset('assets/images/logo.png')}}" class="custom-logo" alt="Agenda com um lápis em cima" title="Agenda com lápis">Agenda</a>
                </div>
                <div class="col-sm-7">
                    <div class="menuarea">
                        <nav>
                            <ul>
                                <li><a href="{{route('contacts.index')}}">Todos os contatos</a></li>
                                <li><a href="{{route('contacts.create')}}">Adicionar novo contato</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="usuario">
                        <img src="{{auth()->user()->image ?  asset('storage/'.auth()->user()->image) : asset('assets/images/profile-user.png') }}" class="avatar">
                        <div class="info">
                            <span>Seja bem-vindo</span><br/>
                            <p>{{auth()->user()->name}}</p>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="dado" src="{{asset('assets/images/arrow-down.png')}}" /></a>
                            <div class="dropdown-menu sub-menu">
                                <a href="{{ route('user.edit') }}"><li class="primeiro"><img src="{{asset('assets/images/profile-user.png')}}" />Perfil</li></a>
                                <a href="{{ route('logout')}}"><li><img src="{{asset('assets/images/logout.png')}}" />Sair</li></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>