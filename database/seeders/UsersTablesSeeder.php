<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        [
    'name' => 'User12',
    'email' => 'user12@gmail.com',
    'Password' => Hash::make('a1234567a'),
    'Role' => 0,
]);
    }
}
