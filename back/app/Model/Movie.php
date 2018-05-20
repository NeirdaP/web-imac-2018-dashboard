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
    
    public function genres() {
        return $this->hasMany('App\Model\Genre', 'movie_genre');
    }
    
    public function theaters() {
        return $this->hasMany('App\Model\Theater', 'movie_theater');
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
