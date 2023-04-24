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
}
