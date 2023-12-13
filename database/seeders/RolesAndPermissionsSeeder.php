<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $doctorRole = Role::create(['name' => 'Doctor']);
        $nurseRole = Role::create(['name' => 'Nurse']);
        $patientRole = Role::create(['name' => 'Patient']);

        // Assign roles to users as needed
        // Example: $user->assignRole('Admin');
    }
}
