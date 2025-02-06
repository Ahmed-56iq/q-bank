<?php

namespace Database\Seeders;

use App\Models\SubscriptionType;
use Illuminate\Database\Seeder;

class SubscriptionTypeSeeder extends Seeder
{
    public function run()
    {
        SubscriptionType::create([
            'name' => 'باطنية',
            'price' => '10000',
            'expire_at' => '2025-08-01',
            'note' => 'هذا الاشتراك يشمل  اختصاص الباطنية',
        ]);

        SubscriptionType::create([
            'name' => 'جليد',
            'price' => '10000',
            'expire_at' => '2025-08-01',
            'note' => 'هذا الاشتراك يشمل  اختصاص الجليد',
        ]);

        SubscriptionType::create([
            'name' => 'اطفال',
            'price' => '10000',
            'expire_at' => '2025-08-01',
            'note' => 'هذا الاشتراك يشمل  اختصاص الاطفال',
        ]);

        SubscriptionType::create([
            'name' => 'نسائية',
            'price' => '10000',
            'expire_at' => '2025-08-01',
            'note' => 'هذا الاشتراك يشمل  اختصاص النساء',
        ]);

        SubscriptionType::create([
            'name' => 'كل الاختصاصات',
            'price' => '25000',
            'expire_at' => '2025-08-01',
            'note' => 'هذا الاشتراك يشمل  كل الاختصاصات',
        ]);

    }
}
