<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdministradorPiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Administrador Master',
            'email' => 'Admin@Casita.com',
            'avatar' => 'avatar.png',
            'profesion' => 'Comerciante',
            'estado' => 'Activo',
            'tipousuario_id' => '1',
            'password' => Hash::make('Administrador'),
            'confirmpassword' => Hash::make('Administrador'),
            ]);
    }
}
