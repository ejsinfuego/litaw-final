<?php

namespace Database\Seeders;

use App\Http\Controllers\PermissionController;
use App\Models\User;
use App\Models\Moderator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $role = Role::where('name', 'contentModerator')->first();
        $role->givePermissionTo('moderate');

    }

   

    
}
