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
        Role::create(['name' => 'support', 'slug' => 'support'])
            ->givePermissionTo(['child_safety_attendance','view_student_attendance']);
        Role::create(['name' => 'student', 'slug' => 'student'])
            ->givePermissionTo(['view_result']);

        Role::create(['name' => 'teacher', 'slug' => 'teacher'])
            ->givePermissionTo(['view_staff', 'view_student', 'view_result', 'view_student_attendance']);

        Role::create(['name' => 'form teacher', 'slug' => 'form_teacher'])
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
        Role::create(['name' => 'public pelation officer', 'slug' => 'public_relation_officer'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'exam head', 'slug' => 'exam_head'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'guardian/counsellor', 'slug' => 'counsellor'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'sport', 'slug' => 'sport'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'vice principal admin', 'slug' => 'vice_principal_admin'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'vice principal academy', 'slug' => 'vice_principal_academy'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'director', 'slug' => 'director'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'proprietor', 'slug' => 'proprietor'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'prefect', 'slug' => 'prefect'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
        Role::create(['name' => 'dean of study', 'slug' => 'dean_of_study'])
            ->givePermissionTo(['view_student', 'view_account', 'create_account', 'edit_account', 'delete_account',
                'view_staff_attendance','view_student_attendance', 'view_result',
                'view_staff'
            ]);
    }
}
