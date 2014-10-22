<?php

class CreateProjectsDetailsSupports extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: CreateProjectsDetailsSupports Class...');

		//set variable for faker class
		$faker = Faker\Factory::create();

		// clean existing tables	
	    DB::table('project_details')->delete();
	    DB::table('project_supports')->delete();

		$projects = Project::get(['id']);		
		$this->command->info('Total active projects: ' . count($projects));

		foreach ($projects as $key => $project) {
			$projectId = $project->id;
			$this->command->info('Project id number: ' . $projectId);

			$status = Project::find($projectId)->status;

			DB::table('project_details')->insert(
			    array(
						'project_id'       => $projectId,
						'full_description' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
						'facebook_count'   => ( $status == 1 || $status == 5 ) ? rand(20, 200) : 0,
						'twitter_count'    => ( $status == 1 || $status == 5 ) ? rand(20, 200) : 0,
						'created_at'       => new DateTime,
						'updated_at'       => new DateTime
			    	)
			);
			
			for ($i = 0; $i < rand(3, 5); $i++) { 
				DB::table('project_supports')->insert(
				    array(
							'project_id' => $projectId,
							'amount'      => rand(150, 1000),
							'details'     => serialize( $faker->sentences($nb = rand(3, 7)) ),
							'created_at'  => new DateTime,
							'updated_at'  => new DateTime
				    	)
				);
			}
		}

	}

}