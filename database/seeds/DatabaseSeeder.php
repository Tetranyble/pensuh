<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NationalitySeeder::class);
        $this->call(BloodGroupSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SchoolTypeSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(EventSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(SchoolTypeSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(SyllabusSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(AttendanceTypeSeeder::class);
    }
}
