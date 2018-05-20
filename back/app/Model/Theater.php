<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model {
    
    /*Attributes definition */
    
    protected $fillable = [
        'id',
        'name',
        'address',
        'postalCode',
        'latitude',
        'longitude',
        'numberOfSeat',
        'numberOfRoom',
        'artHouse'        
    ];
    
    public $timestamps = false;

    /* Hidden elements */
    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    /* Relationships between Models */
    
    public function movies() {
        return $this->belongsToMany('App\Model\Movie', 'movie_theater');
    }
}
