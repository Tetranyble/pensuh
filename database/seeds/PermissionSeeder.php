<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'admission_status', 'slug' => 'admission_status']);

        Permission::create(['name' => 'create_student', 'slug' => 'create student']);
        Permission::create(['name' => 'edit_student', 'slug' => 'edit student']);
        Permission::create(['name' => 'delete_student', 'slug' => 'delete student']);
        Permission::create(['name' => 'update_student', 'slug' => 'update student']);
        Permission::create(['name' => 'show_student', 'slug' => 'show student']);
        Permission::create(['name' => 'view_student', 'slug' => 'show student']);
        Permission::create(['name' => 'admit_student', 'slug' => 'admit student']);


        Permission::create(['name' => 'take_student_attendance', 'slug' => 'take student attendance']);
        Permission::create(['name' => 'take_staff_attendance', 'slug' => 'take staff attendance']);

        Permission::create(['name' => 'view_student_attendance', 'slug' => 'view student attendance']);
        Permission::create(['name' => 'view_staff_attendance', 'slug' => 'view staff attendance']);

        Permission::create(['name' => 'child_safety_attendance', 'slug' => 'child safety attendance']);


        Permission::create(['name' => 'create_staff', 'slug' => 'create staff']);
        Permission::create(['name' => 'edit_staff', 'slug' => 'edit staff']);
        Permission::create(['name' => 'delete_staff', 'slug' => 'delete staff']);
        Permission::create(['name' => 'view_staff', 'slug' => 'view teacher']);
        Permission::create(['name' => 'update_staff', 'slug' => 'update teacher']);

        Permission::create(['name' => 'create_result', 'slug' => 'create result']);
        Permission::create(['name' => 'view_result', 'slug' => 'view result']);
        Permission::create(['name' => 'edit_result', 'slug' => 'edit result']);
        Permission::create(['name' => 'delete_result', 'slug' => 'edit result']);
        Permission::create(['name' => 'update_result', 'slug' => 'update result']);

        Permission::create(['name' => 'view_book', 'slug' => 'view book']);
        Permission::create(['name' => 'create_book', 'slug' => 'create book']);
        Permission::create(['name' => 'edit_book', 'slug' => 'edit book']);
        Permission::create(['name' => 'delete_book', 'slug' => 'delete book']);
        Permission::create(['name' => 'update_book', 'slug' => 'update book']);

        Permission::create(['name' => 'update_account', 'slug' => 'update account']);
        Permission::create(['name' => 'view_account', 'slug' => 'view account']);
        Permission::create(['name' => 'create_account', 'slug' => 'create account']);
        Permission::create(['name' => 'edit_account', 'slug' => 'edit account']);
        Permission::create(['name' => 'delete_account', 'slug' => 'delete account']);

        Permission::create(['name' => 'master', 'slug' => 'master']);



    }
}
