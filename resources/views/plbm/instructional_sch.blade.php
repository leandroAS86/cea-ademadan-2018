<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Entrega de material instrucional</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Comunidade</th>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </thead>
                            <tbody>
                                @foreach($instructionals as $pre)
                                    <tr>  
                                        <td>{{ $pre->name }}</td>
                                        <td>{{ $pre->place }}</td>
                                        <td>{{ date( 'd/m/Y', strtotime($pre->date)) }}</td>
                                        <td>{{ date( 'H:i', strtotime($pre->hour)) }}</td>      
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>