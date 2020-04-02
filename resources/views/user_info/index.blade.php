@extends('layouts.app')

@section('content')

@if (session('flash_message'))
{{ session('flash_message') }}
@endif

@if ($errors->any())
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

@if (count($user_infos) == 0)
<p>お届け先が登録されていません。</p>
@else
<h1>お届け先一覧</h1>
@foreach ($user_infos as $user_info)
<div><input type="checkbox" value="{{ $user_info->id }}">このお届け先を選択</div>
<div>{{ $user_info->fullname }}様</div>
<div>{{ $user_info->postalcode }}</div>
<div>{{ $user_info->prefecture }}{{ $user_info->city }}{{ $user_info->address }}</div>
<div>{{ $user_info->tell }}</div>
<p><a href="{{ route('userinfo.edit', ['id' => $user_info->id]) }}">編集</a></p>
<form method="POST" action="{{ route('userinfo.delete') }}">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $user_info->id }}">
<input type="submit" value="削除する">
</form>
@endforeach
@endif
<p><a href="{{ route('userinfo.create') }}">お届け先を追加する</a></p>
<p><a href="{{ route('cart') }}">カートに戻る</a></p>
@endsection
