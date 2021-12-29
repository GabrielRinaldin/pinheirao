@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Adicionar Sugestão!</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Sugestão</a></li>
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
                        <a class="card-title btn btn-info" href="{{url('/suggestion')}}">Voltar</a>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{url('/suggestion/create')}}" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea style="height: 100px" type="text" class="form-control" id="suggestion" name="suggestion"
                                        placeholder="Sugestão"></textarea>
                                </div>
                            </div>

                            @csrf
                            <div class="form-group row">

                                <div id="cellphoneDiv" class="col-sm-12 row">
                                    <div id="cellphones" class="col-sm-6">
                                        <small>Caso seja uma melhoria e possuir algum contato insira-o aqui!</small>
                                        <input type="value" class="form-control" id="cellphone" name="cellphone[]"
                                            placeholder="Contato">
                                    </div>
                                </div>

                                {{-- <div class="col-sm-4">
                                    <a  id="add" class="btn btn-secondary">+</a>
                                </div> --}}

                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Salvar</button>
                    </div>
                    </form>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script>
    $(document).ready(function () {

        $("#add").click(function () {
            console.log('add')
            $("#cellphones").clone().appendTo("#cellphoneDiv");
        });

    });

</script>
@endsection