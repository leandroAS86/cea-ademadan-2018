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
                                <th>Enviar</th> 
                            </thead>
                            @foreach($audiences as $audience)
                            <form action="{{route('aud.upload', $audience->schedule_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}  
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $audience->name }} 
                                    </td>
                                    <td>
                                        {{ $audience->place }} 
                                    </td>
                                    <td>
                                       {{date( 'd/m/Y', strtotime($audience->date))}}
                                    </td>
                                    <td>
                                        {{date( 'H:i', strtotime($audience->hour))}}
                                    </td>
                                    <td> 
                                        <div class="form-control">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        
                                        <label class="custom-file-upload btn btn-primary " style="margin-top: 5px"><i class="fa fa-file-pdf-o"></i> 
                                            <input type="file" name="attendance" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                        </label>    
                                    </td>
                                    <td> 
                                        <div class="form-control">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-pdf-o"></i> 
                                            <input type="file" name="evidence" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                        </label>   
                                    </td>
                                    <td >
                                        <div class="form-control">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-pdf-o"></i> 
                                            <input type="file" name="video" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                        </label>
                                        
                                    </td>
                                    <td >
                                        <div class="form-group">
                                            <label for="justification">
                                                <input type="textarea" class="form-control" name="justification" id="justification" >
                                            </label>
                                        </div>
                                    </td>
                                    <td> 
                                        <button type="submit" class="custom-file-upload btn btn-xs btn-primary"><i class="fa fa-upload"></i>  Enviar</button>
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