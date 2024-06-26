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
    // '$fiilable' 속성은 대량 할당이 가능한 속성을 지정하는 배열이다.
    protected $fillable = [
        'account', 
        'name',
        'password',
        'gender',
        'porfile',
        'refresh_token',
    ];

    /**
     * serialization(정해져o): 다른 포멧으로 바꾸는 것
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // 데이터 전달해줄 때 json 형태로 전달해주는데
    // json에 자동으로 제외해줄 컬럼들 작성 
    protected $hidden = [
        'password',
        'refresh_token',
    ];
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

