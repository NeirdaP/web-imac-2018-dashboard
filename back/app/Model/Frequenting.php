<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Frequenting extends Model {

    /*Attributes definition */
    
    protected $fillable = [
        'id',
        'year',
        'month',
        'numbersOfEntries',
        'idTheater'     
    ];
    
    /* Hidden elements */
    
    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    /* Relationships between Models */
    
    public function frequentingTheater() {
        return $this -> belongsTo('App\Model\Theater');
    }
}
