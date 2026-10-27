<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample departments
        $dept1 = Department::create([
            'dept_name' => 'Management Information System',
            'manager_id' => 1,
            'location_id' => 101
        ]);

        $dept2 = Department::create([
            'dept_name' => 'Design',
            'manager_id' => 2,
            'location_id' => 102
        ]);

        // Create sample students
        Student::create([
            'student_name' => 'Kong Sopheak',
            'email' => 'kongsopheak@gmail.com',
            'gender' => 'Male',
            'enrollment_date' => '2022-01-01',
            'description' => 'Active student',
            'dept_id' => $dept1->dept_id
        ]);

        Student::create([
            'student_name' => 'Leng Makara',
            'email' => 'lengmakara@gmail.com',
            'gender' => 'Male',
            'enrollment_date' => '2024-11-01',
            'description' => 'New student',
            'dept_id' => $dept2->dept_id
        ]);
    }
}