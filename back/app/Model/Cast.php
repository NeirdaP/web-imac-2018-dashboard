<?php 

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model{

	protected $fillable = [
		'id',
		'firstname',
		'lastname',
		'sex',
		'nationality'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
	    'created_at',
	    'updated_at'
	];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function nationality()
    {
    	return $this->belongsTo('App\Model\Nationality');
    }

    public function moviesAsActor()
    {
    	return $this->belongsToMany('App\Model\Movie','actors')->withPivot('role');
    }

    public function moviesAsDirector()
    {
    	return $this->belongsToMany('App\Model\Movie','directors');
    }
}
