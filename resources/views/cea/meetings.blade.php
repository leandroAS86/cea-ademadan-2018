<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de Reuniões de Avaliação</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Local</th>
                                <th>Data </th>
                                <th>Hora</th>
                                <th>Ata</th>
                                <th>Evidência</th>
                            </thead>
                            <tbody>
                                @foreach($meetings as $meeting)
                                    <tr>

                                            <td>{{ $meeting->place }} </td>
                                            <td>
                                                {{date( 'd/m/Y', strtotime($meeting->date))}}
                                            </td>
                                            <td>
                                                {{date( 'H:i', strtotime($meeting->hour))}}
                                            </td>
                                            <td>
                                                @if (!is_null($meeting->ata))
                                                    <a href="{{ route('meet.ata', $meeting->schedule_id) }}" class=" btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($meeting->report))
                                                    <a href="{{ route('meet.report', $meeting->schedule_id) }}" class=" btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
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
</div>