@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(count($mais_vistos)>0)
         <p>Mais Vistos</p>
        @endif
                    <div class="row">
                        @foreach($mais_vistos as $mais_visto)

                            <div class="col-lg-4">
                                <div class="thumbnail">
                                    <img src="{{asset('img/'.$mais_visto->imagem)}}" alt=""/>
                                    <div class="caption">
                                        <h3>{{$mais_visto->titulo}}</h3>
                                        <span class="pull-right">{{$mais_visto->created_at->diffForHumans()}}</span>
                                        <p>
                                            <a href="{{route('post.show',['id'=>$mais_visto->id])}}" class="btn btn-success" role="button">Visualizar</a>
                                            <span>Visualizacao({{$mais_visto->total_visualizacao}})</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach

        </div>
    </div>
    <div class="row">
        @if(count($ultimos)>0)
        <p>Publicados Recentemente</p>
        @endif
        <div class="row">
            @foreach($ultimos as $ultimo)

                <div class="col-lg-4">
                    <div class="thumbnail">
                        <img src="{{asset('img/'.$ultimo->imagem)}}" alt=""/>
                        <div class="caption">
                            <h3>{{$ultimo->titulo}}</h3>
                            <span class="pull-right">{{$ultimo->created_at->diffForHumans()}}</span>
                            <p>
                                <a href="{{route('post.show',['id'=>$ultimo->id])}}" class="btn btn-success" role="button">Visualizar</a>
                               <span>Visualizacao({{$mais_visto->total_visualizacao}})</span>                            </p>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
</div>
    <div class="row">
        <center>
            {{$ultimos->render()}}
        </center>

    </div>
@endsection
