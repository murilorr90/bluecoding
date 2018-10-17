<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'first_name',
        'last_name',
        'is_host',
        'date_of_birth',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'is_host' => 'boolean',
        'date_of_birth' => 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservation()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }

    public static function getRecommendations($user, $distance = 50, $miles = true)
    {
        $multiplier = $miles ? 3958.75586576104 : 6371; //Miles or Km

        $raw = DB::raw('round(( '.$multiplier.' * 
                acos( 
                    cos( radians(' . $user->latitude . ') ) * 
                    cos( radians( latitude ) ) * 
                    cos( radians( longitude ) - radians(' . $user->longitude . ') ) + 
                    sin( radians(' . $user->latitude . ') ) *
                    sin( radians( latitude ) ) 
                ) 
            ),3)  as distance');

        $commends = self::select('id', 'name', 'email', $raw)
            ->where('id', '!=', $user->id)
            ->having('distance', '<=', $distance)
            ->orderBy('distance', 'ASC')
            ->get();

        return $commends;
    }
}
