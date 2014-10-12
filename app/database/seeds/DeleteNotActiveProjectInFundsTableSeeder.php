<?php

class DeleteNotActiveProjectInFundsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: DeleteNotActiveProjectInFundsTableSeeder Class...');

		$notActive = DB::table('funds')
						->join('projects', 'funds.project_id', '=', 'projects.id')
						->select('funds.id')
						->where('projects.activated', '=', 0)
						->get(['funds.id']);

		$before = DB::table('funds')->count();

		foreach ($notActive as $key => $value) {
			DB::table('funds')->where('funds.id', '=', $value->id)->delete();
			$this->command->info('deleting inactive project in fund table id number: ' . $value->id);
		}

		$this->command->info('Before Deletion: ' . $before);
		$this->command->info('After Deletion: ' . DB::table('funds')->count());

	}

}
