<?php

class CreateProjectStatusSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$this->command->info('Seeding: CreateProjectStatusSeeder Class...');

		DB::table('project_status')->delete();

		$data = [
			[
				'number' => 0,
				'type'   => 'draft'
			],
			[
				'number' => 1,
				'type'   => 'approve'
			],
			[
				'number' => 2,
				'type'   => 'pending'
			],
			[
				'number' => 3,
				'type'   => 'reject'
			],
			[
				'number' => 4,
				'type'   => 'deleted',
			],
			[
				'number' => 5,
				'type'   => 'finish',
			]
		];

		for ($i = 0; $i < count($data); $i++) { 
	
			DB::table('project_status')->insert(
			    array(
						'number' => $data[$i]['number'],
						'type'   => $data[$i]['type']
			    	)
			);

			$this->command->info('Project status number: ' . $data[$i]['number'] . ' type: ' . $data[$i]['type']);
		}

	}

}
