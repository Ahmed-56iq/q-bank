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
            'show-users',
            'add-user',
            'edit-user',
            'delete-user',

            // صلاحيات فئة
            'show-categories',
            'add-category',
            'edit-category',
            'delete-category',

            // صلاحيات التصنيفات
            'show-classifies',
            'add-classify',
            'edit-classify',
            'delete-classify',

            // صلاحيات الأسئلة
            'show-questions',
            'add-question',
            'edit-question',
            'delete-question',

            // صلاحيات الاشتراكات
            'show-subscriptions',
            'add-subscription',
            'edit-subscription',
            'delete-subscription',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // إنشاء الأدوار وإسناد الصلاحيات
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'supervisor']);
        $role->givePermissionTo([
            'show-users',
            'show-categories',
            'add-category',
            'edit-category',
            'show-questions',
            'add-question',
            'edit-question',
            'show-subscriptions',
            'add-subscription',
            'edit-subscription',
        ]);

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo([
            'show-categories',
            'show-questions',
        ]);
    }
}
