<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        Role::create([
            'libelle'            => 'superadmin',
            'initials'           => '@sa',
            'overide_permission' => true,
        ]);

        Role::create([
            'libelle'  => 'admin',
            'initials' => '@a',
        ]);
    }

}