@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Bem Vindo!</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Ínicio</a></li>
          {{-- <li class="breadcrumb-item"><a href="#"></a></li>
          <li class="breadcrumb-item active"></li> --}}
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Infos</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <p>Esse sistema foi desenvolvido para nós moradores do Conjunto Pinheirão podermos centralizar nossas
              dúvidas, críticas e sujestões em um só lugar!</p>
            <p>As áreas são reservadas e exclusivas aos moradores, contendo as seguintes telas:</p>
            <p> Arrecadação mensal e total das taxas;</p>
            <p> Sujestões de Melhorias e Críticas;</p>
            <p> Antes e Depois das Obras <small>(Caso exista).</small></p>
            <p> Todas as informações sobre sujestões e críticas serão anônimas então fique avontade para escrever o que
              quiser! </p>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Att Conjunto Pinheirão.
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
@endsection