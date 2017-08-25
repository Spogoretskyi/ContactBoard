<?php
require_once './vendor/fzaninotto/faker/src/autoload.php';

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $user['name'] = $faker->name();
            $user['password'] = $faker->password();
            $user['mail'] = $faker->email();
            $user['created_at'] = $faker->dateTime()->format('Y-m-d H:i:s');
            $user['updated_at'] = $faker->dateTime()->format('Y-m-d H:i:s');
            $data[] = $user;
        }
        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
