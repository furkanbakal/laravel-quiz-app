<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $dates = [
        'created_at',
        'updated_at',
        'finished_at',
    ];

    protected $fillable=['title','description','status','finished_at'];

    public function question(){
        return $this->hasMany('App\Models\Question');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
