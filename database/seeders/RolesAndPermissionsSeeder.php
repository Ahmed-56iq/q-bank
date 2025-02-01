<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // إعادة تعيين ذاكرة التخزين المؤقت للأدوار والصلاحيات
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // إنشاء الصلاحيات
        $permissions = [
            // صلاحيات المستخدمين
            'عرض المستخدمين',
            'إضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            // صلاحيات التصنيفات
            'عرض التصنيفات',
            'إضافة تصنيف',
            'تعديل تصنيف',
            'حذف تصنيف',

            // صلاحيات الأسئلة
            'عرض الأسئلة',
            'إضافة سؤال',
            'تعديل سؤال',
            'حذف سؤال',

            // صلاحيات الاشتراكات
            'عرض الاشتراكات',
            'إضافة اشتراك',
            'تعديل اشتراك',
            'حذف اشتراك',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // إنشاء الأدوار وإسناد الصلاحيات
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'supervisor']);
        $role->givePermissionTo([
            'عرض المستخدمين',
            'عرض التصنيفات',
            'إضافة تصنيف',
            'تعديل تصنيف',
            'عرض الأسئلة',
            'إضافة سؤال',
            'تعديل سؤال',
            'عرض الاشتراكات',
        ]);

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo([
            'عرض التصنيفات',
            'عرض الأسئلة',
        ]);
    }
}
