                              <div class="row page-category">
                                    <div class="col-sm-6 col-md-9 no-padding">
                                          <h2 class="page-title">Sponsored Projects<br /><small>project/s that you sponsored</small></h2>                 
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
            										<th>Project By</th>
            										<th>Status</th>
<<<<<<< HEAD
            										<th>Total Funds</th>
            										<th>Date</th>
            									</tr>
            								</thead>
            								<tbody>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td><a href="#">Jane Dane</a></td>
            										<td><span class="font-ligth-blue">5 Days | 3 Hours | 40 Mins</span></td>
            										<td>US$ 2500</td>
            										<td>July 6, 2014</td>
            									</tr>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td><a href="#">Jane Dane</a></td>
            										<td><span class="font-ligth-blue">Completed</span></td>
            										<td>US$ 2500</td>
            										<td>July 6, 2014</td>
            									</tr>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td><a href="#">Jane Dane</a></td>
            										<td><span class="font-ligth-blue">Completed</span></td>
            										<td>US$ 2500</td>
            										<td>July 6, 2014</td>
            									</tr>
=======
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
>>>>>>> edfeffa10b2ec18768b39abe7ed24b4575f05db0
            								</tbody>
            							</table>                            
            						</div>                            
            					</div>

            				</div>
            			</div>