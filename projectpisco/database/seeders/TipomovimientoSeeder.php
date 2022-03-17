<?php

namespace Database\Seeders;
use App\Models\Tipo;

use Illuminate\Database\Seeder;

class TipomovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipomovimiento = new Tipo();
        $tipomovimiento->name = "Entrada";
        $tipomovimiento->slug = "Entrada";
        $tipomovimiento->save();

        $tipomovimiento = new Tipo();
        $tipomovimiento->name = "Salida";
        $tipomovimiento->slug = "Salida";
        $tipomovimiento->save();
    }
}
