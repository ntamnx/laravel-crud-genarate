<?php

Route::get('tamnx/demo', function(){
	echo 'Hello from the calculator package!';
});
Route::get('add/{a}/{b}', 'Tamnx\Demo\CalculatorController@add');
Route::get('subtract/{a}/{b}', 'Tamnx\DemoCalculatorController@subtract');