<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Orphan;
use App\Sponserform;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array 
     */
    protected $fillable = [
        'name','user_type', 'email', 'password','confirm_password','gender','phone','phone2','state','city','unit','home_no','filename','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
                          protected $hidden = [
                              'password', 'remember_token',
                          ];
 

                          public function orphans()
                        {
                            return $this->hasMany(Orphan::class);
                        }

                        public function sponserforms()
                         {
                          return $this->belongsToMany('App\Sponserform','sponserform_user');

                         }
                         

                       

}
