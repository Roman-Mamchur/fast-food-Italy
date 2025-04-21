<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\user;
use App\Models\Country;
use App\Models\CountryState;
use App\Models\City;
use Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'verify_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'translate_agent_lang'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function translate_agent()
    {
        return $this->belongsTo(TranslateUser::class,'id','user_id')->where('lang_code','en');
    }

    public function listing()
    {
        return $this->hasMany(Listing::class,'agent_id','id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function country_state()
    {
        return $this->belongsTo(CountryState::class,'state_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
}
