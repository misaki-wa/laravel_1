@extends('layouts.app')

@section('content')

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
				<div class="panel-heading">商品詳細</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th>商品名</th>
							<td>{{ $item->name }}</td>
						</tr>
						<tr>
							<th>商品説明</th>
							<td>{{ $item->description }}</td>
						</tr>
						<tr>
							<th>�価格</th>
							<td>{{ $item->price }}円</td>
						<tr>
							<th>在庫</th>
							@if ($item->stock <= 0)
							  <td>在庫なし/td>
							@else
								@auth
								<td>
				         		           <form method="POST" action="{{ route('cart.store') }}">
							          	 {{ csrf_field() }}
							 		 <select name="quantity">
									 @for ($i = 1; $i <= $item->stock; $i++)
						 	 			<option value="{{ $i }}">{{ $i }}</option>
									 @endfor
							 		 </select>
							 		 <input type="hidden" name="item_id" value="{{ $item->id }}">
							  		 <button type="submit">カートに入れる</button>
								   </form>
								</td>
								@endauth
								@guest
								<td><a href="{{ route('login') }}">ログインしてください。</a></td>
								@endguest
								@endif
					       </tr>
					</table>
				</div>
				<div><a href="{{ route('home') }}">商品一覧に戻る</</div>
			</div>
		</div>
	</div>
</div>
@endsection
