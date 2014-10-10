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
            										<th>Contribution</th>
            										<th>Actions</th>
            									</tr>
            								</thead>
            								<tbody>
                                                                  @foreach ($sponsored_projects as $sponsored_project)
                                                                        <tr>
                                                                              <td><a href="{{ URL::route('single-page') }}">{{ $sponsored_project['title_project'] }}</a></td>
                                                                              <td><a href="#">{{ $sponsored_project['project_by'] }}</a></td>
                                                                              <td>
                                                                                  <ul class="list-custom-inline list-unstyled list-inline" data-countdown="{{ $sponsored_project['status'] }}">
                                                                                      <li><strong>Status:</strong></li>
                                                                                  </ul>   
                                                                              </td>
                                                                              <td>{{ $sponsored_project['contribution'] }}</td>
                                                                              <td><a href="#">Edit</a> | <a href="#" class="font-red" data-modal-trigger="project" data-modal-value="delete">Delete</a></td>
                                                                        </tr>
                                                                  @endforeach
            								</tbody>
            							</table>                            
            						</div>                            
            					</div>

            				</div>
            			</div>