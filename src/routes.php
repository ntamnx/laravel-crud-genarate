<?php

Route::get('tamnx/demo/create', function(){
	echo 'Hello from the calculator package!';
});
Route::get('tamnx/crud/create', 'Tamnx\Demo\CalculatorController@create');
Route::post('tamnx/crud/store', 'Tamnx\Demo\CalculatorController@store');