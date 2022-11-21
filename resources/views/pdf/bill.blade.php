<!DOCTYPE html>
<html>

<head>
    <title>Fatura</title>
</head>

<body>
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card-body">
            <div class="invoice p-3 mb-3">
    
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> Pinheirão, Inc.
                            <small class="float-right">Data limite de Pagamento: {{Carbon\Carbon::parse($bill->due_at)->format('d/m/Y')}}</small>
                        </h4>
                    </div>
    
                </div>
    
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                            <strong>Conjunto Pinheirão, Inc.</strong><br>
                            São José, José Bonifácio 1962<br>
                            Telefone: (41) 99123-5432<br>
                            Email: pinheirao@outlook.com
                        </address>
                    </div>
    
                    <div class="col-sm-4 invoice-col">
                        Para
                        <address>
                            <strong>{{$bill->user->name}}</strong><br>
                            São José, José Bonifácio {{$bill->user->house_number}}<br>
                            Telefone: (41) 94323-5432<br>
                            {{-- Email: {{$bill->user->email}} --}}
                        </address>
                    </div>
    
                    <div class="col-sm-4 invoice-col">
                        <b>#{{$bill->id}}</b><br>
                        <b>Pagável até:</b> {{Carbon\Carbon::parse($bill->due_at)->format('d/m/Y')}}<br>
                    </div>
    
                </div>
    
    
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Descrição</th>
                                    <th>Status #</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#{{$bill->id}}</td>
                                    <td>{{$bill->description}}</td>
                                    <td>
                                        @switch($bill->status)
                                        @case("paid")
                                        Pago
                                        @break
                                        @case("pending")
                                        Pendente
                                        @break
                                        @default
                                        Pago
                                        @endswitch</td>
                                    <td>R$ {{$bill->amount}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                </div>
    
                <div class="row">
    
                    <div class="col-6">
                        <p class="lead">Dúvida frequente:</p>
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px; font-weight: bold">
                            Muito obrigado, caso já tenha realizado o pagamento, não se preocupe, o seu status
                            será alterado em breve. Em caso dúvidas, entre em contato com o
                            <a href="#">pinheirao@outlook.com</a>
                        </p>
                    </div>
    
                    <div class="col-6">
                        <p class="lead">Pagável até: {{Carbon\Carbon::parse($bill->due_at)->format('d/m/Y')}}</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Total:</th>
                                        <td>{{$bill->amount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>

</body>

</html>