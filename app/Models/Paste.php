<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // これをつけ忘れ

class Paste extends Model
{
    use HasFactory;

    protected $fillable = ['contents'];

    // views>pastes>index.blade.php 投稿者IDを正しく取得できていない可能性があるので、Eloquentリレーションの見直し

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
