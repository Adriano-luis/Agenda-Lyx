@extends('layouts.base')
@section('content')
  <div class="edit-update">
    @if ($edit)
      <form action="{{route('contacts.update',$contact->id)}}" method="POST">
      @method('PUT')
    @else
        <form action="{{route('contacts.store')}}" method="POST">
    @endif
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" aria-describedby="titulo" id="name" placeholder="Digite o nome" name="name" value="{{isset($contact->name) ? $contact->name: '' }}">
            {{ $errors->first('name') ? $errors->first('name') : '' }}
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" aria-describedby="email" id="email" placeholder="Digite o email" name="email" value="{{isset($contact->email) ? $contact->email: '' }}">
            {{ $errors->first('email') ? $errors->first('email') : '' }}
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" aria-describedby="telefone" id="telefone" placeholder="Digite o telefone" name="phone" value="{{isset($contact->phone) ? $contact->phone: '' }}">
            {{ $errors->first('phone') ? $errors->first('phone') : '' }}
          </div>
          <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control" aria-describedby="address" id="address" placeholder="Digite seu endereço" name="address" value="{{isset($contact->address) ? $contact->address: '' }}">
            {{ $errors->first('address') ? $errors->first('address') : '' }}
          </div>
          <div class="form-group">
            <label for="complement">Complemento</label>
            <input type="text" class="form-control" aria-describedby="complement" id="complement" placeholder="Digite o seu complemento" name="complement" value="{{isset($contact->complement) ? $contact->complement: '' }}">
            {{ $errors->first('complement') ? $errors->first('complement') : '' }}
          </div>
          <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" aria-describedby="city" id="city" placeholder="Digite sua cidade" name="city" value="{{isset($contact->city) ? $contact->city: '' }}">
            {{ $errors->first('city') ? $errors->first('city') : '' }}
          </div>
          <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" class="form-control" aria-describedby="state" id="state" placeholder="Digite seu Estado" name="state" value="{{isset($contact->state) ? $contact->state: '' }}">
            {{ $errors->first('state') ? $errors->first('state') : '' }}
          </div>
          
          <button type="submit" class="btn">Salvar</button>
    </form>
  </div>
@endsection