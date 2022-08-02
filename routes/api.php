<?php

Route::group(['prefix' => 'api', 'namespace' => 'HonestTraders\CoreService\Controllers\Api',], function(){
	Route::get('service/check', 'CheckController@index');
});
