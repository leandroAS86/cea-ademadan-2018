<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatórios de apresentações de conteúdos específicos sobre mangues</div>
                <div class="card-body">
                    <div class="table-hover table-sm table-responsive">    
                        <table class="table ">
                            <thead >
                                <tr>
                                    <th>Comunidade</th>
                                    <th>Local </th>
                                    <th>Data </th>
                                    <th>Hora</th>
                                    <th>Presença</th>
                                    <th>Relatório</th>
                                    <th>Evidência</th>
                                    <th>Enviar</th>
                                </tr>
                            </thead>
                            @foreach($presentations as $presentation)
                            <form action="{{ route('pres.upload', $presentation->schedule_id) }}" method="post" enctype="multipart/form-data"> 
                            {{csrf_field()}}
                                <tbody>
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
                                            <div class="form-control">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-picture-o"></i>
                                                <input type="file" name="attendance" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                            </label>
                                         </td>
                                        <td> 
                                            <div class="form-control">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-picture-o"></i>
                                                <input type="file" name="report" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                            </label>
                                        </td>
                                        <td> 
                                            <div class="form-control">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <label class="custom-file-upload btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-picture-o"></i>
                                                <input type="file" name="evidence" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Arquivo
                                            </label> 
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class=" col">   
                                                    <button type="submit" class="form-control btn btn-primary "><i class="fa fa-upload"></i> Enviar</button> 
                                                </div> 
                                            </div>
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