<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Apresentação do jogo desenvolvido</div>
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
                                @foreach($presentationgames as $pres)
                                    <tr>  
                                         <td>{{ $pres->name }}</td>
                                        <td>{{ $pres->place }}</td>
                                        <td>{{ date( 'd/m/Y', strtotime($pres->date)) }}</td>
                                        <td>{{ date( 'H:i', strtotime($pres->hour)) }}</td> 
                                        <td>
                                            <a href="{{route('sch.delete', $pres->schedule_id)}}" class="btn btn-xs btn-danger"> <i class="fa fa-calendar-minus-o"></i>
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