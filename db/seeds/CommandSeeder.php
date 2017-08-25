<?php
require_once './vendor/fzaninotto/faker/src/autoload.php';

use Phinx\Seed\AbstractSeed;

class CommandSeeder extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 500; $i++) {
            $comment['username'] = $faker->name('female');
            $comment['text'] = $faker->sentences(rand(1, 3), true);
            $comment['Add_date'] = $faker->dateTime()->format('Y-m-d H:i:s');
            $data[] = $comment;
        }
        $this->table('comments')->insert($data)->save();
    }
}