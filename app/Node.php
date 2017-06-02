<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NodeUpdated;

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

    public static function loadGatewayId($column)
    {
        $res = self::get($column);

        foreach ($res as $r) {
            $data[$r->gateway_id] = $r->gateway_id;
        }

        return $data;
    }

    public function land()
    {
        return $this->belongsTo('App\Land', 'land_id', 'id');
    }

    public function gateway()
    {
        return $this->hasOne('App\Gateway', 'id', 'gateway_id');
    }
}