<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Reuniões de Avaliação</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                            </thead>
                            <tbody>
                                @foreach($meetings as $meet)
                                    <tr>  
                                        <td>{{ $meet->place }}</td>
                                        <td>{{date( 'd/m/Y', strtotime($meet->date))}}</td>
                                        <td>{{date( 'H:i', strtotime($meet->hour))}}</td>      
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