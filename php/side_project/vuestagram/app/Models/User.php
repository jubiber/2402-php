<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // 업데이트 가능한 컬럼을 지정해줌
    protected $fillable = [
        'account', 
        'name',
        'password',
        'gender',
        'porfile',
        'refresh_token',
    ];

    /**
     * 다른 포멧ㅇ로 바꾸는걸 serialization이라고 한다.
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // 데이터 전달해줄 때 제이슨 형태로 전달해주는데
    // 제이슨에 자동으로 제외해줄 컬럼들 작성 
    protected $hidden = [
        'password',
        'refresh_token',
    ];
    // serializeDate -> 정해져있는 데이트명
    /**
     * 자동완성??
     */
    // 포멧형식 지정
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d- H:i:s');
    }

    /**
     * Accessor: Column gender
     * 변형해서 추가하는거 (엑세서는 안써두댐)
     */
    public function getGenderAttribute($value) {
        return $value === '0'? '남자' : '여자';
    }

    public function boards() {
        //1:다 관계에서 1인은 hasMany를 씀
        return $this->hasMany(Board::class);
    }
}

