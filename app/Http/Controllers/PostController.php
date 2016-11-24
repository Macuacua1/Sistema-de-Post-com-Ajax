<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Comentario;
use Cache;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\File;
use Redirect;

class PostController extends Controller
{
    public function index()
    {
       $posts=Post::all();
       return View('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo' => 'required|max:255|min:3',
            'conteudo' => 'required|min:5|max:255',

        ]);
        $posts= new Post(array (
            "titulo" => $request->get("titulo"),
            "conteudo"=> $request->get("conteudo"),
          "imagem"=>$request->file("imagem")->getClientOriginalName()
        ));

        $request->file("imagem")->move( base_path() . '/public/img' , $request->file("imagem")->getClientOriginalName());

        $posts->save();
        return redirect('/')
            ->with('success','Publicado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $posts=Post::find($id);
        $comentarios=Comentario::where('post_id','=', $posts->id)->orderBy('created_at')->get();
        if(Cache::has($id)==false){
        Cache::add($id,'contador',0.30);
            $posts->total_visualizacao+=1;
            $posts->save();
        }
      return View('post.show',compact('posts'),compact('comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::find($id);
        return View('post.editar',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts=Post::find($id);
        $this->validate($request, [
//            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo' => 'required|max:255|min:3',
            'conteudo' => 'required|min:5|max:255',

        ]);
        $posts= new Post(array (
            "titulo" => $request->get("titulo"),
            "conteudo"=> $request->get("conteudo"),
            "imagem"=>$request->file("imagem")->getClientOriginalName()
        ));

        $request->file("imagem")->move( base_path() . '/public/img' , $request->file("imagem")->getClientOriginalName());

        $posts->save($posts);
        return redirect('/')
            ->with('success','Actualizado com Sucesso!');
    }
//if($posts->titulo!=Input::get('titulo')){
//$posts->titulo=Input::get('titulo');
//}
//if($posts->conteudo!=Input::get('conteudo')){
//    $posts->conteudo=Input::get('conteudo');
//}
//if(Input::file('imagem')){
//    File::delete( base_path() .$posts->imagem);
//    $request->file("imagem")->move( base_path() . '/public/img' , $request->file("imagem")->getClientOriginalName());
//}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);//->delete();
        File::delete(public_path().$post->imagem);
      $post->delete();
        return redirect('/');
    }
    public function AdicionarGostei()
    {
        $id=Input::get('post_id');
        $posts=Post::find($id);
        if(Cache::has('Voto'.$id)==false){
            Cache::add('Voto'.$id,'contador',0.30);
            $posts->total_gostei+=1;
            $posts->save();
            return \Response::json(array('status'=>'sim','qtd'=>$posts->total_gostei));
        }
        else{
            return \Response::json(array('status'=>'nao'));
        }

    }
    public function AdicionarNaoGostei()
    {
        $id=Input::get('post_id');
        $posts=Post::find($id);
        if(Cache::has('Voto'.$id)==false){
            Cache::add('Voto'.$id,'contador',0.30);
            $posts->total_naogostei+=1;
            $posts->save();
            return \Response::json(array('status'=>'sim','qtd'=>$posts->total_naogostei));
        }
        else{
            return \Response::json(array('status'=>'nao'));
        }

    }
    public function Pesquisar()
    {

        if(Input::has('texto')==false){
  return redirect('/');
        }
        $posts=Post::where('titulo','like','%'.Input::get('texto').'%')
            ->orWhere('conteudo','like','%'.Input::get('texto').'%')->get();
        return view('pesquisa')->with('posts',$posts);
    }

    public function AdicionarComentario()
    {
$comentario=new Comentario();
        $comentario->post_id=Input::get('post_id');
        $comentario->nome=Input::get('nome');
        $comentario->conteudo=Input::get('conteudo');
        $comentario->save();
        return \Response::json(array('status'=>'sim'));
    }
}
