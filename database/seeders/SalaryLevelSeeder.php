<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SalaryLevel;

class SalaryLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    ['created_by'=>1,'salary_level'=>'L1-9', 'publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'salary_level'=>'L11-10', 'publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'salary_level'=>'L14-12', 'publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'salary_level'=>'L16-15', 'publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'salary_level'=>'L19-17', 'publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'salary_level'=>'Project','publication_status'=>1,'deletion_status'=>0],
                    

                    	
			

        ] ;
        foreach ($data as $obj)
        {
            SalaryLevel::create($obj);
        }
    }
}
