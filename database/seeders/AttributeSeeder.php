<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['parent_id' => null, 'parent_slug' => null, 'name' => 'Metal Type', 'nama' => 'Tipe Logam', 'slug' => 'metal-type', 'data_type' => 'select', 'description' => null], // gold, silver, platinum, etc.
            ['parent_id' => null, 'parent_slug' => null, 'name' => 'Gold Color', 'nama' => 'Warna Emas', 'slug' => 'gold-color', 'data_type' => 'select', 'description' => null], // yellow, white, rose, chrome, etc.
            ['parent_id' => null, 'parent_slug' => null, 'name' => 'Tray', 'nama' => 'Tray', 'slug' => 'tray', 'data_type' => 'string', 'description' => null],
            ['parent_id' => null, 'parent_slug' => null, 'name' => 'Condition', 'nama' => 'Kondisi', 'slug' => 'condition', 'data_type' => 'number', 'description' => null], // 9:mulus, 8:cacat tidak terlihat, 7:cacat terlihat, 6:jelas ada cacat, 5:rusak
            // Metal Type
            ['parent_id' => 1, 'parent_slug' => 'metal-type', 'name' => 'Gold', 'nama' => 'Emas', 'slug' => 'gold', 'data_type' => null, 'description' => null],
            ['parent_id' => 1, 'parent_slug' => 'metal-type', 'name' => 'Silver', 'nama' => 'Perak', 'slug' => 'silver', 'data_type' => null, 'description' => null],
            // Gold Color
            ['parent_id' => 2, 'parent_slug' => 'gold-color', 'name' => 'Yellow', 'nama' => 'Kuning', 'slug' => 'yellow', 'data_type' => null, 'description' => null],
            ['parent_id' => 2, 'parent_slug' => 'gold-color', 'name' => 'White', 'nama' => 'Putih', 'slug' => 'white', 'data_type' => null, 'description' => null],
            ['parent_id' => 2, 'parent_slug' => 'gold-color', 'name' => 'Rose', 'nama' => 'Mawar', 'slug' => 'rose', 'data_type' => null, 'description' => null],
            ['parent_id' => 2, 'parent_slug' => 'gold-color', 'name' => 'Chrome', 'nama' => 'Krom', 'slug' => 'chrome', 'data_type' => null, 'description' => null],
            // Tray
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.375', 'nama' => null, 'slug' => 'g-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.700', 'nama' => null, 'slug' => 'g-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.750', 'nama' => null, 'slug' => 'g-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.1K', 'nama' => null, 'slug' => 'g-1k', 'data_type' => null, 'description' => null],

            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.AT.375', 'nama' => null, 'slug' => 'g-at-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.AT.700', 'nama' => null, 'slug' => 'g-at-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.AT.750', 'nama' => null, 'slug' => 'g-at-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.AT.1K', 'nama' => null, 'slug' => 'g-at-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GW.375', 'nama' => null, 'slug' => 'g-gw-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GW.700', 'nama' => null, 'slug' => 'g-gw-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GW.750', 'nama' => null, 'slug' => 'g-gw-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GW.1K', 'nama' => null, 'slug' => 'g-gw-1k', 'data_type' => null, 'description'=> null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.CC.375', 'nama' => null, 'slug' => 'g-cc-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.CC.700', 'nama' => null, 'slug' => 'g-cc-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.CC.750', 'nama' => null, 'slug' => 'g-cc-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.CC.1K', 'nama' => null, 'slug' => 'g-cc-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.KL.375', 'nama' => null, 'slug' => 'g-kl-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.KL.700', 'nama' => null, 'slug' => 'g-kl-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.KL.1K', 'nama' => null, 'slug' => 'g-kl-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLT.375', 'nama' => null, 'slug' => 'g-glt-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLT.700', 'nama' => null, 'slug' => 'g-glt-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLT.750', 'nama' => null, 'slug' => 'g-glt-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLT.1K', 'nama' => null, 'slug' => 'g-glt-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLK.375', 'nama' => null, 'slug' => 'g-glk-375', 'data_type' => null, 'description'=> null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLK.700', 'nama' => null, 'slug' => 'g-glk-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLK.750', 'nama' => null, 'slug' => 'g-glk-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.GLK.1K', 'nama' => null, 'slug' => 'g-glk-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.Lio.375', 'nama' => null, 'slug' => 'g-lio-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.Lio.700', 'nama' => null, 'slug' => 'g-lio-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.Lio.750', 'nama' => null, 'slug' => 'g-lio-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'G.Lio.1K', 'nama' => null, 'slug' => 'g-lio-1k', 'data_type' => null, 'description' => null],

            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.375', 'nama' => null, 'slug' => 's-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.700', 'nama' => null, 'slug' => 's-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.750', 'nama' => null, 'slug' => 's-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.1K', 'nama' => null, 'slug' => 's-1k', 'data_type' => null, 'description' => null],

            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.AT.375', 'nama' => null, 'slug' => 's-at-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.AT.700', 'nama' => null, 'slug' => 's-at-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.AT.750', 'nama' => null, 'slug' => 's-at-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.AT.1K', 'nama' => null, 'slug' => 's-at-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GW.375', 'nama' => null, 'slug' => 's-gw-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GW.700', 'nama' => null, 'slug' => 's-gw-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GW.750', 'nama' => null, 'slug' => 's-gw-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GW.1K', 'nama' => null, 'slug' => 's-gw-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.CC.375', 'nama' => null, 'slug' => 's-cc-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.CC.700', 'nama' => null, 'slug' => 's-cc-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.CC.750', 'nama' => null, 'slug' => 's-cc-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.CC.1K', 'nama' => null, 'slug' => 's-cc-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.KL.375', 'nama' => null, 'slug' => 's-kl-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.KL.700', 'nama' => null, 'slug' => 's-kl-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.KL.750', 'nama' => null, 'slug' => 's-kl-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.KL.1K', 'nama' => null, 'slug' => 's-kl-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLT.375', 'nama' => null, 'slug' => 's-glt-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLT.700', 'nama' => null, 'slug' => 's-glt-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLT.750', 'nama' => null, 'slug' => 's-glt-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLT.1K', 'nama' => null, 'slug' => 's-glt-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLK.375', 'nama' => null, 'slug' => 's-glk-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLK.700', 'nama' => null, 'slug' => 's-glk-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLK.750', 'nama' => null, 'slug' => 's-glk-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.GLK.1K', 'nama' => null, 'slug' => 's-glk-1k', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.Lio.375', 'nama' => null, 'slug' => 's-lio-375', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.Lio.700', 'nama' => null, 'slug' => 's-lio-700', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.Lio.750', 'nama' => null, 'slug' => 's-lio-750', 'data_type' => null, 'description' => null],
            ['parent_id' => 3, 'parent_slug' => 'tray', 'name' => 'S.Lio.1K', 'nama' => null, 'slug' => 's-lio-1k', 'data_type' => null, 'description' => null],
            // Condition
            ['parent_id' => 4, 'parent_slug' => 'condition', 'name' => '9', 'nama' => null, 'slug' => '9', 'data_type' => null, 'description' => 'Mulus'],
            ['parent_id' => 4, 'parent_slug' => 'condition', 'name' => '8', 'nama' => null, 'slug' => '8', 'data_type' => null, 'description' => 'Cacat Tidak Terlihat'],
            ['parent_id' => 4, 'parent_slug' => 'condition', 'name' => '7', 'nama' => null, 'slug' => '7', 'data_type' => null, 'description' => 'Cacat Terlihat'],
            ['parent_id' => 4, 'parent_slug' => 'condition', 'name' => '6', 'nama' => null, 'slug' => '6', 'data_type' => null, 'description' => 'Jelas Ada Cacat'],
            ['parent_id' => 4, 'parent_slug' => 'condition', 'name' => '5', 'nama' => null, 'slug' => '5', 'data_type' => null, 'description' => 'Rusak'],
        ];

        \Illuminate\Support\Facades\DB::table('attributes')->insert($attributes);
    }
}
