<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FactoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factories = [ 
        	[ 
        		'name' => 'Test Factory',
                'address' => 'Mirpur, Dhaka',
                'mobile_no' => '123456789',
                'responsible_person' => 'Mr Akash',
                'email' => 'mr@test.com',
                'group_id' => 1,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
        	]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('factories')->truncate();
        DB::table('factories')->insert($factories);

        $this->command->info('Successfully run factories table seeder');
    }
}
