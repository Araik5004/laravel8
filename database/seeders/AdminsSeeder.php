<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Araik',
            'surname' => 'Minasov',
            'email' => 'admin@gmail.com',
            'password' => sha1( 'admin' ), // password sha1 => bcrypt
            '_token' => Str::random( 10 ),
        ];

        \DB::table( 'admins' )->insert( $data );
    }

}
