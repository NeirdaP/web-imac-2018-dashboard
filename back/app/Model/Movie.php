<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    /*Attributes definition */
    
    protected $fillable = [
        'id',
        'title',
        'address',
        'blackAndWhite',
        'releaseDate',
        'imageLink',
        'nationality'       
    ];
    
    /* Hidden elements */
    
    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    /* Relationships between Models */
    
    public function movieGenre() {
        return $this->hasMany('App\Model\Genre', 'moviegenre');
    }
    
    public function movieTheater() {
        return $this->hasMany('App\Model\Theater', 'movietheater');
    }
    
    public function nationality() {
        return $this->hasOne('App\Model\Nationality');
    }
    
    public function actors()
    {
        return $this->belongsToMany('App\Model\Cast','actors')->withPivot('role');
    }

    public function directors()
    {
        return $this->belongsToMany('App\Model\Cast','directors');
    }
}
