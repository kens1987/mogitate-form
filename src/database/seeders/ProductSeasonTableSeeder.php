<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Season;
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
        $kiwi->seasons()->syncWithoutDetaching([$autumn->id,$winter->id]);

        $strawberry = Product::where('name','ストロベリー')->first();
        $spring = Season::where('name','春')->first();
        $strawberry->seasons()->syncWithoutDetaching([$spring->id]);

        $orange = Product::where('name','オレンジ')->first();
        $winter = Season::where('name','冬')->first();
        $orange->seasons()->syncWithoutDetaching([$winter->id]);

        $watermelon = Product::where('name','スイカ')->first();
        $summer = Season::where('name','夏')->first();
        $watermelon->seasons()->syncWithoutDetaching([$summer->id]);

        $peach = Product::where('name','ピーチ')->first();
        $summer = Season::where('name','夏')->first();
        $peach->seasons()->syncWithoutDetaching([$summer->id]);

        $muscat = Product::where('name','シャインマスカット')->first();
        $summer = Season::where('name','夏')->first();
        $autumn = Season::where('name','秋')->first();
        $muscat->seasons()->syncWithoutDetaching([$summer->id,$autumn->id]);

        $pineapple = Product::where('name','パイナップル')->first();
        $spring = Season::where('name','春')->first();
        $summer = Season::where('name','夏')->first();
        $pineapple->seasons()->syncWithoutDetaching([$spring->id,$summer->id]);

        $grapes = Product::where('name','ブドウ')->first();
        $summer = Season::where('name','夏')->first();
        $autumn = Season::where('name','秋')->first();
        $grapes->seasons()->syncWithoutDetaching([$summer->id,$autumn->id]);

        $banana = Product::where('name','バナナ')->first();
        $summer = Season::where('name','夏')->first();
        $banana->seasons()->syncWithoutDetaching([$summer->id,]);

        $melon = Product::where('name','メロン')->first();
        $spring = Season::where('name','春')->first();
        $summer = Season::where('name','夏')->first();
        $melon->seasons()->syncWithoutDetaching([$spring->id,$summer->id]);
    }
}
