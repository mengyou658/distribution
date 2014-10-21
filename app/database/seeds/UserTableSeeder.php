<?php

class UserTableSeeder extends Seeder {
    
    public function run() {
        DB::table('user')->delete();

        User::create([
            'email' => 'test@test.com',
            'name' => 'test',
            'password' => Hash::make('test'),
        ]);
    }

}