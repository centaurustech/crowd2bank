                              
                              <div class="row page-category">
                              <hr>
                                    <div class="col-sm-6 col-md-9 no-padding">
                                          <h2 class="page-title">Current Project<br /><small>support and share new projects or inventions</small></h2>
                                    </div>
                                    <div class="col-sm-6 col-md-3 no-padding">
                                          <div id="dropdown-custom-trigger" class="dropdown dropdown-custom">
                                                <button class="btn btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                                      Sorted By
                                                      <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="min-width: 285px;">
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                                </ul>
                                          </div>
                                    </div>                    
                              </div>
            			<div class="row">
            				<div class="col-sm-12">
            					<div class="table-custom">
            						<div class="table-responsive">
            							<table class="table">
            								<thead>
            									<tr>
            										<th>Title Project</th>
            										<th>Date</th>
            										<th>Status</th>
            										<th>Total Funds</th>
            										<th>Actions</th>
            									</tr>
            								</thead>
            								<tbody>
                                                                  @foreach ($current_projects as $current_project)
                                                                        <tr>
                                                                              <td><a href="/single-page.html">{{ $current_project['title_project'] }}</a></td>
                                                                              <td>{{ $current_project['date'] }}</td>
                                                                              <td><span class="font-ligth-blue">{{ $current_project['status'] }}</span></td>
                                                                              <td>{{ $current_project['total_funds'] }}</td>
                                                                              <td><a href="#">Edit</a> | <a href="#" class="font-red">Delete</a></td>
                                                                        </tr>
                                                                  @endforeach
            								</tbody>
            							</table>                            
            						</div>                            
            					</div>

            				</div>
            			</div>