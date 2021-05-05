<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'school_id' => '1',
            'name' => 'Blue House',
            'description' => 'blue inter-house sport house'
        ]);
        Group::create([
            'school_id' => '1',
            'name' => 'Purple House',
            'description' => 'purple inter-house sport house'
        ]);
        Group::create([
            'school_id' => '1',
            'name' => 'Green House',
            'description' => 'green inter-house sport house'
        ]);
        Group::create([
            'school_id' => '1',
            'name' => 'JETS Club',
            'description' => 'JETS club is an acronym for "Junior Engineers, Technicians and Scientist". The JETS club is a science body that helps in inculcating better understanding of sciences into its members.'
        ]);
        Group::create([
            'school_id' => '1',
            'name' => 'Scripture Union',
            'description' => 'Scripture Union is an international, inter-denominational, evangelical Christian organization. It was founded in 1867... '
        ]);
    }
}
