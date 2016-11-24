@extends('layouts.app')
@section('content')
    <div class="container">
    <p>Lista de Posts</p>
    <div class="row">
 @foreach($posts as $post)

       <div class="col-lg-4">
           <div class="thumbnail">
               <img src="{{asset('img/'.$post->imagem)}}" alt=""/>
               <div class="caption">
                   <h3>{{$post->titulo}}</h3>
                   <span class="pull-right">{{$post->created_at->diffForHumans()}}</span>
                   <p>
                       <a href="{{route('post.show',['id'=>$post->id])}}" class="btn btn-success" role="button">Visualizar</a>
                       <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary" role="button">Editar</a>
                       <a href="{{route('post.destroy',['id'=>$post->id])}}" class="btn btn-danger" role="button">Apagar</a>
                   </p>
               </div>
           </div>
       </div>

    @endforeach
    </div>
    </div>
    @endsection