<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Module;

class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $admins = [
            [
                'name'      =>  'Urvish',
                'email'     =>  'urvish@ib3.co.uk',
                'password'  =>  Hash::make('Longcat642'),
                'role'      =>  'administrator',
                'status'    =>  1,
            ],
        ];

        foreach ($admins as $index => $admin)
        {

            $result = Admin::create($admin);
            
            if($result) {
                $result->modules()->sync([1,2,3,4,5,6,7,8,9,10]);
            }

            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($admins). ' records');
    }
}
