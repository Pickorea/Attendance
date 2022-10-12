<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Holiday;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    ['created_by'=>1,'holiday_date'=>'2022-01-03','holiday_name'=>'New Years Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-03-08','holiday_name'=>'In Honor of International Wowens Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-04-08','holiday_name'=>'National Health Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-04-15','holiday_name'=>'Good Friday','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-04-18','holiday_name'=>'Easter Monday','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-07-08','holiday_name'=>'Gospel Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-07-11','holiday_name'=>'National Culture & Senior Citizens Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-07-12','holiday_name'=>'In Honor of Independence Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-08-05','holiday_name'=>'National Youth & Childrens Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-10-05','holiday_name'=>'National Education Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-12-12','holiday_name'=>'Human Rights Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-12-26','holiday_name'=>'Christmas Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2022-12-27','holiday_name'=>'In Honor of Boxing Day','description'=>'defaut description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-01-01','holiday_name'=>'New Years Day','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-03-12','holiday_name'=>'In Honour of International WomensDay (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-04-02','holiday_name'=>'Good Friday (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-04-05','holiday_name'=>'Easter Day (Monday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-04-09','holiday_name'=>'In Honour of National Health Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-07-08','holiday_name'=>'Gospel Day (Thursday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-07-09','holiday_name'=>'National Culture and Senior Citizens Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-07-12','holiday_name'=>'National Day (Monday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-07-13','holiday_name'=>'Kiribati Special Day (Tuesday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-08-06','holiday_name'=>'National Youth & Children Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-08-08','holiday_name'=>'World Teachers Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-12-10','holiday_name'=>'Human Right Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-12-24','holiday_name'=>'In Honour of Christmas Day (Friday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>'2021-12-27','holiday_name'=>'In Honour of Boxing Day (Monday)','description'=>'default description','publication_status'=>1,'deletion_status'=>0],
                    ['created_by'=>1,'holiday_date'=>' 2022-07-13','holiday_name'=>'Kiribati Special Day','description'=>'default description','publication_status'=>1,'deletion_status'=>0],

                    	
			

        ] ;
        foreach ($data as $obj)
        {
            Holiday::create($obj);
        }
    }
}
