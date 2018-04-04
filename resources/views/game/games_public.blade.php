<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatório do Jogo desenvolvido</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                
                                <th>Link</th>
                                <th>Roteiro</th>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                   <tr> 
                                       <td> 
                                            @if (!is_null($game->link))
                                                <a href="{{$game->link}}" aria-hidden="true"><i class="fa fa-rss"></i> {{ $game->link }}</a> 
                                            @endif 
                                        </td>
                                        <td>
                                            @if (!is_null($game->guide))
                                                <a href="{{ route('game.guide', $game->id) }}" class="btn btn-primary "> <i class="fa fa-download"></i> Abrir</a> 
                                            @endif   
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