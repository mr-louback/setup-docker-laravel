<?php

namespace App\Observers;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class SupportObserver
{
    /**
     * Handle the Support "creating" event.
     */
    public function creating(Support $support): void
    {
        $support->user_id = Auth::user()->id;
    }

    /**
     * Handle the Support "updated" event.
     */
    public function updated(Support $support): void
    {
        //
    }

    /**
     * Handle the Support "deleted" event.
     */
    public function deleted(Support $support): void
    {
        //
    }

    /**
     * Handle the Support "restored" event.
     */
    public function restored(Support $support): void
    {
        //
    }

    /**
     * Handle the Support "force deleted" event.
     */
    public function forceDeleted(Support $support): void
    {
        //
    }
}
