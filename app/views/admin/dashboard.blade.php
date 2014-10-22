<div class="dashboard">
    <div class="row page-category">
          <div class="col-sm-12 no-padding">
                <h2 class="page-title">Dashboard</h2>
          </div>                  
    </div>
<div class="row page-category">
      <h2 class="page-title">Pending Projects<br /><small>pending new projects or inventions</small></h2>         
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="table-custom">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title Project</th>
                            <th>Posted By</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data['new_projects'] as $project )
                            <tr>
                                  <td><a href="{{ URL::to("single-page") }}/{{ $project['id'] }}">{{ $project['title'] }}</a></td>
                                  <td>{{ $project['author'] }}</td>
                                  <td><span class="font-ligth-blue">{{ $project['target_date'] }}</span></td>
                                  <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-default">Approve</button>
                                      <button type="button" class="btn btn-default">Reject</button>
                                    </div>
                                  </td>
                            </tr>
                      @endforeach
                    </tbody>                                        
                </table>            
                <?php
                  Paginator::setPageName('new_projects');
                  $appends = [
                    'active_projects' => Input::get('active_projects', 1),
                    'end_projects' => Input::get('end_projects', 1)
                  ]
                ?>       
                {{  $data['new_projects']->appends($appends)->links(); }}    
            </div>                            
        </div>
    </div>
</div>
<div class="row page-category">
      <h2 class="page-title">Active Projects<br /><small>approve new projects or inventions</small></h2>         
</div>
<div class="row">
      <div class="col-sm-12">
            <div class="table-custom">
                  <div class="table-responsive">
                        <table class="table">
                              <thead>
                                    <tr>
                                          <th>Title Project</th>
                                          <th>Posted By</th>
                                          <th>Date Started</th>
                                          <th>Date End</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($data['active_projects'] as $project )
                                          <tr>
                                                <td><a href="{{ URL::to("single-page") }}/{{ $project['id'] }}">{{ $project['title'] }}</a></td>
                                                <td>{{ $project['author'] }}</td>
                                                <td><span class="font-ligth-blue">{{ $project['start_date'] }}</span></td>
                                                <td><span class="font-ligth-blue">{{ $project['target_date'] }}</span></td>
                                          </tr>
                                    @endforeach
                              </tbody>
                        </table>
                        <?php
                          Paginator::setPageName('active_projects');
                          $appends = [
                            'new_projects' => Input::get('new_projects', 1),
                            'end_projects' => Input::get('end_projects', 1)
                          ]
                        ?>
                        {{  $data['active_projects']->appends($appends)->links(); }}
                  </div>                            
            </div>
      </div>
</div>
<div class="row page-category">
      <h2 class="page-title">End Projects<br /><small>finished projects or inventions</small></h2>         
</div>
<div class="row">
      <div class="col-sm-12">
            <div class="table-custom">
                  <div class="table-responsive">
                        <table class="table">
                              <thead>
                                    <tr>
                                          <th>Title Project</th>
                                          <th>Posted By</th>
                                          <th>Date Started</th>
                                          <th>Date End</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($data['end_projects'] as $project )
                                          <tr>
                                                <td><a href="{{ URL::to("single-page") }}/{{ $project['id'] }}">{{ $project['title'] }}</a></td>
                                                <td>{{ $project['author'] }}</td>
                                                <td><span class="font-ligth-blue">{{ $project['start_date'] }}</span></td>
                                                <td><span class="font-ligth-blue">{{ $project['target_date'] }}</span></td>
                                          </tr>
                                    @endforeach
                              </tbody>
                        </table>         
                        <?php
                          Paginator::setPageName('end_projects');
                          $appends = [
                            'new_projects' => Input::get('new_projects', 1),
                            'active_projects' => Input::get('active_projects', 1)
                          ]
                        ?>
                        {{  $data['end_projects']->appends($appends)->links(); }}
                  </div>                            
            </div>
      </div>
</div>
</div>