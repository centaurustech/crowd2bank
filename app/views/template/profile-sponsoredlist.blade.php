            			<div class="row page-category">
            				<h2 class="page-title">Sponsored Projects<br /><small>project/s that you sponsored</small></h2>                 
            			</div>
            			<div class="row">
            				<div class="col-sm-12">
            					<div class="table-custom">
            						<div class="table-responsive">
            							<table class="table">
            								<thead>
            									<tr>
            										<th>Title Project</th>
            										<th>Project By</th>
            										<th>Status</th>
            										<th>Date</th>
            										<th>Actions</th>
            									</tr>
            								</thead>
            								<tbody>
                                                                  @foreach ($sponsored_projects as $sponsored_project)
                                                                        <tr>
                                                                              <td><a href="/single-page.html">{{ $sponsored_project['title_project'] }}</a></td>
                                                                              <td>{{ $sponsored_project['project_by'] }}</td>
                                                                              <td><span class="font-ligth-blue">{{ $sponsored_project['status'] }}</span></td>
                                                                              <td>{{ $sponsored_project['date'] }}</td>
                                                                              <td><a href="#">Edit</a> | <a href="#" class="font-red">Delete</a></td>
                                                                        </tr>
                                                                  @endforeach
            								</tbody>
            							</table>                            
            						</div>                            
            					</div>

            				</div>
            			</div>