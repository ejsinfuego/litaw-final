<?php

namespace Database\Seeders;

use App\Http\Controllers\PermissionController;
use App\Models\User;
use App\Models\Moderator;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $moderator = User::create([
            'first_name' => 'Content',
            'last_name' => 'Moderator',
            'email' => 'moderator@mail.com',
            'college_id' => '1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,]);
        
        $moderator->assignRole('contentModerator');
    
        
    }

    
}
