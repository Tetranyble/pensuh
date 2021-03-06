<?php

use App\TeacherQualification;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Leonard',
            'lastname' => 'Ekenekiso',
            'email' => 'senenerst@gmail.com',
            'username' => 'leonard.ekenekiso',

            'school_id' => '1',
            'gender_id' => '1',
            'blood_group_id' => '1',
            'email_verified_at' => now(),
            'code' => time(),
            'password' => bcrypt('ugbanawaji1234'), // password
            'remember_token' => Str::random(10),
            'photo' => 'school-1/user.png',
            'address' => '31 ikwere road port harcourt'
        ])->assignRole('master');


        $teacher = User::create([
            'firstname' => 'Jennifer',
            'lastname' => 'Chukwuka',
            'email' => 'jennifer@gmail.com',
            'username' => 'jennifer.chukwuka',
            'school_id' => '1',
            'gender_id' => '1',
            'blood_group_id' => '1',
            'email_verified_at' => now(),
            'code' => time(),
            'password' => bcrypt('jennifer'), // password
            'remember_token' => Str::random(10),
            'photo' => 'school-1/user.png',
            'address' => '31 ikwere road port harcourt'
        ]);
        $teacher->assignRole('teacher');
        TeacherQualification::create([
            'user_id' => $teacher->id,
        ]);

        $teacher1 = User::create([
            'firstname' => 'Francisca',
            'lastname' => 'Ifeayi',
            'email' => 'ifeayi@gmail.com',
            'username' => 'francisca.ifeayi',
            'school_id' => '1',
            'gender_id' => '1',
            'blood_group_id' => '1',
            'email_verified_at' => now(),
            'code' => time(),
            'password' => bcrypt('francisca'), // password
            'remember_token' => Str::random(10),
            'address' => '31 ikwere road port harcourt',
            'photo' => 'school-1/user.png'
        ]);
        $teacher1->assignRole('teacher');
        TeacherQualification::create([
            'user_id' => $teacher1->id,
        ]);
        $teacher2 = User::create([
            'firstname' => 'Francisca',
            'lastname' => 'Ifeayi',
            'email' => 'obi@gmail.com',
            'username' => 'francisca.ifeayi',
            'school_id' => '1',
            'gender_id' => '1',
            'blood_group_id' => '1',
            'email_verified_at' => now(),
            'code' => time(),
            'password' => bcrypt('francisca'), // password
            'remember_token' => Str::random(10),
            'photo' => 'school-1/user.png',
            'address' => '31 ikwere road port harcourt'
        ]);
        $teacher2->assignRole('teacher');
        TeacherQualification::create([
            'user_id' => $teacher2->id,
        ]);
    }
}
