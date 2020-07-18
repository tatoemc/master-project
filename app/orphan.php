<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Sponserform;

class orphan extends Model
{
    
     protected $fillable = [
        'name','gender','date','state','city','unit','home_no','school','schoolLevel','images','guardian_id' 
    ];

                       
                         public function user()
						    {
						    	return $this->belongsTo(User::class);
						    }

						 public function sponserform()
						    {
						        return $this->belongsTo('App\Sponserform');
						    }

}
 