@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Adicionar Movimentação!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Movimentações</a></li>
                    <li class="breadcrumb-item"><a href="#">Adicionar</a></li>
                    {{-- <li class="breadcrumb-item active"></li> --}}
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
                        <a class="card-title btn btn-info" href="{{url('/movement')}}">Voltar</a>
                    </div>
                    <div class="card-body">
                     
                        <div class="form-group row">
                            <div class="col-sm-4">
                              <input type="description" class="form-control" id="description" placeholder="Descrição">
                            </div>
                            <div class="col-sm-4">
                                <input type="value" class="form-control" id="value" placeholder="Valor">
                              </div>
                              <div class="col-sm-4">
                                <!-- select -->
                                <div class="form-group">
                                  <select class="form-control" name="type_of_movement">
                                    <option value="">Tipo de movimentação</option>
                                    <option value="credit">Crédito</option>
                                    <option value="debit">Débito</option>
                                  </select>
                                </div>
                              </div>
                          </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Salvar</button>
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