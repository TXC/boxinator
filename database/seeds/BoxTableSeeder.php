<?php

use Illuminate\Database\Seeder;

class BoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Box::class, 20)->create()->each(function ($box) {
            $box->save();
        });
    }
}
