<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_view_employees(): void
    {
        $this->get(route('employees.index'))->assertRedirect(route('login'));
    }

    public function test_admin_can_list_and_create_employees(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);
        $department = Department::factory()->create([
            'name' => 'Quality Assurance',
            'code' => 'QA',
        ]);

        $this->actingAs($admin)
            ->get(route('employees.index'))
            ->assertOk()
            ->assertSee('Employees');

        $this->actingAs($admin)
            ->get(route('employees.create'))
            ->assertOk()
            ->assertSee('Employee Registration');

        $this->actingAs($admin)
            ->post(route('employees.store'), [
                'name' => 'Anita Sharma',
                'email' => 'anita@example.com',
                'phone' => '9876543210',
                'date_of_birth' => '1994-05-12',
                'gender' => 'female',
                'address' => 'Kochi, Kerala',
                'department_id' => $department->id,
            ])
            ->assertRedirect(route('employees.index'));

        $this->assertDatabaseHas('employees', [
            'email' => 'anita@example.com',
            'department_id' => $department->id,
        ]);

        $this->actingAs($admin)
            ->get(route('employees.index', ['search' => 'Anita']))
            ->assertOk()
            ->assertSee('Anita Sharma')
            ->assertSee('Quality Assurance');
    }

    public function test_employee_belongs_to_department(): void
    {
        $department = Department::factory()->create(['name' => 'Finance', 'code' => 'FIN2']);
        $employee = Employee::factory()->create(['department_id' => $department->id]);

        $this->assertTrue($employee->department->is($department));
        $this->assertTrue($department->employees->contains($employee));
    }
}
