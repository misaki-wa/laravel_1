<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserInfoRequest;

class UserInfosController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$user_infos = UserInfo::where('user_id',Auth::id())->get();
		return view('user_info.index', compact('user_infos'));
	}
	public function create() {
		$prefs = config('pref');
		return view('user_info.create', compact('prefs'));
	}
	public function store(UserInfoRequest$request) {
		$user_info = new UserInfo;
		$user_info->user_id = Auth::id();
		$user_info->fill($request->all())->save();
		return redirect()->route('userinfo')->with('flash_message','お届け先住所を追加しました。');
	}
	public function edit($id) {
		$user_info = UserInfo::find($id);
		if ($user_info->user_id != Auth::id()) {
			return redirect()->route('userinfo');
		}
		$prefs = config('pref');
		return view('user_info.edit', compact('user_info', 'prefs'));
	}
	public function update(UserInfoRequest$request) {
		$user_info = UserInfo::find($request->id);
		if ($user_info->user_id != Auth::id()) {
			return redirect()->route('userinfo');
		}
		$user_info->fill($request->all())->save();
		return redirect()->route('userinfo')->with('flash_message','お届け先住所を編集しました。');
	}
	public function delete(Request$request) {
		$user_info = UserInfo::find($request->input('id'));
		if ($user_info->user_id != Auth::id()) {
			return redirect()->route('userinfo');
		}
		$user_info->delete();
		return redirect()->route('userinfo')->with('flash_message', '削除しました。');
	}
}
