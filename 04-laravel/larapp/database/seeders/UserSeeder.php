<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add a record with Eloquent ORM
        $user = new User;
        $user->document = 75000001;
        $user->fullname = "Jeremias Springfield";
        $user->photo    = "jeremias.png";
        $user->phone    = 3100000001;
        $user->email    = "jeremias@gmail.com";
        $user->password = bcrypt('admin');
        $user->role     = "Admin";
        $user->save();

        // Add a record with Array
        DB::table('users')->insert([
            'document' => 75000002,
            'fullname' => 'John Wick',
            'photo'    => '1709301260.png',
            'phone'    => 3100000002,
            'email'    => 'johnw@gmail.com',
            'password' => bcrypt('12345')
        ]);





    }
}
