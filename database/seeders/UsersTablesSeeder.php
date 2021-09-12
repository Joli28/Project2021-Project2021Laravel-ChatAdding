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
    'Password' => Hash::make('12joli34'),
    'Role' => 1,
]);
    }
}
