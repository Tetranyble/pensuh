<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // or may be done by chaining
        Role::create(['name' => 'user', 'slug' => 'user'])
            ->givePermissionTo(['admission_status']);
        Role::create(['name' => 'parent', 'slug' => 'parent'])
            ->givePermissionTo(['admission_status','child_safety_attendance','view_result','view_result','view_student_attendance']);

        Role::create(['name' => 'student', 'slug' => 'student'])
            ->givePermissionTo(['view_result']);

        Role::create(['name' => 'teacher', 'slug' => 'teacher'])
            ->givePermissionTo(['view_staff', 'view_student', 'view_result', 'view_student_attendance']);

        Role::create(['name' => 'form_teacher', 'slug' => 'form teacher'])
            ->givePermissionTo(['view_staff', 'view_student', 'view_student_attendance', 'child_safety_attendance', 'take_staff_attendance', 'take_student_attendance']);

        Role::create(['name' => 'librarian', 'slug' => 'librarian'])
            ->givePermissionTo(['view_book', 'create_book', 'delete_book', 'edit_book', 'view_result', 'view_staff_attendance']);

        Role::create(['name' => 'security', 'slug' => 'security'])
            ->givePermissionTo(['child_safety_attendance', 'view_staff_attendance']);

        Role::create(['name' => 'principal', 'slug' => 'principal'])
            ->givePermissionTo(['create_student', 'edit_student', 'view_result', 'delete_student','view_student','admit_student',
                'take_student_attendance','take_staff_attendance','view_staff_attendance','view_student_attendance',
                'create_staff','edit_staff','delete_staff','view_staff','update_staff', 'create_result','create_result','edit_result',
                'view_account', 'create_account', 'edit_account', 'delete_account', 'update_account'
            ]);

        Role::create(['name' => 'admin', 'slug' => 'admin'])
            ->givePermissionTo(['create_student', 'edit_student', 'view_result', 'delete_student','view_student','admit_student',
                'take_student_attendance','take_staff_attendance','view_staff_attendance','view_student_attendance',
                'create_staff','edit_staff','delete_staff','view_staff', 'update_staff','create_result','create_result','edit_result',
                'view_account', 'create_account', 'edit_account', 'delete_account', 'update_account'
            ]);

        Role::create(['name' => 'master', 'slug' => 'master'])
            ->givePermissionTo(['create_student', 'edit_student', 'view_result', 'delete_student','view_student','admit_student',
                'take_student_attendance','take_staff_attendance','view_staff_attendance','view_student_attendance',
                'create_staff','edit_staff','delete_staff','view_staff', 'update_staff','create_result','create_result','edit_result',
                'view_account', 'create_account', 'edit_account', 'delete_account', 'update_account', 'master'
            ]);

        Role::create(['name' => 'bursar', 'slug' => 'bursar'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);

    }
}
