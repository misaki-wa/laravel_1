<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$carts = Cart::where('user_id', Auth::id())->get();
		$subtotal = 0;
		foreach ($carts as $cart) {
			$subtotal += $cart->item->price * $cart->quantity;
		}
		return view('cart.index', compact('carts', 'subtotal'));
	}
	public function store(Request$request) {
		$request->validate ([
			'item_id' => 'integer|exists:items,id',
		],
		[
			'item_id.exists' => '無効なIDです。',
		]);
		$cart = Cart::where('user_id', Auth::id())->where('item_id', $request->post('item_id'))->first();
		$item = Item::where('id', $request->post('item_id'))->first();
		if ($cart === null) {
			$max = $item->stock;
		} else {
			$max = $cart->item->stock - $cart->quantity;
		}
		$request->validate([
			'quantity' => "integer|max:{$max}",
		],
		[
			'quantity.max' => "$max" . '個以上は追加できません。',
		]);
		Cart::updateOrCreate([
			'user_id' => Auth::id(),
			'item_id' => $request->post('item_id'),
		],
		[
			'quantity' => \DB::raw('quantity + ' . $request->post('quantity')),
		]);
		return redirect()->route('cart')->with('flash_message', 'カートに追加しました。');
	}
	public function deleteItem(Request$request) {
		$user_id = Auth::id();
		$request->validate([
			'cart_id' => "integer|exists:carts,id,user_id,{$user_id}",
		],
		[
			'cart_id.exists' => '自分のカートの商品以外は削除できません。',
		]);
		$cart = Cart::find($request->input('cart_id'));
		$cart->delete();
		return redirect()->route('cart')->with('flash_message', '削除しました。');
	}
}
