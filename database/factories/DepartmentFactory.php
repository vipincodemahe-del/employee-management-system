<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Department>
 */
class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Human Resources',
            'Finance',
            'Information Technology',
            'Marketing',
            'Operations',
            'Sales',
        ]);

        return [
            'name' => $name,
            'code' => strtoupper(fake()->unique()->bothify('DEP-##')),
            'description' => fake()->sentence(10),
        ];
    }
}
