<?php

use App\BloodGroup;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodGroup::create([
            'name' => 'A+',
            'description' => '(A positive) if you have A and rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'A-',
            'description' => '(A negative) if you have A antigens but don\'t have rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'B-',
            'description' => '(B positive) if you have B and rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'B+',
            'description' => '(B negative) if you have B antigens but don\'t have rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'AB+',
            'description' => '(AB positive) if you have A, B and rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'AB-',
            'description' => '(AB negative) if you have A and B antigens but don\'t have rhesus antigens.'
        ]);

        BloodGroup::create([
            'name' => 'O+',
            'description' => ' (O positive) if you have neither A nor B antigens but you have rhesus antigens.'
        ]);
        BloodGroup::create([
            'name' => 'O-',
            'description' => '(O negative) if you don\'t have A, B or rhesus antigens.'
        ]);
    }
}
