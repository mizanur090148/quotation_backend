<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [ 
        	[ 
        		'name' => 'Supper Admin',
                'slug' => 'super-admin',
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
        	], 
        	[ 
        		'name' => 'Admin',
                'slug' => 'admin',
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
        	],        	
        	[   
        		'name' => 'User',
                'slug' => 'user',
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
        	]
        ];

        DB::table('roles')->truncate();
        DB::table('roles')->insert($roles);

        $this->command->info('Successfully run roles table seeder');
    }
}
