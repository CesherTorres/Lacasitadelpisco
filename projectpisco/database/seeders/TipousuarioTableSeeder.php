<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipousuario;

class TipousuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipousuario = new Tipousuario();
        $tipousuario->name = "Administrador General";
        $tipousuario->save();
    }
}
