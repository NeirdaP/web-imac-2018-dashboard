<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model {

    /*Attributes definition */
    
    protected $fillable = [
      'countryCode',
      'countryName'
  ];
    
    /* Hidden elements */
    
     protected $hidden = [
      'created_at',
      'updated_at'
  ];

    /* Relationships between Models */
    
    public function nationalityMovie() {
        return $this -> hasMany('App\Model\Movie');
    }
    
    public function nationalityCast() {
        return $this -> belongsToMany('App\Model\Cast');
    }
}