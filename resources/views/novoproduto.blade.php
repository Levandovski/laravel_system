@extends('layout.app', ["current" => 'produtos']);

@section('body')
 
 <div class="card border">
   <div class="card-body">
     <form action="/produtos" method="POST">
        @csrf
       <label for="nomeProduto">Nome Produto</label>
         <div class="form-group">
           <input type="text" class="form-control" name="nomeProduto" id="nomeProduto">
         </div>  
       
         <label for="estoqueProduto">Qtd estoque</label>
         <div class="form-group">
           <input type="text" class="form-control" name="estoqueProduto" id="estoqueProduto">
         </div>  
         <label for="precoProduto">Valor R$</label>
         <div class="form-group">
           <input type="text" class="form-control" name="precoProduto" id="precoProduto">
         </div>
         <div class="form-group">
           <label for="categoria">Example select</label>
             <select class="form-control" id="categoria" name="categoria_id">
                 @foreach($cats as $cat)
                 <option value="{{$cat->id}}">{{$cat->nome}}</option>
                 @endforeach
             </select>
         </div>
         <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
         <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
         
   </div>
 </div>
 
@endsection