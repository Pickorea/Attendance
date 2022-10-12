<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions
      app()[PermissionRegistrar::class]->forgetCachedPermissions();

      // create permissions
      Permission::create(['name' => 'user.create']);
      Permission::create(['name' => 'user.edit']);
      Permission::create(['name' => 'user.show']);
      Permission::create(['name' => 'user.delete']);

      Permission::create(['name' => 'file.upload']);
      Permission::create(['name' => 'file.edit']);
      Permission::create(['name' => 'file.show']);
      Permission::create(['name' => 'file.delete']);
      Permission::create(['name' => 'timekeeping']);
      Permission::create(['name' => 'registry']);

      
      // create roles and assign existing permissions
      $administratorrole = Role::create(['name' => 'administrator']);
      $administratorrole->givePermissionTo('file.upload');
      $administratorrole->givePermissionTo('file.edit');
      $administratorrole->givePermissionTo('file.show');
      $administratorrole->givePermissionTo('file.delete');


      $officemanagerrole = Role::create(['name' => 'officemanager']);
      $officemanagerrole->givePermissionTo('file.upload');
      $officemanagerrole->givePermissionTo('file.edit');
      $officemanagerrole->givePermissionTo('file.show');
      $officemanagerrole->givePermissionTo('file.delete');

      $timekeepingrole = Role::create(['name' => 'timekeeper']);
      $timekeepingrole->givePermissionTo('timekeeping');

      $registryrole = Role::create(['name' => 'registry']);
      $registryrole->givePermissionTo('registry');
     


     
     
      $userrole = Role::create(['name' => 'user']);

      $userrole->givePermissionTo('file.delete');
      $userrole->givePermissionTo('file.edit');
      $userrole->givePermissionTo('file.show');
   



      $administrator = User::create([
      'name' => 'Milema Kaiea', 
      'email' => 'millemk@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 2,
      'present_address'=> 'Banraenba' ,
      'academic_qualification'=> 'Certificate',
      'joining_date'=> '1995-07-03',
      'id_name'=> 1,
      'id_number'=> 324222,
      'emergency_contact'=> 74028100,
      'gender'=> 1,
      'date_of_birth'=> '1982-04-02',
      'marital_status'=> 1,
      'designation_id'=> 1,
      'department_id'=> 3,

      ]);

      $administrator = User::create([
      'name' => 'Tooreka Temari', 
      'email' => 'toorekat@mfmrd.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 1,
      'present_address'=> 'Temakin' ,
      'academic_qualification'=> 'Masters in Fisheries Science',
      'joining_date'=> '2014-04-1',
      'id_name'=> 1,
      'id_number'=> 73084732,
      'emergency_contact'=> 750938,
      'gender'=> 1,
      'date_of_birth'=> '1982-11-25',
      'marital_status'=> 1,
      'designation_id'=> 3,
      'department_id'=> 12,
      'pf_number'=> 2014058,

      ]);

      $administrator = User::create([
      'name' => 'Karibanang Tamuera', 
      'email' => 'karibananga@mfmrd.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 3,
      'present_address'=> 'Tekaibangaki' ,
      'academic_qualification'=> 'Postgraduate Diploma in Marine Science',
      'joining_date'=> '2003-02-23',
      'id_name'=> 2,
      'id_number'=> 73093873,
      'emergency_contact'=> 9873773,
      'gender'=> 1,
      'date_of_birth'=> '1975-09-23',
      'marital_status'=> 1,
      'designation_id'=> 4,
      'department_id'=> 12,
      'pf_number'=> 2003108,
      ]);

      $administrator = User::create([
      'name' => 'Frangela Tooto', 
      'email' => 'frangelat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 4,
      'present_address'=> 'Eita' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2017-03-01',
      'id_name'=> 2,
      'id_number'=> 879093873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1993-03-08',
      'marital_status'=> 1,
      'designation_id'=> 5,
      'department_id'=> 4,
      'pf_number'=> 2017054,
      ]);

      $administrator = User::create([
      'name' => 'Bwebwenikai Teariki Kirite', 
      'email' => 'bwebwenikait@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 5,
      'present_address'=> 'Ambo' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2017-02-01',
      'id_name'=> 2,
      'id_number'=> 879093873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1993-01-31',
      'marital_status'=> 1,
      'designation_id'=> 5,
      'department_id'=> 5,
      'pf_number'=> 2017054,
      ]);

      $administrator = User::create([
      'name' => 'Riria Moaniba', 
      'email' => 'ririam@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 6,
      'present_address'=> 'Tanaea' ,
      'academic_qualification'=> 'Masters in Fisheries',
      'joining_date'=> '2014-04-01',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1988-06-26',
      'marital_status'=> 1,
      'designation_id'=> 6,
      'department_id'=> 11,
      'pf_number'=> 2014059,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Manibua Rota', 
      'email' => 'minibuar@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 7,
      'present_address'=> 'Tanaea' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2019-11-01',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1993-04-19',
      'marital_status'=> 1,
      'designation_id'=> 6,
      'department_id'=> 11,
      'pf_number'=> 2019252,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Rateiti Vaimalie', 
      'email' => 'rateitiv@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 8,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2012-01-02',//3/1/2012
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1981-10-09',//9/10/1981
      'marital_status'=> 1,
      'designation_id'=> 7,
      'department_id'=> 7,
      'pf_number'=> 2012024,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Liliana Iotebatu', 
      'email' => 'lilianai@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 9,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-01-05',//5/1/2020
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1992-12-08',//8/12/1992
      'marital_status'=> 1,
      'designation_id'=> 7,
      'department_id'=> 7,
      'pf_number'=> 2020043,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Kokoria Taon Temware', 
      'email' => 'kokoriat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 10,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-03',//5/3/2020
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1977-12-07',//7/12/1977
      'marital_status'=> 1,
      'designation_id'=> 7,
      'department_id'=> 7,
      'pf_number'=> 2013068,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Joseph Teuea Toatu', 
      'email' => 'josepht@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 11,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-04',//5/4/2020
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1977-12-07',//7/12/1977
      'marital_status'=> 1,
      'designation_id'=> 8,
      'department_id'=> 11,
      'pf_number'=> 2019173,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Itinibwara Bwebwenimarawa', 
      'email' => 'itinibarab@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 12,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1970-02-17',
      'marital_status'=> 1,
      'designation_id'=> 8,
      'department_id'=> 11,
      'pf_number'=> 2012014,
      ]);
      $administrator->assignRole($administratorrole);


      $administrator = User::create([
      'name' => 'Iobi Arabua', 
      'email' => 'iobia@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 13,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'Certificate in Fisheries Technology',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1967-03-26',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 5,
      'pf_number'=> 6695,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Aranteiti Tekiau', 
      'email' => 'aranteitit@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 14,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'Certificate in Ocean Resource Management',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1985-04-13',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 7,
      'pf_number'=> 2008127,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Toaea Beiateuea', 
      'email' => 'toaeab@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 15,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'Certificate in Ocean Resource Management',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1966-03-18',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 7,
      'pf_number'=> 6809,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tirae Tabee', 
      'email' => 'tiraet@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 16,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'Certificate in Ocean Resource Management',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1970-02-27',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 7,
      'pf_number'=> 95080,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Favae Nauto', 
      'email' => 'favaen@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 17,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'Certificate in Ocean Resource Management',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1981-07-30',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 5,
      'pf_number'=> 2012012,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Eljay Neneia', 
      'email' => 'eljayn@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 18,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 1,
      'date_of_birth'=> '1995-11-09',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021007,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Maria Henry', 
      'email' => 'mariah@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 19,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Moamoa Kabuati', 
      'email' => 'moamoak@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 20,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);
      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Brandon Tabane', 
      'email' => 'brandont@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 21,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);


      $administrator = User::create([
      'name' => 'Teereta Rota', 
      'email' => 'teeretar@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 22,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Teitetabuki Kirabure', 
      'email' => 'teitetabukik@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 23,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Rennie Reymand', 
      'email' => 'rennier@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 24,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Teitika Taati', 
      'email' => 'teitikat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 25,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Keebwa Baaka', 
      'email' => 'keebwab@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 26,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Arintetaake Mauri', 
      'email' => 'arintetaakem@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 27,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tuibao Wiiri', 
      'email' => 'tuibaow@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 28,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Kamarawa Tamton', 
      'email' => 'kamarawat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 29,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tekanene Riikita', 
      'email' => 'tekanener@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 30,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tarabeia Tetoa', 
      'email' => 'tarabeiat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 31,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Terawati Katatia', 
      'email' => 'terawatik@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 32,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Teiaonibuaka Temari', 
      'email' => 'teiaonibuakat@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 33,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Taikate Teimarae', 
      'email' => 'taikatet@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 34,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tabare Taurerei', 
      'email' => 'tabaret@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 35,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Kabure Kaititi', 
      'email' => 'kaburek@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 36,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Tebwi Tererei', 
      'email' => 'tebwit@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 37,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);


      $administrator = User::create([
      'name' => 'Bureteiti Nauma', 
      'email' => 'bureteitin@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 38,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);


      $administrator = User::create([
      'name' => 'Bebe Teroua', 
      'email' => 'bebet@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 39,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Merean Ririennang', 
      'email' => 'mereanr@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 40,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);

      $administrator = User::create([
      'name' => 'Patrick Taukeke', 
      'email' => 'patrickt@fisheries.gov.ki',
      'password' => bcrypt('a'),
      'created_by'=> 1,
      'employee_id'=> 41,
      'present_address'=> 'Temwaiku' ,
      'academic_qualification'=> 'BSC in Marine Science',
      'joining_date'=> '2020-05-05',
      'id_name'=> 3,
      'id_number'=> 908793873,
      'emergency_contact'=> 98728173,
      'gender'=> 0,
      'date_of_birth'=> '1995-10-06',
      'marital_status'=> 1,
      'designation_id'=> 10,
      'department_id'=> 10,
      'pf_number'=> 2021008,
      ]);


      $administrator->assignRole($administratorrole);



    }
}
