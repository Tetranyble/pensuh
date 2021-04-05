<?php

use App\Classes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::create([
            'name' => 'Creche',
            'slug' => Str::lower(Str::slug('Creche')),
            'age' => '0 - 1',
            'school_id' => '1',
            'description' => 'Early year school'
        ]);
        Classes::create([
            'name' => 'Nursery 1',
            'slug' => Str::lower(Str::slug('Nursery 1')),
            'age' => '1 - 2',
            'school_id' => '1',
            'description' => 'Nursery One'
        ]);
        Classes::create([
            'name' => 'Nursery 2',
            'slug' => Str::lower(Str::slug('Nursery 2')),
            'age' => '2 - 3',
            'school_id' => '1',
            'description' => 'Nursery Two'
        ]);
        Classes::create([
            'name' => 'Nursery 3',
            'slug' => Str::lower(Str::slug('Nursery 3')),
            'age' => '3 - 4',
            'school_id' => '1',
            'description' => 'Nursery Three'
        ]);
        Classes::create([
            'name' => 'JSS 1',
            'slug' => Str::lower(Str::slug('JSS 1')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Junior Secondary School One'
        ]);
        Classes::create([
            'name' => 'JSS 2',
            'slug' => Str::lower(Str::slug('JSS 2')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Junior Secondary School Two'
        ]);
        Classes::create([
            'name' => 'JSS 3',
            'slug' => Str::lower(Str::slug('JSS 3')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Junior Secondary School Three'
        ]);
        Classes::create([
            'name' => 'SS 1',
            'slug' => Str::lower(Str::slug('SS 1')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Senior Secondary School One'
        ]);
        Classes::create([
            'name' => 'SS 2',
            'slug' => Str::lower(Str::slug('SS 2')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Senior Secondary School Two'
        ]);
        Classes::create([
            'name' => 'SS 3',
            'slug' => Str::lower(Str::slug('SS 3')),
            'age' => '9 - 14',
            'school_id' => '1',
            'description' => 'Senior Secondary School Three'
        ]);
    }
}
