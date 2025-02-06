<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Classify;
use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            SubscriptionTypeSeeder::class,
        ]);

        // إنشاء مستخدم مدير
        $admin = User::factory()->create([
            'name' => 'admin',
            'full_name' => 'الدوق فليد',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
        $admin->assignRole('admin');

        Category::factory(3)
            ->has(
                Classify::factory(2)
                    ->has(Question::factory(5))
            )
            ->create();
    }
}
