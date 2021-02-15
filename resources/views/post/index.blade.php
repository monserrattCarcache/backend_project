
@extends('base')
@section('title') Post @endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="btn btn-sm btn-primary" href="{{ route('post.create') }}"> + Nuevo</a></li>
        </ul>
        <form action="{{ route('post.search') }}" method="POST" class="d-flex">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar">
                <span class="input-group-btn">
                    <button class="btn btn-outline-info" type="submit"><span class="fas fa-search" aria-hidden="true"></span>Buscar</button>
                </span>
            </div>
          </form>
      </div>
    </div>
  </nav>


    <table class="table">
        <thead>
            <tr>
                <th>{{"id"}}</th>
                <th>{{"CATEGORIA"}}</th>
                <th>{{"IMAGEN"}}></th>
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
                        <td scope="row"> {{$post->category->name}}</td>
                        <td scope="row"> <img src="{{ asset('storage').'/'.$post->image }}" alt="" width="100"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td>
                            <a href="{{ route("post.edit", $post->id) }}" class="btn btn-primary" >EDITAR</a>
                            <form action="{{ route("post.destroy", $post->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field("DELETE") }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this info?')">Eliminar</button>
                            </form>
                        </td>

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
