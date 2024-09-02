<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function admin_update(Admin $admin, Article $article): bool
    {
        return $admin->id === $article->user_id;
    }

    public function user_update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }
}
