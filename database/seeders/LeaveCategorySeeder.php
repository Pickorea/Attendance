<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveCategory;

class LeaveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			['created_by'=>1,'leave_category'=>'Annual Leave', 'leave_category_description'=>'Annual Leave ', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'leave_category'=>'Sick Leave', 'leave_category_description'=>'Sick Leave ', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'leave_category'=>'Compasonate Leave', 'leave_category_description'=>'Compasonate Leave', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'leave_category'=>'Maternity Leave', 'leave_category_description'=>'Maternity Leave', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'leave_category'=>'Personal Leave', 'leave_category_description'=>'Personal Leave', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'leave_category'=>'Leave Without Pay', 'leave_category_description'=>'Leave Without Pay', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'leave_category'=>'Lost At Sea Leave', 'leave_category_description'=>'Lost At Sea Leave', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'leave_category'=>'Employee Downgraded Leave', 'leave_category_description'=>'Lost At Sea Leave', 'publication_status'=>1,'deletion_status'=>0],
			

		

			
			

        ] ;
        foreach ($data as $obj)
        {
            LeaveCategory::create($obj);
        }
    }
}
