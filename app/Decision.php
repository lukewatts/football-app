<?php namespace App;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Decision extends Model
{
	// use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'decisions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['choice', 'user_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = ['is_admin', 'password', 'remember_token'];

	/**
	 * A user has many decisions
	 * You would access this by using $decision->maker to get the user who made the decision
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function maker()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeIsPlaying($query)
	{
		return $query->whereChoice('1');
	}

	public function scopeNotPlaying($query)
	{
		return $query->whereChoice('2');
	}

	/**
	 * For use as Decision::made();
	 */
	public function scopeMade($query, $auth_id)
	{
		return $query->where('user_id', '=', $auth_id);
	}

}
