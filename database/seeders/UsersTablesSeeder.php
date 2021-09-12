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
    'name' => 'Joli',
    'email' => 'joli@gmail.com',
    'password' => Hash::make('12joli34'),
    'image' => '',
    'Role' => 0,
]);
    }
}
