<?php
 
namespace Database\Seeders;
 
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        User::create([
            'name' => 'admin',
            'email' => 'admin@resepkos.com',
            'password' => Hash::make('123'),
            'role_id' => $adminRole->id,
        ]);
    }
}