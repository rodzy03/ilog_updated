<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zipcode
 * 
 * @property int $id
 * @property string $country
 * @property string $major_area
 * @property string $zip_code
 * @property string $city
 *
 * @package App\Models
 */
class Zipcode extends Model
{
	protected $table = 'zipcodes';
	public $timestamps = false;

	protected $fillable = [
		'country',
		'major_area',
		'zip_code',
		'city'
	];
}
