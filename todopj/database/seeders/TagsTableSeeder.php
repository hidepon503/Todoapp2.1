<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [

            'name' => '家事',
        ];
        $param = [
            
            'name' => '勉強',
        ];
        $param = [
            'name' => '運動',
        ];
        $param = [
            'name' => '食事',
        ];
        $param = [
            'name' => '移動',
        ];
        Tag::create($param);
    }
}
