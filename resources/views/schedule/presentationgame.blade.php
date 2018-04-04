<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Apresentação do jogo desenvolvido</div>

                <div class="card-body">
                                       
                    <form method = "post" action="{{route('sch.presentationgame')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group">
                                <div class=" col">
                                    <label for="name" >Comunidade </label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                </div>  
                            </div>

                            <div class="form-group">
                                <div class=" col">
                                    <label for="name" >Local </label>
                                    <input type="text" class="form-control" id="place" name="place" >
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
                                    <label for="hour">Hora </label>
                                    <input type="time" class="form-control" id="date" name="hour">
                                </div> 
                            </div>        
                        </div>
                        <div class="form-group">
                            <div class=" col">   
                                <button type="submit" class="form-control btn btn-primary "> <i class="fa fa-calendar-plus-o"></i> Adicionar</button> 
                            </div> 
                        </div>  
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>