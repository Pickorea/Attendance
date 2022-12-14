<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkingDay;

class WorkingDaySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$working_days = [
			[
				'updated_by' => 1,
				'day' => 'Mon',
				'working_status' => 1,
			],
			[
				'updated_by' => 1,
				'day' => 'Tue',
				'working_status' => 1,
			],
			[
				'updated_by' => 1,
				'day' => 'Wed',
				'working_status' => 1,
			],
			[
				'updated_by' => 1,
				'day' => 'Thu',
				'working_status' => 1,
			],
			[
				'updated_by' => 1,
				'day' => 'Fri',
				'working_status' => 1,
			],
			[
				'updated_by' => 1,
				'day' => 'Sat',
				'working_status' => 0,
			],
			[
				'updated_by' => 1,
				'day' => 'Sun',
				'working_status' => 0,
			],
		];

		foreach ($working_days as $key => $value) {
			WorkingDay::create($value);
		}
	}
}
