@extends('layouts.app_admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品詳細</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>商品名</th>
							<td>{{$item->name}}</td>
						</tr>
						<tr>
							<th>商品説明</th>
							<td>{{$item->description}}</td>
						</tr>
						<tr>
							<th>値段</th>
							<td>{{$item->price}}円</td>
						</tr>
						<tr>
							<th>在庫の有無</th>
							@if ($item->stock <= 0)
							<td>在庫なし<td>
							@else
							<td>在庫あり</td>
							@endif
						</tr>
					</table>
				</div>
				<div><a href="{{route('item.edit', ['id' => $item->id])}}">編集</a</div>
			</div>
		</div>
		<div><a href="{{route('admin.home')}}">商品一覧に戻る</</div>
	</div>
</div>
@endsection
