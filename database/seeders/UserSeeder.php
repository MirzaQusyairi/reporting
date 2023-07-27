<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sekretariat',
            'email' => 'sekre@gmail.com',
            'password' => bcrypt('password'),
            'employee_id' => '5464564',
            'position' => 'PUSAT',
            'phone' => '08134567890',
            'address' => 'Jl. Jalan No. 1',
            'status' => 1,
            'role' => 'administrator'
        ]);
        User::create([
            'name' => 'anggota',
            'email' => 'anggota@gmail.com',
            'password' => bcrypt('password'),
            'employee_id' => '4564564',
            'position' => 'ESELON I',
            'phone' => '08134567890',
            'address' => 'Jl. Jalan No. 1',
            'status' => 1,
            'role' => 'user'
        ]);
    }
}
