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
    'name' => 'Newuser',
    'email' => 'newuser@gmail.com',
    'password' => Hash::make('11joli22'),
    'picture' => '',
    'Role' => 0,
]);
    }
}
