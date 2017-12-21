<?php

use Illuminate\Foundation\Inspiring;
use App\User;
use App\Board;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('boardmaker', function () {
	$user = User::create([
		'first_name' => 'Alex',
		'last_name' => 'Otten',
		'email' => 'email@example.com',
		'password' => 'ScoobySnacks',
		'is_admin' => 1,
		'phone_number' => '1234567890',
		'title' => 'Site Admin',
		'photo' => 'none',
		'time_zone' => 'Eastern',
		'active' => 1
	]);

    Board::create([
    	'title' => 'Company Announcements',
    	'author_id' => $user->id,
    	'public' => 1,
    	'active' => 1
	]);
});