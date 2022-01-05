@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Acompanhamento</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active"></li> --}}
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gráfico</h3>
                        <div style="text-align: right">
                            <small id="totalValue"></small>
                        </div>
                    </div>
                    <div class="card-body" id="chart_div">

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sugestões</h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 245px">
                        @if ($suggestions->count() > 0)
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                                @foreach ($suggestions as $suggestion)
                                <tr>
                                    <td>{{$suggestion->suggestion}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Você não adicionou nenhuma sugestão!</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Críticas</h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 245px">
                        @if ($critics->count() > 0)
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                                @foreach ($critics as $critic)
                                <tr>
                                    <td>{{$critic->critic}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table class="table table-head-fixed text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Você não adicionou nenhuma crítica!</td>
                                </tr>
                            </tbody>
                        </table>
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
      data.addColumn('number', 'Valor');

     let dataArray = [];
     let year = '';
     let month = '';
     let totalValue = 0;
      @foreach($movements as $movement)
      totalValue += {{$movement->value}};
      year = '{{Carbon\Carbon::parse($movement->date)->format('Y')}}';
      month = '{{Carbon\Carbon::parse($movement->date)->format('m')}}';
        dataArray.push([new Date(year, month ), {{$movement->value}}]);
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

      document.getElementById('totalValue').innerHTML = 'Total: R$ ' + totalValue;
    }
</script>

@endsection