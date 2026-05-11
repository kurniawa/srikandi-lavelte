<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['slug' => 'antam', 'name' => 'Antam', 'alias' => null, 'manufacturer' => 'PT. Aneka Tambang Tbk.', 'country' => 'Indonesia', 'description' => 'Antam is a leading Indonesian mining company specializing in gold, silver, and other precious metals.', 'logo' => 'antam_logo.png'],
            ['slug' => 'king-halim', 'name' => 'King Halim', 'alias' => null, 'manufacturer' => 'PT. King Halim', 'country' => 'Indonesia', 'description' => 'From its commencement in 1981, PT. King Halim has grown over the years to become one of the leading gold jewelry manufacturers in Indonesia.', 'logo' => 'king_halim_logo.png'],
            ['slug' => 'lotus-archi', 'name' => 'Lotus Archi', 'alias' => 'LA', 'manufacturer' => 'PT. Elang Mulia Abadi Sempurna', 'country' => 'Indonesia', 'description' => 'PT Archi Indonesia (Archi) is an Indonesian based pure gold mining company, with a focus on gold in Indonesia', 'logo' => 'lotus_archi_logo.png'],
            ['slug' => 'ubs', 'name' => 'UBS', 'alias' => null, 'manufacturer' => 'PT. Untung Bersama Sejahtera', 'country' => 'Indonesia', 'description' => 'PT. Untung Bersama Sejahtera atau yang lebih dikenal dengan UBS Gold, merupakan perusahaan yang bergerak di bidang produksi perhiasan emas dan logam mulia.', 'logo' => 'ubs_logo.png'],
        ];

        $motives = [
            ['slug' => 'classic', 'name' => 'Classic', 'edition' => null, 'year' => null, 'description' => null],
            ['slug' => 'crown', 'name' => 'Crown', 'edition' => null, 'year' => null, 'description' => null],

            ['slug' => 'chinese-zodiac-goat-2015', 'name' => 'Chinese Zodiac (Goat)', 'edition' => 'Chinese Zodiac', 'year' => 2015, 'description' => null],
            ['slug' => 'chinese-zodiac-monkey-2016', 'name' => 'Chinese Zodiac (Monkey)', 'edition' => 'Chinese Zodiac', 'year' => 2016, 'description' => null],
            ['slug' => 'chinese-zodiac-rooster-2017', 'name' => 'Chinese Zodiac (Rooster)', 'edition' => 'Chinese Zodiac', 'year' => 2017, 'description' => null],
            ['slug' => 'chinese-zodiac-dog-2018', 'name' => 'Chinese Zodiac (Dog)', 'edition' => 'Chinese Zodiac', 'year' => 2018, 'description' => null],
            ['slug' => 'chinese-zodiac-pig-2019', 'name' => 'Chinese Zodiac (Pig)', 'edition' => 'Chinese Zodiac', 'year' => 2019, 'description' => null],
            ['slug' => 'chinese-zodiac-rat-2020', 'name' => 'Chinese Zodiac (Rat)', 'edition' => 'Chinese Zodiac', 'year' => 2020, 'description' => null],
            ['slug' => 'chinese-zodiac-ox-2021', 'name' => 'Chinese Zodiac (Ox)', 'edition' => 'Chinese Zodiac', 'year' => 2021, 'description' => null],
            ['slug' => 'chinese-zodiac-tiger-2022', 'name' => 'Chinese Zodiac (Tiger)', 'edition' => 'Chinese Zodiac', 'year' => 2022, 'description' => null],
            ['slug' => 'chinese-zodiac-rabbit-2023', 'name' => 'Chinese Zodiac (Rabbit)', 'edition' => 'Chinese Zodiac', 'year' => 2023, 'description' => null],
            ['slug' => 'chinese-zodiac-dragon-2024', 'name' => 'Chinese Zodiac (Dragon)', 'edition' => 'Chinese Zodiac', 'year' => 2024, 'description' => null],
            ['slug' => 'chinese-zodiac-snake-2025', 'name' => 'Chinese Zodiac (Snake)', 'edition' => null, 'year' => 2025, 'description' => null],
            ['slug' => 'chinese-zodiac-horse-2026', 'name' => 'Chinese Zodiac (Horse)', 'edition' => 'Chinese Zodiac', 'year' => 2026, 'description' => null],

            ['slug' => 'mosque-al-aqsa', 'name' => 'Masjid Al-Aqsa', 'edition' => null, 'year' => null, 'description' => null],
            ['slug' => 'mosque-nabawi', 'name' => 'Masjid Nabawi', 'edition' => null, 'year' => null, 'description' => null],
            ['slug' => 'ka-bah', 'name' => 'Ka\'bah', 'edition' => null, 'year' => null, 'description' => null],
        ];

        $brand_motives = [
            ['brand_slug' => 'antam', 'motive_slug' => 'classic'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'crown'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-goat-2015'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-monkey-2016'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-rooster-2017'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-dog-2018'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-pig-2019'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-rat-2020'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-ox-2021'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-tiger-2022'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-rabbit-2023'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-dragon-2024'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-snake-2025'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'chinese-zodiac-horse-2026'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'mosque-al-aqsa'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'mosque-nabawi'],
            ['brand_slug' => 'king-halim', 'motive_slug' => 'ka-bah'],

            ['brand_slug' => 'lotus-archi', 'motive_slug' => 'classic'],
            ['brand_slug' => 'ubs', 'motive_slug' => 'classic'],
        ];

        \Illuminate\Support\Facades\DB::table('brands')->insert($brands);
        \Illuminate\Support\Facades\DB::table('motives')->insert($motives);
        foreach ($brand_motives as $bm) {
            $brand = \Illuminate\Support\Facades\DB::table('brands')->where('slug', $bm['brand_slug'])->first();
            $motive = \Illuminate\Support\Facades\DB::table('motives')->where('slug', $bm['motive_slug'])->first();
            if ($brand && $motive) {
                \Illuminate\Support\Facades\DB::table('brand_motives')->insert([
                    'brand_id' => $brand->id,
                    'brand_slug' => $bm['brand_slug'],
                    'motive_id' => $motive->id,
                    'motive_slug' => $bm['motive_slug'],
                ]);
            }
        }
    }
}
