@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="low">
		<div class="col-md-8 col-md-offset-2">
		<div><a href="{{route('item.create')}}">商品追加</a></div>
			<div class="panel panel-default">
				<div class="panel-heading">商品一覧</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>商品名</th>
							<th>値段</th>
							<th>在庫</th
						</tr>
						@foreach ($items as $item)
						<tr>
							<td><a href="{{route('item.detail', ['id' => $item->id])}}">{{$item->name}}</a></td>
							<td>{{$item->price}}円</td>
							@if ($item->stock <= 0)
							<td>在庫なし</td>
							@else
							<td>在庫あり</td>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
