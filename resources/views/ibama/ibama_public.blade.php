<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Relatório consolidado Ibama</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Data</th>
                                <th>Título</th>
                                <th>Relatório</th>
                            </thead>
                            <tbody>
                                @foreach($ibamas as $ibama)
                                   <tr> 
                                       <td> 
                                             {{ $ibama->date }}
                                        </td>
                                        <td> 
                                             {{ $ibama->title }}
                                        </td>
                                        <td>
                                            @if (!is_null($ibama->report))
                                                <a href="{{ route('ibama.report', $ibama->id) }}" class="btn btn-primary"> <i class="fa fa-download"></i> Abrir</a>
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