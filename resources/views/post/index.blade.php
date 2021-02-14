
@extends('base')
@section('title') Inicio @endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{"id"}}</th>
                <th>{{"title"}}</th>
                <th>{{"Author"}}</th>
                <th>{{"Acciones"}}</th>
            </tr>
        </thead>
        <tbody>
            @if (count($posts) >= 1)
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row"> {{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->Author}}</td>
                        <td> editar | borrar </td>
                    </tr>
                @endforeach

            @else
            <tr>
                <td scope="row"> {{"No se encontraron resultados"}}</td>
            </tr>
            @endif

        </tbody>
    </table>
@endsection
