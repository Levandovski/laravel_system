@extends('layout.app', ["current" => "produtos"])

@section('body')
  <div class="card border">
    <div class="card-body">
      <h5 class="card-title">Cadastro de Categorias</h5>
        
        @if(isset($produtos))
        <table class="table table-ordered table-hover">
          <thead>
              <tr>
                  <td>Código</td>
                  <td>Produto</td>
                  <td>Estoque</td>
                  <td>Preco</td>
                  <td>Categoria</td>
                  <td>Ações</td>
              </tr>
          </thead>
            <tbody>
                @foreach($produtos as $prod)
                
                <tr>
                    <td>{{$prod['id']}}</td>
                    <td>{{$prod['nome']}}</td>
                    <td>{{$prod['estoque']}}</td>
                    <td>{{$prod['preco']}}</td>
                    <td>{{$prod['categoria']}}</td>

                    <td>
                      <a href="/produtos/editar/{{$prod['id']}}" class="btn btn-sm btn-primary">Editar</a>
                      <a href="/produtos/apagar/{{$prod['id']}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
      <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button">Novo produto</a>
      </div>
  </div>
@endsection