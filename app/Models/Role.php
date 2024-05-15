<?php

namespace App\Models;

use App\Enums\RoleEnum;
use App\Enums\RoleName;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => RoleEnum::class
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
