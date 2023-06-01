<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Admin',
            'lname' => 'Pets',
            'email' => 'admin@gmail.com',
            'is_admin' => '1',
            'password' => Hash::make('password@1998'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Sourav',
            'lname' => 'Choudhary',
            'email' => 'sourav@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Sourav@1998'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'fname' => 'Adolph',
            'lname' => 'Brock',
            'email' => 'adolph@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Adolph@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Hunter',
            'lname' => 'Banks',
            'email' => 'hunter@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Hunter@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Peter',
            'lname' => 'Parker',
            'email' => 'peter@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Peter@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Colton',
            'lname' => 'Chung',
            'email' => 'colton@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Colton@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Susie',
            'lname' => 'Barajas',
            'email' => 'susie@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Susie@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Matilda',
            'lname' => 'Garcia',
            'email' => 'maltida@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Maltida@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Tony',
            'lname' => 'Stark',
            'email' => 'tony@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Tony@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'John',
            'lname' => 'Brook',
            'email' => 'john@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('John@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Tania',
            'lname' => 'Pearson',
            'email' => 'tania@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Tania@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Hank',
            'lname' => 'Snow',
            'email' => 'hank@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Hank@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Andrew',
            'lname' => 'Swanson',
            'email' => 'andrew@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Andrew@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Chasity',
            'lname' => 'York',
            'email' => 'chasity@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Chasity@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Tyron',
            'lname' => 'Kelley',
            'email' => 'tyron@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Tyron@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Nickolas',
            'lname' => 'Park',
            'email' => 'nickolas@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Nickolas@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Foster',
            'lname' => 'Griffin',
            'email' => 'foster@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Adolph@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Hal',
            'lname' => 'Woods',
            'email' => 'hal@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Hal@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Kent',
            'lname' => 'Frost',
            'email' => 'kent@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Kent@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'fname' => 'Joanna',
            'lname' => 'King',
            'email' => 'joanna@gmail.com',
            'is_admin' => '0',
            'password' => Hash::make('Joanna@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Admin
        DB::table('users')->insert([
            'fname' => 'David',
            'lname' => 'Miller',
            'email' => 'david@gmail.com',
            'is_admin' => '1',
            'password' => Hash::make('David@1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
