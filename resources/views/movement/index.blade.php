@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Movimentações</a></li>
                    <li class="breadcrumb-item"><a href="#">Index</a></li>
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
                        <a class="card-title btn btn-info" href="{{url('/movement/create')}}">Adicionar
                            Movimentação.</a>
                        <div style="text-align: right">
                            <small id="totalValue"></small>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div id="chart_div"></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Créditos</h3>
                        <div style="text-align: right">
                            <small id="totalCredit"></small>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($credits->count() == 0)
                        <p>Que pena, não foi feita nenhuma movimentação.</p>
                        @else
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Valor</th>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($credits as $credit)
                                    <tr>
                                        <td>{{$credit->id}}</td>
                                        <td>R${{$credit->value}}</td>
                                        <td>{{$credit->description}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Débitos</h3>
                        <div style="text-align: right">
                            <small id="totalDebit"></small>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($debits->count() == 0)
                        <p>Que pena, não foi feita nenhuma movimentação.</p>
                        @else
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Valor</th>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($debits as $debit)
                                    <tr>
                                        <td>{{$debit->id}}</td>
                                        <td>R${{$debit->value}}</td>
                                        <td>{{$debit->description}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    google.charts.load('current', {packages: ['corechart', 'line'], 'language': 'pt-Br'});
    google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', 'Crédito');
      data.addColumn('number', 'Débito');

     let dataArray = [];
     let year = '';
     let month = '';
     let totalValue = 0;
     let totalCredit = 0;
     let totalDebit = 0;
     let credit = 0;
     let debit = 0;
      @foreach($movements as $movement)
      year = '{{explode('-',$movement->date)[0]}}';
      month = '{{explode('-',$movement->date)[1]}}';

      if('{{$movement->type_of_movement}}' == 'credit'){
        totalValue += {{$movement->value}};
        totalCredit += {{$movement->value}};
        credit = {{$movement->value}};
      }
      if('{{$movement->type_of_movement}}' == 'debit'){
        totalValue -= {{$movement->value}};
        totalDebit += {{$movement->value}};
        debit = {{$movement->value}};
      }
        dataArray.push([new Date(year, month - 1 ), credit, debit]);

        debit = 0;
      @endforeach
    
      data.addRows(dataArray);

      var options = {
        hAxis: {
          title: 'Meses'
        },
        vAxis: {
          title: 'Valor'
        },
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);

      document.getElementById('totalValue').innerHTML = 'Total em Caixa: R$ ' + totalValue;
      document.getElementById('totalCredit').innerHTML = 'Total: R$ ' + totalCredit;
      document.getElementById('totalDebit').innerHTML = 'Total: R$ ' + totalDebit;
    }
</script>
@endsection