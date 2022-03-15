@extends('layouts.base')
@section('content')
<section class="profile-page">
    <div class="container">
        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row profile-image">
                <div class="col">
                    <input type="file" name="image" id="image-profile" >
                    <label for="image-profile">
                        <img id="show-image" src="{{auth()->user()->image ? asset('storage/'.auth()->user()->image) : asset('assets/images/profile-user.png')}}" alt="Imagem de perfil" title="Imagem de perfil">
                    </label>
                    {{ $errors->first('image') ? $errors->first('image') : '' }}
                </div>
            </div>
            <div class="row inputs-profile">
                <div class="col profile-data">
                    <input type="text" name="name" value="{{auth()->user()->name ? auth()->user()->name : ''}}" placeholder="Nome">
                    {{ $errors->first('name') ? $errors->first('name') : '' }}
                    <input type="email" name="email" value="{{auth()->user()->email ? auth()->user()->email : ''}}" placeholder="Email">
                    {{ $errors->first('email') ? $errors->first('email') : '' }}
                    <input type="text" name="phone" id="telefone" value="{{auth()->user()->phone ? auth()->user()->phone : ''}}" placeholder="Telefone">
                    {{ $errors->first('phone') ? $errors->first('phone') : '' }}
                </div>
            </div>
            <input type="submit" class="btn" value="Salvar">
        </form>
    </div>
</section>
@endsection
<script>
    
</script>