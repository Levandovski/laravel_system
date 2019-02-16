@extends('layout.app', ["current" => 'produtos']);

@section('body')
 
 <div class="card border">
   <div class="card-body">
     <form action="/produtos/{{$produtos['id']}}" method="POST">
        @csrf
       <label for="nomeProduto">Nome Produto</label>
         <div class="form-group">
           <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" value="{{$produtos['nome']}}">

         </div>  
       
         <label for="estoqueProduto">Qtd estoque</label>
         <div class="form-group">
           <input type="text" class="form-control" name="estoqueProduto" id="estoqueProduto" value="{{$produtos['estoque']}}">
         </div>  
         <label for="precoProduto">Valor R$</label>
         <div class="form-group">
           <input type="text" class="form-control" name="precoProduto" id="precoProduto" value="{{$produtos['preco']}}">
         </div>
         <div class="form-group">
           <label for="categoria">Example select</label>
             <select class="form-control" id="categoria" name="categoria_id">
                 
                 <option value="{{$produtos['categoria_id']}}">{{$produtos['categoria']}}</option>
                 @foreach($cats as $cat)
                   @if($cat->nome!=$produtos['categoria'])
                     <option value="{{$cat->id}}">{{$cat->nome}}</option>
                   @endif
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-primary btn-sm">Editar</button>
         <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
         
   </div>
 </div>
 
@endsection