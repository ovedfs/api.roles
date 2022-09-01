<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Oved Fiso',
            'email' => 'oved@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::factory()
            ->count(10)
            ->create()
            ->each(function($user, $index){
                $index % 3 === 0 ?
                    $user->assignRole('blogger') :
                    $user->assignRole('editor');
            });
    }
}
