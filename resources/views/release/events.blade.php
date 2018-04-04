<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Release criados</div>
                <div class="card-body">
                    <div class="table-hover table-sm">
                        <table class="table">
                            <thead>
                                <th>Tema</th>
                                <th>midia</th>
                                <th>Data</th>
                                <th>Link</th>
                                <th>Evidência</th>
                            </thead>
                            <tbody>
                                @foreach($releases as $release)
                                    <tr>  
                                        <td>{{ $release->theme }}</td>
                                        <td>{{ $release->media }}</td>
                                        <td>{{ $release->date }}</td>
                                        <td>
                                            @if (!is_null($release->link))
                                                <a href="{{ $release->link }}" class="fa fa-rss" aria-hidden="true"> {{ $release->link }}</a> 
                                            @endif 
                                        </td>
                                        <td>
                                            @if (!is_null($release->evidence))
                                                <a href="{{ route('rel.evidence', $release->id) }}" class="btn btn-primary fa fa-download"> Abrir</a> 
                                            @endif      
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