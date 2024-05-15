<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Enums\RoleName;
use App\Enums\UserRole;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => RoleEnum::ADMIN->value]);
        Role::create(['name' => RoleEnum::TRADER->value]);
        Role::create(['name' => RoleEnum::USER->value]);
    }
}
