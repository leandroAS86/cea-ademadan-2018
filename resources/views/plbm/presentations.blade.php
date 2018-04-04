<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de apresentações de conteúdos específicos sobre mangues</div>
                <div class="card-body">
                  <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Comunidade</th>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Presença</th>
                                <th>Relatório</th>
                                <th>Evidência</th>
                            </thead>
                            <tbody>
                                @foreach($presentations as $presentation)
                                    <tr>
                                        <td>
                                            {{ $presentation->name }} 
                                        </td>
                                        <td>
                                            {{ $presentation->place }} 
                                        </td>
                                        <td>
                                            {{ date( 'd/m/Y', strtotime($presentation->date)) }} 
                                        </td>
                                        
                                        <td>
                                           {{ date( 'H:i', strtotime($presentation->hour)) }}
                                        </td>
                                        <td>
                                            @if (!is_null($presentation->attendance))
                                                <a href="{{ route('pres.attendance', $presentation->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($presentation->report))
                                                <a href="{{ route('pres.report', $presentation->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($presentation->evidence))
                                                <a href="{{ route('pres.evidence', $presentation->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
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