<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::all();

        if ($departments->isEmpty()) {
            return;
        }

        Employee::factory()
            ->count(12)
            ->state(fn () => [
                'department_id' => $departments->random()->id,
            ])
            ->create();
    }
}
