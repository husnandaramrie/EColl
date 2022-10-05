<?php

namespace App\Policies;

use App\Models\ECollectUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class ECollectUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(ECollectUser $eCollectUser, ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(ECollectUser $eCollectUser, ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(ECollectUser $eCollectUser, ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(ECollectUser $eCollectUser, ECollectUser $eCollectUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @param  \App\Models\ECollectUser  $eCollectUser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(ECollectUser $eCollectUser, ECollectUser $eCollectUser)
    {
        //
    }
}
