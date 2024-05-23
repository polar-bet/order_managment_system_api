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
        Role::create(['name' => RoleEnum::ADMIN->label()]);
        Role::create(['name' => RoleEnum::TRADER->label()]);
        Role::create(['name' => RoleEnum::USER->label()]);
    }
}
