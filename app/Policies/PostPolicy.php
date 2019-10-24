<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
// Importado
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Función para poder ver y editar un post solo si el usuario fue el que creó ese post
     */
    public function pass( User $user, Post $post )
    {

        return $user->id == $post->user_id;

    }
}
