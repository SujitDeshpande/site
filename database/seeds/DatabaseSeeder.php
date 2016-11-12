<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->delete();

        DB::table('user_groups')->insert([
            'name' => "Admin"
            ]);

        DB::table('user_groups')->insert([
            'name' => "User"
            ]);

        DB::table('user_status')->delete();

        DB::table('user_status')->insert([
            'name' => "Active"
            ]);

        DB::table('user_status')->insert([
            'name' => "Inactive"
            ]);

        DB::table('user_status')->insert([
            'name' => "Awaiting Approval"
            ]);

        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => "Sujit Deshpande",
            'email' => "sujit.md@gmail.com",
            'password' => Hash::make('password'),
            'status' => '1',
            'group_id' => '1'
            ]);

        DB::table('users')->insert([
            'name' => "Sujit Deshpande",
            'email' => "sujit.deshpande@ness.com",
            'password' => Hash::make('password'),
            'status' => '1',
            'group_id' => '1'
            ]);
    }
}
