<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueryDemoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            ['name' => 'Budi Santoso', 'salary' => 8000000],
            ['name' => 'Siti Aminah', 'salary' => 12000000],
            ['name' => 'Andi Wijaya', 'salary' => 6500000],
        ]);

        $userIds = DB::table('users')->pluck('id');

        if ($userIds->isEmpty()) {
            return;
        }

        $orders = [];

        foreach ($userIds as $index => $userId) {
            $orders[] = [
                'user_id' => $userId,
                'total_price' => 150000 + ($index * 75000),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
