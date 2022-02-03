<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'HTML'
        ];
        DB::table('items')->insert($param);
        $param = [
            'content' => 'CSS'
        ];
        DB::table('items')->insert($param);
        $param = [
            'content' => 'JavaScript'
        ];
        DB::table('items')->insert($param);
        $param = [
            'content' => 'PHP'
        ];
        DB::table('items')->insert($param);
    }
}
