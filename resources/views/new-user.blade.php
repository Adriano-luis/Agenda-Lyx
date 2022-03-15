@extends('layouts.base-login')

@section('content')
<section class="profile">
    <div class="container">
        <div class="row title">
            <h2>Cadastrar Usuário</h2> <a href="{{route('login')}}"> - Fazer Login</a>
        </div>
        <form action="{{route('new-user')}}" method="POST" style="margin-top: -100px;">
            @csrf
            {{isset($cadastrado) && $cadastrado != '' ? $cadastrado : ''}}
            <div class="row info-total" style="justify-content: center;">
                <div class="col-sm-4 image-profile-group">
                    <div class="form-group">
                        <label for="imagem-perfil">Imagem de perfil</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="imagem-perfil">
                                <label name="upFotos" class="custom-file-label" for="imagem-perfil">
                                    Selecionar imagem
                                </label>
                            </div>
                        </div>
                        {{ $errors->first('image') ? $errors->first('image') : '' }}
                    </div>
                    <p><input type="text" name="name" placeholder="Nome"></p>
                    {{$errors->has('name') ? $errors->first('name') : ''}}
                </div>
                <div class="col-sm-4 info">
                    <p><input type="email" name="email" placeholder="E-mail"></p>
                    {{$errors->has('email') ? $errors->first('email') : ''}}
                    
                    <input type="password" name="password" placeholder="Senha">
                    {{$errors->has('password') ? $errors->first('password') : ''}}
                </div>
                <input type="submit" class="btn" value="Salvar"><br/>
            </div>
        </form>
    </div>
</section>
@endsection