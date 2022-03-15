@extends('layouts.base')

<?php $titulo = 'conteudo'?>
@section('titulo')
    Conteúdo
@endsection

@section('content')
<section class="impresna">
    <div style="margin: auto; margin-left:28px" class="conteudo-page">
        <div class="div-links">{{$contacts->links()}}</div>
        <div class=" col financial-sombra">
            <div class="row artigos-impresna">
                <table border="1" class="table table-striped tabela">
                    <thead>
                        <tr>
                            <th>Todos os Contatos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($contacts)
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>
                                        <a href="{{route('contacts.show',['contact'=>$contact->id])}}">Ver</a> - <a href="{{route('contacts.edit', ['contact'=>$contact->id])}}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Nenhum registro encontrado!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection