<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [
        'uses' => 'PageController@index',
        'as' => 'index',
    ]);

Route::get('home', [
        'uses' => 'HomeController@index',
        'as' => 'home',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor']
    ]);

Route::group(['middleware' => 'roles', 'roles' => ['user', 'admin', 'editor'], 'as' => 'cea.', 'prefix' => 'cea'], function(){
    
    Route::get('public/{type?}', [        
        'as' => 'index', 
        'uses' => 'CeaController@index'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['user', 'admin', 'editor'], 'as' => 'plbm.', 'prefix' => 'plbm'], function(){
    
    Route::get('public/{type?}', [        
        'as' => 'index', 
        'uses' => 'PlbmController@index'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['user', 'admin', 'editor'], 'as' => 'ig.', 'prefix' => 'ibama_game'], function(){
    
    Route::get('public/{type?}', [        
        'as' => 'index', 
        'uses' => 'IbamaGamesController@index'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['editor', 'admin'], 'as' => 'rep.', 'prefix' => 'report'], function(){
    Route::get('report/{type?}', [
        'as' => 'index', 
        'uses' => 'ReportController@index'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['admin'], 'as' => 'cat.', 'prefix' => 'category'], function(){
    Route::get('', [
        'as' => 'index', 
        'uses' => 'CategoryController@index'
    ]);
    Route::post('atribuir', [        
        'as' => 'atribuir', 
        'uses' => 'CategoryController@atribuir'
    ]);

    Route::get('{id}/delete', [        
        'as' => 'delete', 
        'uses' => 'CategoryController@delete'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['admin'], 'as' => 'sch.', 'prefix' => 'schedule'], function(){
    Route::get('schedule/{type?}', [
        'as' => 'index', 
        'uses' => 'ScheduleController@index'
    ]);

    Route::post('audience', [        
        'as' => 'audience', 
        'uses' => 'ScheduleController@createAudience'
    ]);
    Route::post('meetings', [        
        'as' => 'meetings', 
        'uses' => 'ScheduleController@createMeeting'
    ]);

    Route::post('effort', [        
        'as' => 'effort', 
        'uses' => 'ScheduleController@createEffort'
    ]);

    Route::post('presentation', [        
        'as' => 'presentation', 
        'uses' => 'ScheduleController@createPresentation'
    ]);

     Route::post('instructional', [        
        'as' => 'instructional', 
        'uses' => 'ScheduleController@createInstructional'
    ]);

    Route::post('presentationgame', [        
        'as' => 'presentationgame', 
        'uses' => 'ScheduleController@createPresentationGame'
    ]);

    Route::post('game', [        
        'as' => 'game',
        'middleware' => 'roles', 
        'roles' => ['editor', 'admin'],  
        'uses' => 'ScheduleController@createGame'
    ]);

    Route::get('{id}/delete', [        
        'as' => 'delete',
        'uses' => 'ScheduleController@deleteSchedule'
    ]);
});

//MeetingController
Route::group(['as' => 'meet.', 'prefix' => 'meeting'], function(){
    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'MeetingController@update',
    ]);

    Route::get('{id}/ata', [        
        'as' => 'ata',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'MeetingController@showAta'
    ]);

    Route::get('{id}/report', [        
        'as' => 'report',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'MeetingController@showReport'
    ]);
});

//AudienceController
Route::group(['as' => 'aud.', 'prefix' => 'audience'], function(){
    Route::post('upload/{id?}', [        
        'as' => 'upload', 
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'],
        'uses' => 'AudienceController@update',
    ]);

    Route::get('{id}/attendance', [        
        'as' => 'attendance', 
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'AudienceController@showAttendance',
    ]);

    Route::get('{id}/evidence', [        
        'as' => 'evidence', 
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'AudienceController@showEvidence',
    ]);

    Route::get('{id}/foto', [        
        'as' => 'foto', 
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'AudienceController@showVideo',
    ]);
});

//PresentationController
Route::group(['as' => 'pres.', 'prefix' => 'presentation'], function(){
       
    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'PresentationController@update',
    ]);

    Route::get('{id}/attendance', [        
        'as' => 'attendance',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'PresentationController@showAttendance',
    ]);

    Route::get('{id}/evidence', [        
        'as' => 'evidence',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'PresentationController@showEvidence'
    ]);

    Route::get('{id}/report', [        
        'as' => 'report',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'PresentationController@showReport'
    ]);
});

//InstructionalController
Route::group(['as' => 'inst.', 'prefix' => 'instructional'], function(){
       
    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'InstructionalController@update',
    ]);

    Route::get('{id}/evidence', [        
        'as' => 'evidence',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'InstructionalController@showEvidence'
    ]);

});

//PresentationGameController
Route::group(['as' => 'presg.', 'prefix' => 'presentationgame'], function(){
       
    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'PresentationGameController@update',
    ]);

    Route::get('{id}/attendance', [        
        'as' => 'attendance',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'PresentationGameController@showAttendance',
    ]);

    Route::get('{id}/evidence', [        
        'as' => 'evidence', 
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'PresentationGameController@showEvidence'
    ]);

    Route::get('{id}/report', [        
        'as' => 'report', 
        'uses' => 'PresentationGameController@showReport'
    ]);
});

//EfortController
Route::group(['as' => 'eff.', 'prefix' => 'effort'], function(){
       
    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'EffortController@update',
    ]);

    Route::get('{id}/attendance', [        
        'as' => 'attendance', 
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'],
        'uses' => 'EffortController@showAttendance',
    ]);

    Route::get('{id}/evidence', [        
        'as' => 'evidence',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'EffortController@showEvidence'
    ]);

    Route::get('{id}/report', [        
        'as' => 'report',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'EffortController@showReport'
    ]);
});

//GameController
Route::group(['as' => 'game.', 'prefix' => 'game'], function(){
       
    Route::get('guide/{id?}', [        
        'as' => 'guide',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'GameController@showGame',
    ]);
});

//IbamaController
Route::group(['as' => 'ibama.', 'prefix' => 'ibama'], function(){

    Route::post('upload/{id?}', [        
        'as' => 'upload',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'], 
        'uses' => 'IbamaController@createIbama',
    ]);

    Route::get('{id}/report', [        
        'as' => 'report',
        'middleware' => 'roles',
        'roles' => ['user', 'admin', 'editor'], 
        'uses' => 'IbamaController@showReport'
    ]);

    Route::get('{id}/delete', [        
        'as' => 'delete',
        'middleware' => 'roles',
        'roles' => ['admin', 'editor'],
        'uses' => 'IbamaController@delete'
    ]);
});

Route::group(['middleware' => 'roles', 'roles' => ['user', 'admin', 'editor'], 'as' => 'doc.', 'prefix' => 'documentary'], function(){
    Route::get('documentary', [        
        'as' => 'index', 
        'uses' => 'DocumentaryController@index',
    ]);

    Route::post('documentary', [        
        'as' => 'create', 
        'uses' => 'DocumentaryController@create',
    ]);

    Route::post('delete', [        
        'as' => 'delete', 
        'uses' => 'DocumentaryController@deleteDocumentary'
    ]);
});



/*
Route::get('helloword', function () {
    return view('helloword');
});


Route::get('blog', [        
        'as' => 'blog', 
        'uses' => 'BlogController@index'
    ]);

Route::get('', function () {
    return view('index');
});

//ReleaseController
Route::group(['middleware' => 'roles', 'roles' => ['admin'], 'as' => 'rel.', 'prefix' => 'release'], function(){
    Route::get('release', [        
        'as' => 'index', 
        'uses' => 'ReleaseController@index',
    ]);

    Route::post('release', [        
        'as' => 'create', 
        'uses' => 'ReleaseController@create',
    ]);

    Route::get('{id}/release', [        
        'as' => 'evidence', 
        'uses' => 'ReleaseController@showRelease',
    ]);
});

//VideoController
Route::group(['middleware' => 'roles', 'roles' => ['admin'], 'as' => 'video.', 'prefix' => 'video'], function(){
    Route::get('{id?}/video', [        
        'as' => 'video', 
        'uses' => 'VideosController@get_video',
    ]);
});
*/

