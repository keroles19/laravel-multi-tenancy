<?php

namespace App\Observers;

use App\Models\Department;

class DepartmentObserver
{
    /**
     * Handle the Department "created" event.
     */
    public function creating(Department $department): void
    {
        if (session()->has('tenant_id')) {
            $department->tenant_id = session('tenant_id');
        }
    }

    /**
     * Handle the Department "updated" event.
     */
    public function updated(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "deleted" event.
     */
    public function deleted(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "restored" event.
     */
    public function restored(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     */
    public function forceDeleted(Department $department): void
    {
        //
    }
}
