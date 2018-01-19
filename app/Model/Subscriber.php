<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
use SoftDeletes;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'bunches_id',
        'created_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($table) {
            $table->created_id = Auth::user()->id;
        });
    }


    public function scopeOwned($query){
        return $query->where('created_id', Auth::user()->id);
}




}


