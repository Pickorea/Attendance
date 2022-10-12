<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			['created_by'=>1,'department'=>'Training', 'department_description'=>'Training', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Account', 'department_description'=>'Account', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Registry', 'department_description'=>'Registry', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Statistics', 'department_description'=>'Statistics', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Aquaculture', 'department_description'=>'Hatchery', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Machanical Work Shop', 'department_description'=>'Machanical Work Shop', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Research', 'department_description'=>'Research', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Sustainable', 'department_description'=>'Sustainable', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'CBFM', 'department_description'=>'CBFM', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Extenstion', 'department_description'=>'Extenstion', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'department'=>'Enforcement', 'department_description'=>'Enforcement', 'publication_status'=>1,'deletion_status'=>0],
            ['created_by'=>1,'department'=>'Admin', 'department_description'=>'Admin', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'department'=>'Media', 'department_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'department'=>'PROP', 'department_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],

						

        ] ;
        foreach ($data as $obj)
        {
            Department::create($obj);
        }
    }
}
