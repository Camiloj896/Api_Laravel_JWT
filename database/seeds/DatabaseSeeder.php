<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(ManagerSeeder::class);
        $this->call(PaisComisionSeeder::class);
        $this->call(MetodologiaSeeder::class);        
        $this->call(SolucionSeeder::class);
        $this->call(PlataformaSeeder::class);
        $this->call(EstatusSeeder::class);        
        $this->call(TipoRecoleccionSeeder::class); 
        $this->call(FrecuenciaSeeder::class); 
        $this->call(PaisCampoSeeder::class);
        $this->call(TypeIncidenceScript::class);
        $this->call(CausalIncidenceScript::class);        
                
    }
}
