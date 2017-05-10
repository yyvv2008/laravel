<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Node extends Model
{
	protected $table = 'byt_klha_node';

	protected $primaryKey = 'id';

	protected $fillable = ['name', 'land_id', 'gateway_id', 'sensor_addr'];

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    // protected function asDateTime($value)
    // {
    // 	return $value;
    // }

    // protected function getDateFormat()
    // {
    // 	return time();
    // }
}