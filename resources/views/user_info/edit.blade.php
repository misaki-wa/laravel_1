@extends('layouts.app')

@section('content')
@if(count($errors) > 0)
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

<h1>お届け先住所変更</h1>
<form method="POST" action="{{ route('userinfo.update') }}">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $user_info->id }}">
<div>
<label>お届け先氏名:</label>
<input type="text" name="fullname" value="{{ $user_info->fullname }}">
</div>
<div>
<label>郵便番号(7桁):</label>
<input type="text" name="postalcode" value="{{ $user_info->postalcode }}" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture','city', 'address');">
</div>
<div>
<label>都道府県:</label>
<select name="prefecture">
@foreach ($prefs as $name)
<option value="{{ $name }}" @if ($user_info->prefecture == $name) selected @endif>{{ $name }}</option>
@endforeach
</select>
</div>
<div>
<label>市町村:</label>
<input type="text" name="city" value="{{ $user_info->city }}">
</div>
<div>
<label>以降の住所:</label>
<input type="text" name="address" value="{{ $user_info->address }}">
</div>
<div>
<label>電話番号:</label>
<input type="text" name="tell" value="{{ $user_info->tell }}">
</div>
<button type="submit">登録</button>
</form>
<p><a href="{{ route('userinfo') }}">お届け先住所一覧に戻る</a></p>
@endsection
