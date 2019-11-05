<?php

use Illuminate\Database\Seeder;

class MetodologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metodologia')->insert([ 'Tipo' => 'AdExpress' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'AdExpress + BrandExpress' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Adhoc' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Adnow' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'BrandDynamics' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'BrandExpress' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Brand Pulse' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'BrandExpress + AdExpress' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Comms Track' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Concept Evaluate' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Connected Life' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Conjoint' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Conversion Model' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'CPT' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Custom Tracking' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Link For Packaging' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Link For Tv' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Link Launch Advisor' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Link Now' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Link Optimizer' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Omnibus' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Pack Test' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Power Purchase' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Tri*m' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Value Manager' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'Xmedia' ]);
        DB::table('metodologia')->insert([ 'Tipo' => 'YPF' ]);
    }
}
