<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kiwi = Product::where('name','キウイ')->first();
        $autumn = Season::where('name','秋')->first();
        $winter = Season::where('name','冬')->first();
        $kiwi->seasons()->attach([$autumn->id,$winter->id]);

        $strawberry = Product::where('name','ストロベリー')->first();
        $spring = Season::where('name','春')->first();
        $strawberry->seasons()->attach([$autumn->id,$winter->id]);

        $orange = Product::where('name','オレンジ')->first();
        $winter = Season::where('name','冬')->first();
        $orange->seasons()->attach([$autumn->id,$winter->id]);

        
    }
}
