<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\EditRequest;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
	public function index() {
		$items = Item::get();
		return view('admin.index', compact('items'));
	}
	public function detail($id) {
		$item = Item::find($id);
		return view('admin.item.detail', compact('item'));
	}
	public function create() {
		return view('admin.item.create');
	}
	public function store(ItemRequest$request) {
		$item = new Item;
		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();
		return view('admin.item.store');
	}
	public function edit($id) {
		$item = Item::find($id);
		return view('admin.item.edit', compact('item'));
	}
	public function update(EditRequest$request) {
		$item = Item::find($request->id);
		$item->name = $request->name;
		$item->description = $request->description;
		$item->stock = $request->stock;
		$item->save();
		return view('admin.item.update');
	}
}
