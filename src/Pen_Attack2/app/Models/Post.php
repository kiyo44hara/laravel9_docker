<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // ダミーデータの作成を可能にしている↓
    use HasFactory;
    // データ保存許可
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
}
