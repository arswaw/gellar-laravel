<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function read(Request $request, $id) {
    	return;
    }

    public function create(Request $request) {
    	return;
    	//$body_text = json_decode($request->getBody(), true);
    }

    public function update() {
		return;
    }

    public function delete() {
    	return;
    }

    public function get() {
    	$boards = Board::with('author')->get();
    	return response()->json($boards);
    }
}