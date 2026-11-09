<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Human Resources', 'code' => 'HR', 'description' => 'People operations and recruitment'],
            ['name' => 'Finance', 'code' => 'FIN', 'description' => 'Accounts, payroll and budgeting'],
            ['name' => 'Information Technology', 'code' => 'IT', 'description' => 'Software, infrastructure and support'],
            ['name' => 'Marketing', 'code' => 'MKT', 'description' => 'Brand, campaigns and communications'],
            ['name' => 'Operations', 'code' => 'OPS', 'description' => 'Day-to-day business operations'],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['code' => $department['code']],
                $department
            );
        }
    }
}
