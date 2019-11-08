<?php

use App\User;
use App\Enums\PackageType;
use App\Enums\UserType;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employer = factory(User::class)->create([
            'name' => 'GYE Organiser',
            'email' => 'organiser@grabyourevent.com',
            'type' => UserType::Organiser
        ]);
    }
}
