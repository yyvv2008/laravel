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

Route::get('/', function () {
    return view('match');
});

Route::get('test', function () {
	return 'hello world';
});

Route::get('public/test', function () {
	return 'hello world for test';
});

Route::post('test2', function() {
	return 'test2';
});

Route::match(['post', 'get'], 'match', function() {
	return 'match';
});

Route::any('any', function() {
	return 'any';
});

// Route::get('user/{id}', function($id) {
// 	return $id;
// });

// Route::get('user/{id}/{name?}', function($id, $name = 'tom') {
// 	return 'name-' . $name . '-id-' . $id;
// })
// // ->where('name', '[a-zA-Z]+');
// ->where(['name' => '[a-zA-Z]+', 'id' => '[0-9]+']);



// Route::get('user/center', ['as' => 'center', function() {
// 	return route('center');
// }]);


Route::group(['prefix' => 'member'], function() {
	Route::get('user/center', ['as' => 'center', function() {
		return route('center');
	}]);

	Route::any('any', function() {
		return 'mem-any';
	});
});


Route::get('view', function () {
    return view('welcome');
});

// Route::get('member/info', 'MemberController@info');

// Route::get('member/info', ['uses' => 'MemberController@info']);

// Route::get('member/{id}', ['uses' => 'MemberController@info'])->where('id', '[0-9]+');


Route::get('member/info', [
	'uses' => 'MemberController@info',
	'as' => 'mem-info',
]);

Route::any('node/test', ['uses' => 'NodeController@test']);
Route::any('node/query1', 'NodeController@query1');
Route::any('node/query2', 'NodeController@query2');
Route::any('node/query3', 'NodeController@query3');
Route::any('node/query4', 'NodeController@query4');
Route::any('node/orm1', 'NodeController@orm1');
Route::any('node/orm2', 'NodeController@orm2');
Route::any('node/orm3', 'NodeController@orm3');
Route::any('node/orm4', 'NodeController@orm4');
Route::any('node/section1', 'NodeController@section1');
Route::any('node/urlTest', ['uses' => 'NodeController@urlTest', 'as' => 'url']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('homesssss');


Route::any('upload', 'StudentController@upload');
Route::any('mail', 'StudentController@mail');
Route::any('cache1', 'StudentController@cache1');
Route::any('cache2', 'StudentController@cache2');
Route::any('error', 'StudentController@error');
Route::any('queue', 'StudentController@queue');



Route::any('node/active0', ['uses' => 'NodeController@active0']);


Route::any('node/request1', ['uses' => 'NodeController@request1', 'as' => 'request1']);

Route::group(['meddelware' => ['web']], function() {
	Route::any('node/session1', ['uses' => 'NodeController@session1']);
	Route::any('node/session2', ['uses' => 'NodeController@session2', 'as' => 'session2']);
	Route::any('node/response', ['uses' => 'NodeController@response']);

		
	Route::any('node/index', ['uses' => 'NodeController@index']);
	Route::any('node/create', ['uses' => 'NodeController@create']);
	Route::any('node/save', ['uses' => 'NodeController@save']);
	Route::any('node/update/{id}', ['uses' => 'NodeController@update']);
	Route::any('node/view/{id}', ['uses' => 'NodeController@view']);
	Route::any('node/delete/{id}', ['uses' => 'NodeController@delete']);
});

Route::group(['middleware' => ['active']], function() {
	Route::any('node/active1', ['uses' => 'NodeController@active1']);
});

Route::any('node/redis', ['uses' => 'NodeController@redis']);
Route::any('node/mongodb', ['uses' => 'NodeController@mongodb']);
Route::any('node/foreignKey', ['uses' => 'NodeController@foreignKey']);

