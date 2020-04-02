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
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品追加<div>
				<div class="panel-body">
					<form method="POST" action="{{route('item.store')}}">
					{{ csrf_field() }}
						<p>商品名:<input type="text" name="name" value="{{ old('name')}}"></p>
						<p>商品説明:<textarea name="description">{{ old('description')}}</textarea></p>
						<p>値段:<input type="text" name="price" value="{{ old('price')}}"></p>
						<p>在庫:<input type="text" name="stock" value="{{ old('stock')}}"></p>
						<button type="submit">登録</button>
					</form>
				</div>
				<div><a href='{{route('admin.home')}}'>商品一覧に戻る</</div>
			</div>
		</div>
	</div>
</div>
@endsection
