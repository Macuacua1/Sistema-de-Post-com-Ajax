@extends('layouts.app')
@section('content')
    <div class="container">
 <div class="row">
     <div  class="col-md-12">
         @if ($message = Session::get('status'))
             <div class="alert alert-success alert-block">
                 {{--<button type="button" class="close" data-dismiss="alert">�</button>--}}
                 <strong>{{ $message }}</strong>
             </div>

         @endif
                 <div class="row">
                    <center>
                    <img src="{{asset('img/'.$posts->imagem)}}" alt="IMAGE"/>
                    </center>
                 </div>
                <div class="row">
                    <span>Total Visualizacao({{$posts->total_visualizacao}})</span>
                    <h3>{{$posts->titulo}}</h3>
                    <br>
                    {{$posts->conteudo}}

                </div>
         <div class="row">
             <center>
                 <a class="btn btn-success _btnGostei" role="button">Gostei({{$posts->total_gostei}})</a>
                 <a  class="btn btn-danger _btnNaoGostei" role="button">Nao Gostei({{$posts->total_naogostei}})</a>
             </center>
         </div>
             <div class="row _comentarios">
             @foreach($comentarios as $comentario)

             <div class="row well">
               <div class="col-md-12">
                {{$comentario->nome}}
                 </div>
                 <div class="col-md-12">
                     {{$comentario->conteudo}}
                 </div>

             </div>
             @endforeach
             </div>
             <div class="row">
                 <h5>Adicionar Comentarios</h5>
                 <div class="form-group">
                     <label for="nome" class="col-sm-2 control-label">Nome:</label>

                         <input type="text"  class="form-control _nome"  placeholder="Nome">

                 </div>
                 <div class="form-group">
                     <label for="texto" class="col-sm-2 control-label">Texto:</label>

                         <textarea  class="form-control _texto"  rows="8" cols="40"></textarea>

                 </div>
                 <div class="form-group">
                      <button type="button" class="btn btn-success _btnComentar">Comentar</button>

                 </div>
           </div>
     {{csrf_field()}}
         <input type="hidden" name="post_id" value="{{$posts->id}}">
         <script type="text/javascript">
           $('._btnGostei').click(function () {
              $.post("/gostei",{post_id:$('input[name="post_id"]').attr("value"),_token:$('input[name="_token"]').attr("value")},function (response) {
          if (response.status=="sim"){
       $("._btnGostei").html("Gostei("+response.qtd+")");
          }
              });
           });
           $('._btnNaoGostei').click(function () {
               $.post("/naogostei",{post_id:$('input[name="post_id"]').attr("value"),_token:$('input[name="_token"]').attr("value")},function (response) {
                   if (response.status=="sim"){
                       $("._btnNaoGostei").html("Nao Gostei("+response.qtd+")");
                   }
               });
           });
           $('._btnComentar').click(function () {
               $.post("/comentar",{
                   post_id:$('input[name="post_id"]').attr("value"),
                   nome:$('._nome').val(),
                   conteudo:$('._texto').val(),
                   _token:$('input[name="_token"]').attr("value")},
                       function (response) {
                           if(response.status=='sim'){
                               var _temp='<div class="row well">';
                               _temp+='<div class="col-sm-12">';
                               _temp+='Nome:'+$('._nome').val();
                               _temp+='</div><div class="col-sm-12">';
                               _temp+=$('._texto').val();
                               _temp+='</div></div>';
                               $('._comentarios').append(_temp);


                           }

               });
           });
         </script>
    </div>
 </div>
    </div>
@endsection