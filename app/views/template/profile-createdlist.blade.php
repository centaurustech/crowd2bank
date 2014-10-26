
<div class="row page-category">
  <hr>
  <h2 class="page-title">Current Project<br /><small>support and share new projects or inventions</small></h2>         
</div>
<div class="row">
  <div class="col-sm-12">

  @if ( !empty($current_projects) )
    <div class="table-custom">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Title Project</th>
              <th>Status</th>                                
              <th>Total Funds</th>
              <th>Target Funds</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($current_projects as $current_project)
            <tr>
              <td><a href="{{ URL::route('single-page') }}" data-toggle="modal" >{{ $current_project['title_project'] }}</a></td>
              <td>
                {{--<ul class="list-custom-inline list-unstyled list-inline" data-countdown="{{ $current_project['status'] }}">
                  <li><strong>Status:</strong></li>
                </ul>--}}                                                                                 
                {{ $current_project['status'] }}
              </td>
              <td>{{ $current_project['total_funds'] }}</td>
              <td>{{ $current_project['target_fund'] }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Cancel</button>
                  <button type="button" class="btn btn-default">Set to Drafts</button>
                  <button type="button" class="btn btn-default">Send For Approval</button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>                            
      </div>                            
    </div>
  @else
  <div class="panel panel-default">
    <div class="panel-body">
    There are no current project
    </div>
  </div>
  @endif
  </div>
</div>