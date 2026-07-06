<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    public function saving(Project $project)
    {
        if ($project->pin && !$project->wasRecentlyCreated) {
            $pinnedCount = Project::where('pin', true)
                ->where('uuid', '!=', $project->uuid)
                ->count();

            if ($pinnedCount >= 5) {
                $project->pin = false;
                session()->flash('error', 'Maksimal hanya 5 project yang bisa di-pin.');
                return false;
            }
        }
    }

    public function created(Project $project)
    {
        if ($project->pin) {
            $pinnedCount = Project::where('pin', true)
                ->where('uuid', '!=', $project->uuid)
                ->count();

            if ($pinnedCount > 5) {
                $oldestPinned = Project::where('pin', true)
                    ->where('uuid', '!=', $project->uuid)
                    ->oldest()
                    ->first();

                if ($oldestPinned) {
                    $oldestPinned->update(['pin' => false]);
                }
            }
        }
    }

    public function updated(Project $project): void
    {
        if ($project->isDirty('cover')) {
            $oldCover = $project->getOriginal('cover');
            if ($oldCover && $oldCover !== $project->cover) {
                if (Storage::disk('public')->exists($oldCover)) {
                    Storage::disk('public')->delete($oldCover);
                }
            }
        }
    }

    public function deleted(Project $project): void
    {
        if ($project->cover && Storage::disk('public')->exists($project->cover)) {
            Storage::disk('public')->delete($project->cover);
        }
        foreach ($project->galleries as $gallery) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
        }
    }
}
