<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Campanhas de limpeza de mangues</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Local</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Excluir</th>
                            </thead>
                            <tbody>
                                @foreach($efforts as $eff)
                                    <tr>  
                                        <td>{{ $eff->place }}</td>
                                        <td>{{ date( 'd/m/Y', strtotime($eff->date)) }}</td>
                                        <td>{{ date( 'H:i', strtotime($eff->hour)) }}</td> 
                                        <td>
                                            <a href="{{route('sch.delete', $eff->schedule_id)}}" class="btn btn-danger"><i class="fa fa-calendar-minus-o"></i>
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