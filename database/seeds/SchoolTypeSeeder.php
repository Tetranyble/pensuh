<?php

use App\SchoolType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolType::create([
            'name' => 'Nursery School',
            'slug' => Str::lower(Str::slug('nursery school')),
            'description' => 'primary school section',
            'school_id' => '1'
        ]);
        SchoolType::create([
           'name' => 'Primary School',
           'slug' => Str::lower(Str::slug('primary school')),
           'description' => 'primary school section',
            'school_id' => '1'
        ]);
        SchoolType::create([
            'name' => 'Secondary School',
            'slug' => Str::lower(Str::slug('secondary school')),
            'description' => 'secondary school section',
            'school_id' => '1',
        ]);
        SchoolType::create([
            'name' => 'University',
            'slug' => Str::lower(Str::slug('university')),
            'description' => 'higher institution',
            'school_id' => '1',
        ]);
    }
}
