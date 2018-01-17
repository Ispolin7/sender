<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Template extends Model
{
    use Selectable;

    protected $fillable = [
        'name',
        'content',
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
