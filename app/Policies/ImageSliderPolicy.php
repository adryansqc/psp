<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ImageSlider;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageSliderPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ImageSlider');
    }

    public function view(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('View:ImageSlider');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ImageSlider');
    }

    public function update(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('Update:ImageSlider');
    }

    public function delete(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('Delete:ImageSlider');
    }

    public function restore(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('Restore:ImageSlider');
    }

    public function forceDelete(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('ForceDelete:ImageSlider');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ImageSlider');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ImageSlider');
    }

    public function replicate(AuthUser $authUser, ImageSlider $imageSlider): bool
    {
        return $authUser->can('Replicate:ImageSlider');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ImageSlider');
    }

}