<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header"> Relatório consolidado IBAMA</div>

                <div class="card-body">
                   <form method = "post" action="{{route('ibama.upload')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row"> 
                            <div class=" col-sm-4">
                                <label for="date">Data </label>
                                <input type="date" class="form-control" id="date" name="date"  >
                            </div>

                            <div class=" col-sm-4">
                                <label for="title">Título </label>
                                <input type="text" class="form-control" id="title" name="title"  >
                            </div>

                           
                            <div class=" col-sm-4">

                                <div class="form-control">
                                    <i class="fa fa-file"></i>
                                </div>                               
                                <label class=" col-sm-12 btn btn-primary" style="margin-top: 5px"><i class="fa fa-file-picture-o"></i>
                                    <input type="file" name="report" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Relatório
                                </label>
                            </div>
                        </div>
                        <hr>
                        
                         <div class="form-group">
                                <div class=" col">
                                    <button type="submit" class="form-control btn btn-primary "><i class="fa fa-upload"></i> Adicionar Relatório consolidado (IBAMA)</button> 
                                </div> 
                            </div>
                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>