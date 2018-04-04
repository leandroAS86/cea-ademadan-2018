<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de Reuniões Públicas nas Comunidades</div>

                <div class="card-body">
                   <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Comunidade</th>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Presença</th>
                                <th>Diário de Campo</th>
                                <th>Evidência</th>
                                <th>Justificativa</th> 
                            </thead>
                            <tbody>
                                @foreach($audiences as $audience)
                                    <tr>
                                       <form action="{{route('aud.upload')}}" method="post" enctype="multipart/form-data">
                                       {{csrf_field()}} 
                                            <td>
                                                {{ $audience->name }} 
                                            </td>
                                            <td>
                                                {{$audience->place}}
                                            </td>
                                            <td>
                                                {{date( 'd/m/Y', strtotime($audience->date))}}
                                            </td>
                                            <td>
                                                {{date('H:i', strtotime($audience->hour))}}
                                            </td>
                                            <td>
                                                @if (!is_null($audience->attendance))
                                                    <a href="{{ route('aud.attendance', $audience->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($audience->evidence))
                                                    <a href="{{ route('aud.evidence', $audience->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($audience->video))
                                                    <a href="{{ route('aud.foto', $audience->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="justification">
                                                        {{$audience->justification}}
                                                    </label>
                                                </div>
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