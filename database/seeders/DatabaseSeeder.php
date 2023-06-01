<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('about')->insert([
            'fname' => "Juan",
            'lname' => "Gutierrez",
            'role' => "developer",
            'description' => "Full Stack Developer +3 years of experience. Especially interested in React, Node and Java Spring Boot",
            'email' => "jgutierrezoa2@gmail.com",
            'linkedin' => "https://www.linkedin.com/in/-juan-gutierrez/", 
            'image'=>'juan.png',           
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('about')->insert([
            'fname' => "Sourav",
            'lname' => "Choudhary",
            'role' => "developer",
            'description' => "IT Student at Humber College | Java | MERN Stack | HTML | CSS | JavaScript | SQL | Php | Laravel",
            'email' => "souravchoudhary1998@gmail.com",
            'linkedin' => "https://www.linkedin.com/in/sourav009",
            'image'=>'sourav.png',           
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('about')->insert([
            'fname' => "Rutvik",
            'lname' => "Joshi",
            'role' => "developer",
            'description' => "Passionate about quality kitchen and front-end development",
            'email' => "rutvik@gmail.com",
            'linkedin' => "",
            'image'=>'rutvik.png',           
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('about')->insert([
            'fname' => "Jordan",
            'lname' => "Chan",
            'role' => "developer",
            'description' => "Curious about Web Programming and SQL databases",
            'email' => "jordan.14chan@gmail.com",
            'image'=>'jordan.png',           
            'linkedin' => "https://www.linkedin.com/in/jordan-chan49/",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $this->call(UserSeeder::class);
    }
}
