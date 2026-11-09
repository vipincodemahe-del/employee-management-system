<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'profile_photo',
        'department_id',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    protected function age(): Attribute
    {
        return Attribute::get(function (): ?int {
            return $this->date_of_birth
                ? Carbon::parse($this->date_of_birth)->age
                : null;
        });
    }

    public function photoUrl(): ?string
    {
        if (! $this->profile_photo) {
            return null;
        }

        return asset('storage/'.$this->profile_photo);
    }
}
