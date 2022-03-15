@extends('layouts.base-login')
@section('content')
    <section>
        <div class="container-fluid login">
            <div class="row">
                <div class="col">
                    <div class="form-area">
                        <div class="form">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <label><h5>Seja bem vindo(a)!</h5> <a href="{{route('new-user')}}">Cadastre-se</a></label>
                                <label><p>Informe seus dados de login para continuar</p></label><br>
                                {{isset($erro) && $erro != '' ? $erro : ''}}
                                <input type="email" name="email" id="email-login" autocomplete="off" placeholder="Seu E-mail"/>
                                <input type="password" name="password" id="password-login" autocomplete="off" placeholder="Sua Senha"/><br/>
                                <input type="checkbox" name="remember" value=1> Lembrar-me <br>
                                <input type="submit"  value="Entrar"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection