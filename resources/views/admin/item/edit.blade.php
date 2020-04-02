@extends('layouts.app_admin')
@section('content')
@if(count($errors) > 0)
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
<div class="container">
	<div="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel default">
				<div class="panel-heading">商品編集<div>
				<div class="panel-body">
					<form method="POST" action="{{route('item.update')}}">
						<input type="hidden" name="id" value="{{$item->id}}">
						{{ csrf_field() }}
						<p>商品名:<input type="text" name="name" value="{{$item->name}}"></p>
						<p>商品説明:
						<textarea name="description">{{$item->description}}</textarea></p>
						<p>値段:{{$item->price}}円</p>
						<p>在庫:<input type="text" name="stock" value="{{$item->stock}}"></p>
						<button type="submit">登録</button>
					</form>
				</div>
				<div><a href="{{route('item.detail', $item->id)}}">商品詳細に戻る</</div>
			</div>
		</div>
	</div>
</div>
@endsection
