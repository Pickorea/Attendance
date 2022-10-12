<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

			
			['created_by'=>1,'designation'=>'Registry Clerk/Receptionist', 'designation_description'=>'Registry Clerk/Receptionist', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Chauffeur', 'designation_description'=>'Chauffeur', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Director of Fisheries', 'designation_description'=>'Director of Fisheries for Coastal Fisheries', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Principal Fisheries Officer', 'designation_description'=>'Principle Fisheries Officer for Coastal Fisheries', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Senior Fisheries Officer', 'designation_description'=>'Senior Fisheries Officer at the Coastal Fisheries', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Senior Enforcement Officer', 'designation_description'=>'Senior Fisheries Officer for the Coastal Fisheries', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Fisheries Officer', 'designation_description'=>'Fisheries Officer for the Coastal Fisheries', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Enforcement Officer', 'designation_description'=>'Enforcement Officer for Monitoring Control and Enforcement ', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Master Fisherman', 'designation_description'=>'Master Fisherman CFD ', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Senor Fisheries Assistant', 'designation_description'=>'Senior Fisheries Assistant', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Fisheries Assistant', 'designation_description'=>'Fisheries Assistant', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Field Enforcement Officer', 'designation_description'=>'Field Enforcement Officer', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Fisheries Technician', 'designation_description'=>'Fisheries Technician', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Data Technician Librarian', 'designation_description'=>'Data Technician Librarian', 'publication_status'=>1,'deletion_status'=>0],
			['created_by'=>1,'designation'=>'Driver', 'designation_description'=>'Driver', 'publication_status'=>1,'deletion_status'=>0],
			
			
			// ['created_by'=>1,'designation'=>'Cleaner', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Fisheries', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Accoutant', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Account Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Database & Web', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Network Systems Administrator', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Information Technology Assistant', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Fisheries', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Principa Fisheries Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Enforcement Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Fisheries Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Fisheries Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Enforcement Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Master Fisherman', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Fisheries Assistant', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Field enforcement officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Marine Engineer (Class III)', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Fisheries Technician', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Data Technician/Librarian', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Driver', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Security', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Greaser', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Principal Verification Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Verification Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Verification Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Verification Assistant', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Principal Licensing Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Licensing Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Compliance Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Compiance Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Observer Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'VMS Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'AVDSO', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Data Control Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Assistant Compliance Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'JV Bursary & Control Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Observer Bursary & Control Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Data Technician', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Licesing & Database Clerk', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Fisheries Data Technician', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Licensing Registration Clerk', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Principal Mineral Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'SMCO', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'SGISA', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Inshore Mineral Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'MSRO', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Offshore Mineral Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'GIS Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Coastal Surveyor', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Principal Economist', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Planning Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Senior Offshore Economist', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Project Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Coordinator Project Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Assistant Project Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Transhipment Data Officer', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Compliance Data Clerk', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Licensing Office', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Observer Data Technician', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Geoscience', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Oceanic Fisheries', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Kiribati Seafood Verification Authority', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],
			// ['created_by'=>1,'designation'=>'Director of Policy & Planning Development', 'designation_description'=>'update description', 'publication_status'=>1,'deletion_status'=>0],

			
			

        ] ;
        foreach ($data as $obj)
        {
            Designation::create($obj);
        }
    }
}
