<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'name' => 'Araik',
            'surname' => 'Minasov',
            'email' => 'admin@gmail.com',
            'password' => sha1('admin'),
            '_token' => Str::random(10),
        ];

        DB::table('admins')->insert($data);
    }
}
