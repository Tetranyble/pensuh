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
        Permission::create(['name' => 'create student']);
        Permission::create(['name' => 'edit student']);
        Permission::create(['name' => 'delete student']);

        Permission::create(['name' => 'view student']);
        Permission::create(['name' => 'admit student']);

        Permission::create(['name' => 'take student attendance']);
        Permission::create(['name' => 'take staff attendance']);
        Permission::create(['name' => 'view staff attendance']);
        Permission::create(['name' => 'view student attendance']);
        Permission::create(['name' => 'child safety attendance']);


        Permission::create(['name' => 'create staff']);
        Permission::create(['name' => 'edit staff']);
        Permission::create(['name' => 'delete staff']);
        Permission::create(['name' => 'view teacher']);

        Permission::create(['name' => 'create result']);
        Permission::create(['name' => 'create result']);
        Permission::create(['name' => 'edit result']);

        Permission::create(['name' => 'view book']);
        Permission::create(['name' => 'create book']);
        Permission::create(['name' => 'edit book']);
        Permission::create(['name' => 'delete book']);

        Permission::create(['name' => 'view account']);
        Permission::create(['name' => 'create account']);
        Permission::create(['name' => 'edit account']);
        Permission::create(['name' => 'delete account']);

        // or may be done by chaining
        $role = Role::create(['name' => 'teacher'])
            ->givePermissionTo(['view teacher', 'view student', 'view student attendance']);
        $role = Role::create(['name' => 'form teacher'])
            ->givePermissionTo(['view teacher', 'view student', 'view student attendance', 'child safety attendance', 'take staff attendance', 'take student attendance']);
        $role = Role::create(['name' => 'librarian'])
            ->givePermissionTo(['view book', 'create book', 'delete book', 'edit book', 'view staff attendance']);
        $role = Role::create(['name' => 'security'])
            ->givePermissionTo(['view book', 'create book', 'delete book', 'edit book', 'view staff attendance','child safety attendance', 'view staff attendance']);
        $role = Role::create(['name' => 'principal'])
            ->givePermissionTo(['create student', 'edit student', 'delete student','view student','admit student',
                'take student attendance','take staff attendance','view staff attendance','view student attendance',
                'create staff','edit staff','delete staff','view teacher','create result','create result','edit result',
                'view account', 'create account', 'edit account', 'delete account'
                ]);
        $role = Role::create(['name' => 'bursar'])
            ->givePermissionTo(['view student', 'view account', 'create account', 'edit account', 'delete account',
                'view staff attendance','view student attendance',
                'view teacher'
            ]);

    }
}
