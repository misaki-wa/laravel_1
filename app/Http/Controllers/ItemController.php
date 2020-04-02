<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller {
	public function index() {
		$items = Item::get();
		return view ('index', ['items' => $items]);
	}
	public function detail($id) {
		$item = Item::find($id);
		return view('item.detail', compact('item'));
	}
}
