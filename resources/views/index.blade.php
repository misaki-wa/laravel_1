@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<p><a href="{{ route('cart') }}">カート</a></p>
			<div class="panel panel-default">
				<div class="panel-heading">商品一覧</div>
					<div class="panel panel-body">
						<table class="table table-striped">
						<thead>
						  <tr>
							<th>商品名</th>
							<th>値段</th>
							<th>在庫</th>
						  </tr>
						</thead>
						<tbody>
						@foreach ($items as $item)
		     				  <tr>
							<td><a href="{{ route('detail', ['id' => $item->id]) }}">{{ $item->name }}</a></td>
							<td>{{ $item->price }}円</td>
							@if ( $item->stock <= 0)
							<td>在庫無し</td>
							@else
							<td>在庫あり</td>
							@endif
						  </tr>
						@endforeach
						</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
