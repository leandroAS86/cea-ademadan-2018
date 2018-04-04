<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header"> Jogo</div>

                <div class="card-body">
                   <form method = "post" action="{{route('sch.game')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row"> 
                            <div class=" col-sm-8">
                                <label for="link">Link </label>
                                <input type="text" class="form-control" id="link" name="link" required >
                            </div>

                           
                            <div class=" col-sm-4">

                                <div class="form-control">
                                    <i class="fa fa-file"></i>
                                </div>                               
                                <label class=" col-sm-12 btn btn-primary " style="margin-top: 5px"><i class="fa fa-file-pdf-o"></i>
                                    <input type="file" name="guide" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split('\\').pop());"> Roteiro
                                </label>
                            </div>
                        </div>
                        <hr>
                        
                         <div class="form-group">
                                <div class=" col">
                                    <button type="submit" class="form-control btn btn-primary "> <i class="fa fa-upload"></i> Adicionar Relatório de Jogo</button> 
                                </div> 
                            </div>
                        
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>