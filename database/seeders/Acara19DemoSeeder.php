<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class Acara19DemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::find(1);

        if (! $user) {
            $this->command->warn('User dengan ID 1 tidak ditemukan. Jalankan /insert-data atau /users/create dulu.');

            return;
        }

        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->active = 1;
        $user->save();

        $user2 = User::find(2);

        if ($user2) {
            $user2->first_name = 'Jane';
            $user2->last_name = 'Doe';
            $user2->active = 1;
            $user2->save();
        }

        User::updateOrCreate(
            ['email' => 'andi@example.com'],
            [
                'name' => 'Andi',
                'password' => 'password123',
                'status' => 'inactive',
                'role' => 'user',
                'age' => 17,
                'points' => 10,
                'first_name' => 'Andi',
                'last_name' => 'Wijaya',
                'active' => 0,
            ]
        );

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            ['phone' => '081234567890', 'address' => 'Jl. Mastrip, Jember']
        );

        Post::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'Belajar Laravel'],
            ['body' => 'Catatan belajar Laravel']
        );

        Post::updateOrCreate(
            ['user_id' => $user->id, 'title' => 'Belajar Eloquent ORM'],
            ['body' => 'Catatan belajar Eloquent ORM']
        );

        $roleAdmin = Role::updateOrCreate(['name' => 'admin']);
        $roleEditor = Role::updateOrCreate(['name' => 'editor']);

        $user->roles()->sync([$roleAdmin->id, $roleEditor->id]);
    }
}
