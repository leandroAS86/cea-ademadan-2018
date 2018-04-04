 <input type="file" name="file" id="file" class="inputfile"  >
                            <label for="file">Arquivo</label><span id='file'></span>

                            jQuery(document).ready(function(){

   jQuery("#input-file").click(function(){

		var $input    = document.getElementById('input-file'),
		    $fileName = document.getElementById('file-name');
			$input.addEventListener('change', function(){
		  	$fileName.textContent = this.value;
		});
   });
});

<div class='input-wrapper '>
                              <label for='input-file'>
                                Selecionar um arquivo
                              </label>
                              <input name ="file" id='input-file' type='file' value='' />
                              <span id='file-name'></span>
                            </div>


<label for="ata">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            <input type="file" id="ata" style="display:none">
                         </label> </td>


                         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<label for="upload">
      <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
      <input type="file" id="upload" style="display:none">
    </label>

    'ata' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'report' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'authoritie' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'attendance' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'video' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',

function setNameFile(str) {
    document.getElementById(str).innerHTML = "Hello World";
}

<label for="ata" id="file_ata"> 
                                                      <span class="fa fa-archive" aria-hidden="true" ></span>
                                                      <input type="file" name="ata" id="ata" style="display: none;" onclick="setNameFile('file_ata')">File
                                                    </label>



                                                                                    <!-- Pagina com tabelas par inserir relatorios
                                    <a class="navbar-brand fa fa-file" aria-hidden="true" href="{{ route('rep.index') }}"> Relatórios</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label   ="Toggle navigation"><span class="navbar-toggler-icon"></span>
                                    </button>

                                <!-- Pagina para criar agenda de eventos(audiencias, reunioes e mutiroes)
                                <a class="navbar-brand fa fa-book" aria-hidden="true" href="{{ route('sch.index') }}"> Agenda</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label   ="Toggle navigation"><span class="navbar-toggler-icon"></span>
                                    </button>

                                 <!-- Pagina para criar agenda de eventos(audiencias, reunioes e mutiroes)
                                    <a class="navbar-brand fa fa-newspaper-o" aria-hidden="true" href="{{ route('rel.index') }}"> Release</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label   ="Toggle navigation"><span class="navbar-toggler-icon"></span>
                                    </button>

                                     <!-- Pagina para gerenciar usuarios e niveis de acesso             
                                 <a class="navbar-brand fa fa-user-circle" aria-hidden="true" href="{{ route('cat.index') }}"> Usuários</a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label   ="Toggle navigation"><span class="navbar-toggler-icon"></span>
                                    </button>

                                -->




<!--
<link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">

<script src="//vjs.zencdn.net/4.12/video.js"></script>

<video class="video-js vjs-default-skin vjs-big-play-centered"
                                                               controls preload="auto" height="100" >

                                                            <source src="{{ route('aud.video', $audience->schedule_id) }}" type="xvideo/x-msvideo" />
                                                        </video>-->