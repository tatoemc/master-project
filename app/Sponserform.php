<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Orphan;

class Sponserform extends Model
{
    //
    protected $fillable = [
        'cache','orphan_id'
    ];

						    public function users()
                         {
                          return $this->belongsToMany('App\User','sponserform_user');

                         }

                         public function orphan()
						    {
						        return $this->belongsTo('App\Orphan');
						    }
}
