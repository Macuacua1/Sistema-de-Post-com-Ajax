@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        @foreach($posts as $post)

            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{asset('img/'.$post->imagem)}}" alt=""/>
                    <div class="caption">
                        <h3>{{$post->titulo}}</h3>
                        <span class="pull-right">{{$post->created_at->diffForHumans()}}</span>
                        <p>
                            <a href="{{route('post.show',['id'=>$post->id])}}" class="btn btn-success" role="button">Visualizar</a>

                        </p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    </div>
@endsection