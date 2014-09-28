<?php namespace Crowd2Bank\Repos\Projects;

class ProjectsRepository implements ProjectsRepositoryInterface {

	public function getProjects(array $id)
	{
		return [[
				'title'       => 'Glass Bread Toaster',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae, hic quos porro voluptatum natus quas, rem. Necessitatibus architecto quae tenetur, asperiores vel beatae ea, sequi modi enim sint praesentium soluta!',
				'date'        => '2014/09/15'
			],[
				'title'       => 'Glass Bread Toaster',
				'description' => 'Quia unde reiciendis adipisci, eius similique, voluptatum quis quisquam at eveniet minus accusantium culpa a odit praesentium! Voluptatibus reiciendis ex rerum, labore voluptas obcaecati. Debitis labore nemo, fuga suscipit veritatis.',
				'date'        => '2014/10/15'
			],[
				'title'       => 'Glass Bread Toaster',
				'description' => 'Repellat, qui. Alias suscipit, pariatur neque a quam illo ullam obcaecati consectetur architecto quaerat eum magni tenetur in debitis hic numquam delectus. Dignissimos rerum, voluptates pariatur, quidem excepturi mollitia repudiandae.',
				'date'        => '2014/04/15'
			],[
				'title'       => 'Glass Bread Toaster',
				'description' => 'Eveniet similique, cum impedit consequuntur tempora qui, suscipit autem repellat magni voluptatem, repudiandae labore ad iste possimus aliquid recusandae ducimus iure saepe. Dolorem in officiis ab autem atque corrupti quam?',
				'date'        => '2014/12/25',
		]];
	}

	public function currentProjects()
	{
		return [[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
			],[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
			],[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
		]];
	}

	public function sponsoredProjects()
	{
		return [[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
			],[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
			],[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
		]];
	}
	
}
