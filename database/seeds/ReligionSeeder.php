<?php

use App\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Religion::create(['name' => 'African religion']);
        Religion::create(['name' => 'Anatolian religion']);
        Religion::create(['name' => 'ancient Iranian religion']);
        Religion::create(['name' => 'Arabian religion']);
        Religion::create(['name' => 'Baltic religion']);
        Religion::create(['name' => 'Buddhism']);
        Religion::create(['name' => 'Calvinism']);
        Religion::create(['name' => 'Celtic religion']);
        Religion::create(['name' => 'Christianity']);
        Religion::create(['name' => 'Confucianism']);
        Religion::create(['name' => 'Daoism']);
        Religion::create(['name' => 'Eastern Orthodoxy']);
        Religion::create(['name' => 'Egyptian religion']);
        Religion::create(['name' => 'Finno-Ugric religion']);
        Religion::create(['name' => 'Germanic religion']);
        Religion::create(['name' => 'mythology']);
        Religion::create(['name' => 'Greek religion']);
        Religion::create(['name' => 'Hellenistic religion']);
        Religion::create(['name' => 'Hinduism']);
        Religion::create(['name' => 'Islam']);
        Religion::create(['name' => 'Jainism']);
        Religion::create(['name' => 'Judaism']);
        Religion::create(['name' => 'Mesopotamian religion']);
        Religion::create(['name' => 'Middle Eastern religion']);
        Religion::create(['name' => 'Mormon']);
        Religion::create(['name' => 'mystery religion']);
        Religion::create(['name' => 'Native American religions']);
        Religion::create(['name' => 'Neo-Paganism']);
        Religion::create(['name' => 'new religious movement']);
        Religion::create(['name' => 'Old Catholic church']);
        Religion::create(['name' => 'Orphic religion']);
        Religion::create(['name' => 'prehistoric religion']);
        Religion::create(['name' => 'Protestantism']);
        Religion::create(['name' => 'Protestant Heritage']);
        Religion::create(['name' => 'Roman Catholicism']);
        Religion::create(['name' => 'Roman religion']);
        Religion::create(['name' => 'Shintō']);
        Religion::create(['name' => 'Sikhism']);
        Religion::create(['name' => 'Slavic religion']);
        Religion::create(['name' => 'Syrian']);
        Religion::create(['name' => 'Palestinian religion']);
        Religion::create(['name' => 'Vedic religion']);
        Religion::create(['name' => 'Wicca']);
        Religion::create(['name' => 'Zoroastrianism']);
    }
}
