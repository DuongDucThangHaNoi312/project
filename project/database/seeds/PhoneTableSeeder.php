<?php

use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::create([
            'phone' => '1111111111',
            'user_id' => 1
        ]);
        Phone::create([
            'phone' => '2222222222',
            'user_id' => 2
        ]);
        Phone::create([
            'phone' => '3333333333',
            'user_id' => 3
        ]);
        Phone::create([
            'phone' => '44444444444',
            'user_id' => 4
        ]);
        Phone::create([
            'phone' => '5555555555',
            'user_id' => 5
        ]);


    }
}
