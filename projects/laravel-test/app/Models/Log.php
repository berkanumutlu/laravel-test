<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i:s';
    public const ACTIONS = [
        'create',
        'update',
        'delete',
        'force_delete',
        'restore',
        'approve',
        'reset',
        'login',
        'logout',
        'change_password',
        'password_changed_send_mail',
        'create_password_reset_token',
        'reset_password',
        'reset_password_changed',
        'reset_password_send_mail'
    ];

    public const MODELS = [
        Article::class,
        Category::class,
        Admin::class,
        User::class
    ];

    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }
}
