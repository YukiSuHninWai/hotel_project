<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ShowImages;
class HotelImage extends Model
{
    //
	use ShowImages;
	protected $fillable = [
	'hotel_id',
	'name',
	'image_name',
	'image_extension'];
}
