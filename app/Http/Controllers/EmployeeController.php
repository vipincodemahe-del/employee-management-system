<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $employees = Employee::query()
            ->with('department')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhereHas('department', function ($department) use ($search) {
                            $department->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('employees.index', compact('employees', 'search'));
    }

    public function create(): View
    {
        return view('employees.create', [
            'employee' => new Employee(),
            'departments' => Department::orderBy('name')->get(),
        ]);
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['profile_photo'] = $this->storePhoto($request);

        Employee::create($data);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee registered successfully.');
    }

    public function show(Employee $employee): View
    {
        $employee->load('department');

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        return view('employees.edit', [
            'employee' => $employee,
            'departments' => Department::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('profile_photo')) {
            $this->deletePhoto($employee->profile_photo);
            $data['profile_photo'] = $this->storePhoto($request);
        }

        $employee->update($data);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $this->deletePhoto($employee->profile_photo);
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }

    private function storePhoto(Request $request): ?string
    {
        if (! $request->hasFile('profile_photo')) {
            return null;
        }

        return $request->file('profile_photo')->store('employees', 'public');
    }

    private function deletePhoto(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
