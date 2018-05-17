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
    
    /* Hidden elements */
    
    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    /* Relationships between Models */
    
    public function theaterMovie() {
        return $this -> hasMany('App\Model\Movie', 'movietheater');
    }
    
    public function theaterFrequenting() {
        return $this -> hasMany('App\Model\Frequenting');
    }
}
