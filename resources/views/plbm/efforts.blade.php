<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de campanhas de limpeza de mangues</div>
                <div class="card-body">
                  <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Presença</th>
                                <th>Relatório</th>
                                <th>Evidência</th>
                            </thead>
                            <tbody>
                                @foreach($efforts as $effort)
                                    <tr>
                                        <td>
                                            {{ $effort->place }} 
                                        </td>
                                        <td>
                                            {{ date( 'd/m/Y', strtotime($effort->date)) }} 
                                        </td>
                                        
                                        <td>
                                           {{ date( 'H:i', strtotime($effort->hour)) }}
                                        </td>
                                        <td>
                                            @if (!is_null($effort->attendance))
                                                <a href="{{ route('eff.attendance', $effort->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($effort->report))
                                                <a href="{{ route('eff.report', $effort->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($effort->evidence))
                                                <a href="{{ route('eff.evidence', $effort->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
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