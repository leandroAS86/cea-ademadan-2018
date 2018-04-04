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
                                <th>Relatório</th>
                                <th>Enviar</th>
                            </thead>
                            @foreach($meetings as $meeting)
                            <form action="{{ route('meet.upload', $meeting->schedule_id) }}" method="post" enctype="multipart/form-data"> 
                            {{ csrf_field() }}
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $meeting->place }} 
                                    </td>
                                    <td>
                                        {{ date( 'd/m/Y', strtotime($meeting->date)) }} 
                                    </td>
                                    <td>
                                        {{ date( 'H:i', strtotime($meeting->hour)) }}
                                    </td>
                                    <td>
                                        <div class="form-control">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        
                                        <label class="custom-file-upload btn btn-primary" style="margin-top: 5px" ><i class="fa fa-file-pdf-o"></i>
                                            <input type="file" name="ata" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                        </label>

                                    </td>
                                    <td>
                                        <div class="form-control">
                                               <i class="fa fa-file"></i>
                                        </div>
                                        <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-pdf-o"></i>
                                            <input type="file" name="report" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                        </label>       
                                    </td>
                                    <td>
                                        <button type="submit" class="custom-file-upload btn btn-xs btn-primary"> <i class="fa fa-upload"></i> Enviar </button>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                        @endforeach    
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>