<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'content',
        'img',
        'like',

    ];

    // serializeDate -> 정해져있는 데이트명
    /**
     * 자동완성??
     * 
     * @param \DateTimeInerface $date
     * 
     * @return String('Y-M-D H:i:s')
     */
    // 포멧형식 지정
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
