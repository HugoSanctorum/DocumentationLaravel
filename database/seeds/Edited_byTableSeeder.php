<?php

use Illuminate\Database\Seeder;
use App\EditedBy;

class Edited_byTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editedBy = factory(EditedBy::class, 10)->create();
    }
}
