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

use App\Page;

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$router->get('/write', function(){
	$page = new Page([
		'title' => generateRandomString(10)
	]);

	$page->save();

    return $page->title;
});

$router->get('/read', function(){
	$page = Page::inRandomOrder()->first();

	return $page->title;
});

$router->get('/sleep', function(){
	sleep(1);

	return 'sleeped';
});
