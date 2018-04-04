
@if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Editor'))
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">Excluir Documentário</div>
                        <div class="card-body">
                            <form action="{{route('doc.delete')}}" method="post" required>
                            {{csrf_field()}}                                        
                                <select class="form-control" name = "title" id="title">
                                    <option>
                                                                 
                                    </option>    
                                    @foreach ($videos as $video)
                                       <option>
                                           {{$video->title}}                      
                                        </option>
                                    @endforeach
                                </select>                                   
                                <hr>
                                <div class="form-group">
                                    <div class=" col"> 
                                        <button type="submit" class="form-control btn btn-danger "><i class="fa fa-minus-square"></i> Excluir Documentário</button> 
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