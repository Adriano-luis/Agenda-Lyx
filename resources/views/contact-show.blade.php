@extends('layouts.base')
@section('content')
    <section class="mostrar">
        <div class="edition">
            <form action="{{route('contacts.destroy',$contact->id)}}" method="POST" style="float: right; margin-left:10px"> 
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Tem certeza que gostaria de deletar este contato?')">Excluir</button>
            </form>
            <a href="{{route('contacts.edit',$contact->id)}}"><button style="margin-bottom:10px"  class="btn save">Editar</button></a>
        </div>
        <div style="margin: auto; margin-left:28px">
            <div class=" col shadow">
                <div class="col texts">
                    <div class="title">
                        <h1>{{$contact->name}}</h1>
                    </div>
                    <div class="text">
                        E-mail: <span>{{$contact->email}}</span><br>
                        Telefone: <span>{{$contact->phone}}</span><br>
                        Endereço: <span>{{$contact->address}}</span><br>
                        Complemento: <span>{{$contact->complement}}</span><br>
                        Cidade: <span>{{$contact->city}}</span><br>
                        Estado: <span>{{$contact->state}}</span>
                    </div><br>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/template.css')}}"/>
@endsection