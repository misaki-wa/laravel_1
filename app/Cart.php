<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
	protected $fillable = ['user_id', 'item_id', 'quantity'];
	protected $table = 'carts';

	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function item()
	{
		return $this->belongsTo('App\Item');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
