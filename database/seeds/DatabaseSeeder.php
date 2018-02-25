<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Titular::class, 5)->create();
        factory(App\Models\Corretora::class, 5)->create();
        factory(App\Models\ClienteAgente::class, 20)->create();
        factory(App\Models\TipoSeguro::class, 250)->create();
        factory(App\Models\Indicacao::class, 100)->create();
    }
}
