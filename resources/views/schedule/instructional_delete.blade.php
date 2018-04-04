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
                                <th>Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($instructionals as $inst)
                                    <tr>  
                                         <td>{{ $inst->name }}</td>
                                        <td>{{ $inst->place }}</td>
                                        <td>{{ date( 'd/m/Y', strtotime($inst->date))}}</td>
                                        <td>{{ date( 'H:i', strtotime($inst->hour))}}</td> 
                                        <td>
                                            <a href="{{route('sch.delete', $inst->schedule_id)}}" class="btn btn-danger "><i class="fa fa-calendar-minus-o"></i>
                                                Excluir
                                            </a>
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