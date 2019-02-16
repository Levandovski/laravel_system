@extends('layout.app', ["current" => "categorias"]);

@section('body')

<div class="card border">
  <div class="card-body">
     <form action="/categorias/{{$cat->id}}" method="POST">
        @csrf
       <div class="form-group">
           <label for="nomeCategoria">Nome da Categoria</label>
           <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" placeholder="Categoria" value="{{$cat->nome}}">
           
         </div> 
         <button type="submit" class="btn btn-primary btn-sm">Editar</button>
         <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
     </form>
     </div>
</div>


@endsection