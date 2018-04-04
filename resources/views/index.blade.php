
@extends('index.index')

@section('content')

    @include('layouts.error')

    @include('layouts.alert')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                   <div class="content">
    		            <div class="title is-1">
    		                CEA
    		            </div>
                        <div class="subtitle is-6">
                            Comunicação e Educação Ambiental
                        </div>
    		        </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
        	
    			        <div class="col-md-12" style= "text-align: justify">  
    			            <p> Este Banco de Dados tem por objetivo disponibilizar as informações sobre o trabalho de Comunicação e Educação Ambiental da Dragagem de Aprofundamento de Paranaguá (2018) no processo em que as atividades se desenvolvem. </p> 
    			        </div>
    			    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

@endsection
