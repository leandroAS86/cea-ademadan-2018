<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Adicionar Release</div>

                <div class="card-body">
                    <form action="{{route('rel.create')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                         <div class="row">

                            <div class="form-group">
                                <div class=" col">
                                    <label for="theme" >Tema </label>
                                    <input type="text" class="form-control" id="theme" name="theme" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col">
                                    <label for="media">Midia </label>
                                    <input type="text" class="form-control" id="media" name="media">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col">
                                    <label for="date">Data </label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class=" col">
                                    <label for="link">Link </label>
                                    <input type="text" class="form-control" id="link" name="link">
                                </div>
                            </div>
                            
                                <div class="form-group">
                                    <div class=" col">
                                    <div class="form-control">
                                        <i class="fa fa-file"></i>
                                    </div>                               
                                    <label class="btn btn-primary fa fa-archive" style="margin-top: 5px">
                                        <input type="file" name="evidence" onchange="$(this).parent().parent().find('.form-control').html($(this).val());"> Arquivo
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col"> 
                                <button type="submit" class="form-control btn btn-primary fa fa-plus-square"> Adicionar</button> 
                            </div> 
                         </div>                  
                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>