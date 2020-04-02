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

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			@if (count($carts) == 0)
				<p>カートが空です。</p>
			@else
				<div class="panel-heading">カートの中身</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>商品名</th>
							<th>購入数</th>
							<th>価格</th>
							<th>削除</th>
						</tr>
						@foreach ($carts as $cart)
							<td>{{ $cart->item->name }}</td>
							<td>{{ $cart->quantity }}</td>
							<td>{{ $cart->quantity * $cart->item->price }}円</td>
							<td>
								<form method="POST" action="{{ route('cart.delete') }}">
									{{ csrf_field() }}
									<input type="hidden" name="cart_id" value="{{ $cart->id }}">
									<button type="submit">削除</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
			  	    	<p>合計金額{{ $subtotal }}円</p>
			@endif
		</div>
	</div>
</div>
<p><a href="{{ route('home') }}">商品一覧に戻る</a></p>
<p><a href="{{ route('userinfo') }}">お届け先を選択する</a></p>
@endsection
