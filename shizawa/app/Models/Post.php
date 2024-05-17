<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'sleep',
        'tired',
        'drink',
        'hangover',
        'user_id',
        'memo',
        'image'
    ];

    public function getSleepAttribute($value)
    {
        switch ($value) {
            case 1:
                return '0〜2時間';
            case 2:
                return '2〜4時間';
            case 3:
                return '4〜6時間';
            case 4:
                return '6〜8時間';
            case 5:
                return '8〜10時間';
            default:
                return '未定義';
        }
    }

    public function getTiredAttribute($value)
    {
        switch ($value) {
            case 1:
                return '超元気';
            case 2:
                return '元気';
            case 3:
                return '普通';
            case 4:
                return 'だるい';
            case 5:
                return 'めっちゃだるい';
            default:
                return '未定義';
        }
    }

    public function getDrinkAttribute($value)
    {
        switch ($value) {
            case 1:
                return '超少ない';
            case 2:
                return '少ない';
            case 3:
                return '普通';
            case 4:
                return '多い';
            case 5:
                return '浴びた';
            default:
                return '未定義';
        }
    }

    public function getHangoverAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'シラフ';
            case 2:
                return 'ほぼシラフ';
            case 3:
                return 'ちょいダル';
            case 4:
                return 'だるい';
            case 5:
                return '二日酔い';
            default:
                return '未定義';
        }
    }
}
