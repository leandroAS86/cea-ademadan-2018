<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de entrega de material instrucional</div>
                <div class="card-body">
                  <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Comunidade</th>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Evidência</th>
                                <th>Liderança Responsável</th>
                            </thead>
                            <tbody>
                                @foreach($instructionals as $inst)
                                    <tr>
                                        <td>
                                            {{ $inst->name }} 
                                        </td>
                                        <td>
                                            {{ $inst->place }} 
                                        </td>
                                        <td>
                                            {{ date( 'd/m/Y', strtotime($inst->date)) }} 
                                        </td>
                                        
                                        <td>
                                           {{ date( 'H:i', strtotime($inst->hour)) }}
                                        </td>
                                        <td>
                                            @if (!is_null($inst->evidence))
                                                <a href="{{ route('inst.evidence', $inst->schedule_id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="leadership">
                                                    {{$inst->leadership}}
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