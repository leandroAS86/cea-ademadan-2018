
@if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Adicionar Documentário</div>

                    <div class="card-body">
                        <form action="{{route('doc.create')}}" method="post">
                        {{csrf_field()}} 
                            <div class="row "> 
                                <div class=" col-sm-4">
                                    <label for="title" >Título </label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class=" col-sm-8">
                                    <label for="link">Link </label>
                                    <input type="text" class="form-control" id="link" name="link" required >
                                </div>

                               
                                <div class=" col-sm-12">
                                    <label for="link">Descrição </label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                           
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <div class=" col">                                     
                                    <button type="submit" class="form-control btn btn-primary "><i class="fa fa-plus-square"></i> Adicionar Documentário</button> 
                                </div> 
                             </div>                  
                        </form>               
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endif
