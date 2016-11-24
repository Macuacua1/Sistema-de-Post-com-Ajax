@extends('layouts.app')
@section('content')
    <div class="container">
    <form class="form-horizontal" action="{{route('post.update',['id'=>$posts->id])}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo" value="{{$posts->titulo}}">
            </div>
        </div>
        <div class="form-group">
            <label for="conteudo" class="col-sm-2 control-label">Conteudo</label>
            <div class="col-sm-10">
                <textarea name="conteudo" class="form-control" id="conteudo" rows="8" cols="40">{{$posts->conteudo}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="imagem" class="col-sm-2 control-label">Imagem</label>
            <div class="col-sm-10">
                <input type="file" id="imagem" class="form-control" name="imagem">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Actualizar</button>
            </div>
        </div>

    </form>
    </div>
@endsection