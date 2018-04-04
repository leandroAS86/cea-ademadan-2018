<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Reuniões Públicas nas Comunidades</div>
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
                                @foreach($audiences as $aud)
                                    <tr>  
                                        <td>{{ $aud->name }}</td>
                                        <td>{{ $aud->place }}</td>
                                        <td>{{date( 'd/m/Y', strtotime($aud->date))}}</td>
                                        <td>{{ date( 'H:i', strtotime($aud->hour)) }}</td>      
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