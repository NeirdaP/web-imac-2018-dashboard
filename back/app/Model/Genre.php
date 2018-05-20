<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    /*Attributes definition */
    
    protected $fillable = [
        'id',
        'name'      
    ];
    
    /* Hidden elements */
    
    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    /* Relationships between Models */

    public function movies() {
        return $this->belongsToMany('App\Model\Movie', 'moviegenre');
    }
}
