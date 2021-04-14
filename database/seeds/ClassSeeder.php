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
            'age' => '0 - 1 Years',
            'school_id' => '1',
            'syllabus_id' => '16',
            'description' => 'Early year school'
        ]);
        Classes::create([
            'name' => 'Nursery 1',
            'slug' => Str::lower(Str::slug('Nursery 1')),
            'age' => '1 - 2 Years',
            'school_id' => '1',
            'syllabus_id' => '13',
            'description' => 'Nursery One'
        ]);
        Classes::create([
            'name' => 'Nursery 2',
            'slug' => Str::lower(Str::slug('Nursery 2')),
            'age' => '2 - 3 Years',
            'school_id' => '1',
            'syllabus_id' => '14',
            'description' => 'Nursery Two'
        ]);
        Classes::create([
            'name' => 'Nursery 3',
            'slug' => Str::lower(Str::slug('Nursery 3')),
            'age' => '3 - 4 Years',
            'school_id' => '1',
            'syllabus_id' => '15',
            'description' => 'Nursery Three'
        ]);
        Classes::create([
            'name' => 'JSS 1',
            'slug' => Str::lower(Str::slug('JSS 1')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '1',
            'description' => 'Junior Secondary School One'
        ]);
        Classes::create([
            'name' => 'JSS 2',
            'slug' => Str::lower(Str::slug('JSS 2')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '2',
            'description' => 'Junior Secondary School Two'
        ]);
        Classes::create([
            'name' => 'JSS 3',
            'slug' => Str::lower(Str::slug('JSS 3')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '3',
            'description' => 'Junior Secondary School Three'
        ]);
        Classes::create([
            'name' => 'SS 1',
            'slug' => Str::lower(Str::slug('SS 1')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '4',
            'description' => 'Senior Secondary School One'
        ]);
        Classes::create([
            'name' => 'SS 2',
            'slug' => Str::lower(Str::slug('SS 2')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '5',
            'description' => 'Senior Secondary School Two'
        ]);
        Classes::create([
            'name' => 'SS 3',
            'slug' => Str::lower(Str::slug('SS 3')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '6',
            'description' => 'Senior Secondary School Three'
        ]);
        Classes::create([
            'name' => 'Primary 1',
            'slug' => Str::lower(Str::slug('Primary 1')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '7',
            'description' => 'Primary School'
        ]);
        Classes::create([
            'name' => 'Primary 2',
            'slug' => Str::lower(Str::slug('Primary 2')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '8',
            'description' => 'Primary School'
        ]);
        Classes::create([
            'name' => 'Primary 3',
            'slug' => Str::lower(Str::slug('Primary 3')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '9',
            'description' => 'Primary School'
        ]);
        Classes::create([
            'name' => 'Primary 4',
            'slug' => Str::lower(Str::slug('Primary 4')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '10',
            'description' => 'Primary School'
        ]);
        Classes::create([
            'name' => 'Primary 5',
            'slug' => Str::lower(Str::slug('Primary 5')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '11',
            'description' => 'Primary School'
        ]);
        Classes::create([
            'name' => 'Primary 6',
            'slug' => Str::lower(Str::slug('Primary 6')),
            'age' => '9 - 14 Years',
            'school_id' => '1',
            'syllabus_id' => '12',
            'description' => 'Primary School'
        ]);
    }
}
