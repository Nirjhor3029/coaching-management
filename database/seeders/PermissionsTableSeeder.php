<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'student_information_access',
            ],
            [
                'id'    => 20,
                'title' => 'class_information_access',
            ],
            [
                'id'    => 21,
                'title' => 'section_create',
            ],
            [
                'id'    => 22,
                'title' => 'section_edit',
            ],
            [
                'id'    => 23,
                'title' => 'section_show',
            ],
            [
                'id'    => 24,
                'title' => 'section_delete',
            ],
            [
                'id'    => 25,
                'title' => 'section_access',
            ],
            [
                'id'    => 26,
                'title' => 'shift_create',
            ],
            [
                'id'    => 27,
                'title' => 'shift_edit',
            ],
            [
                'id'    => 28,
                'title' => 'shift_show',
            ],
            [
                'id'    => 29,
                'title' => 'shift_delete',
            ],
            [
                'id'    => 30,
                'title' => 'shift_access',
            ],
            [
                'id'    => 31,
                'title' => 'academic_class_create',
            ],
            [
                'id'    => 32,
                'title' => 'academic_class_edit',
            ],
            [
                'id'    => 33,
                'title' => 'academic_class_show',
            ],
            [
                'id'    => 34,
                'title' => 'academic_class_delete',
            ],
            [
                'id'    => 35,
                'title' => 'academic_class_access',
            ],
            [
                'id'    => 36,
                'title' => 'student_basic_info_create',
            ],
            [
                'id'    => 37,
                'title' => 'student_basic_info_edit',
            ],
            [
                'id'    => 38,
                'title' => 'student_basic_info_show',
            ],
            [
                'id'    => 39,
                'title' => 'student_basic_info_delete',
            ],
            [
                'id'    => 40,
                'title' => 'student_basic_info_access',
            ],
            [
                'id'    => 41,
                'title' => 'student_details_information_create',
            ],
            [
                'id'    => 42,
                'title' => 'student_details_information_edit',
            ],
            [
                'id'    => 43,
                'title' => 'student_details_information_show',
            ],
            [
                'id'    => 44,
                'title' => 'student_details_information_delete',
            ],
            [
                'id'    => 45,
                'title' => 'student_details_information_access',
            ],
            [
                'id'    => 46,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 47,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 48,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 49,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 50,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 51,
                'title' => 'category_access',
            ],
            [
                'id'    => 52,
                'title' => 'earning_category_create',
            ],
            [
                'id'    => 53,
                'title' => 'earning_category_edit',
            ],
            [
                'id'    => 54,
                'title' => 'earning_category_show',
            ],
            [
                'id'    => 55,
                'title' => 'earning_category_delete',
            ],
            [
                'id'    => 56,
                'title' => 'earning_category_access',
            ],
            [
                'id'    => 57,
                'title' => 'expense_create',
            ],
            [
                'id'    => 58,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 59,
                'title' => 'expense_show',
            ],
            [
                'id'    => 60,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 61,
                'title' => 'expense_access',
            ],
            [
                'id'    => 62,
                'title' => 'teacher_create',
            ],
            [
                'id'    => 63,
                'title' => 'teacher_edit',
            ],
            [
                'id'    => 64,
                'title' => 'teacher_show',
            ],
            [
                'id'    => 65,
                'title' => 'teacher_delete',
            ],
            [
                'id'    => 66,
                'title' => 'teacher_access',
            ],
            [
                'id'    => 67,
                'title' => 'subject_create',
            ],
            [
                'id'    => 68,
                'title' => 'subject_edit',
            ],
            [
                'id'    => 69,
                'title' => 'subject_show',
            ],
            [
                'id'    => 70,
                'title' => 'subject_delete',
            ],
            [
                'id'    => 71,
                'title' => 'subject_access',
            ],
            [
                'id'    => 72,
                'title' => 'teachers_payment_create',
            ],
            [
                'id'    => 73,
                'title' => 'teachers_payment_edit',
            ],
            [
                'id'    => 74,
                'title' => 'teachers_payment_show',
            ],
            [
                'id'    => 75,
                'title' => 'teachers_payment_delete',
            ],
            [
                'id'    => 76,
                'title' => 'teachers_payment_access',
            ],
            [
                'id'    => 77,
                'title' => 'earning_create',
            ],
            [
                'id'    => 78,
                'title' => 'earning_edit',
            ],
            [
                'id'    => 79,
                'title' => 'earning_show',
            ],
            [
                'id'    => 80,
                'title' => 'earning_delete',
            ],
            [
                'id'    => 81,
                'title' => 'earning_access',
            ],
            [
                'id'    => 82,
                'title' => 'teacher_sudent_access',
            ],
            [
                'id'    => 83,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
