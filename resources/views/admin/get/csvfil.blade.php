
{{--  count  --}}

    


{{--  DBF  --}}
@if (isset($DBF))
<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">
        @if (isset($count))
        {{ $count . '  Files' }}
        @else
        {{ 'لايوجد اي كشوفات طلاب قد تم رفعها' }}
        @endif
    </h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table">
      <thead>
        <tr>
          <th>{{ 'File Name' }}</th>
          <th>{{ 'File Description' }}</th>
          <th>{{ 'Status' }}</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($DBF as $FILE)
        <tr>
          <td>{{ $FILE->no ?? 'no' }}</td>
          <td>{{ $FILE->description ?? 'description' }}</td>
          <td>
            {{ $FILE->status ?? 'status' }}
            + {{ $FILE->id ?? 'id' }}
          </td> 
          
          <td class="text-right py-0 align-middle">
            <div class="btn-group btn-group-sm">
              <a href="{{ url($FILE->path ?? 'path') }}" class="btn btn-info">
                <i class="fas fa-eye"></i>
                <i class="fas fa-folder"></i>
              </a>
              <a href="#" id="deletecsv"route="{{ route('delete.file', $FILE->filename ) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            </div>
          </td>
        
        
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  {{--  --}}
  
  

  
@else
  <hr>{{ 'no DBF' }}<hr>
@endif


{{--  allcsv  --}}
@if (isset($allcsv_x))

  @if (is_array($allcsv ))
  {{-- All file count is {{ \array_count_values($allcsv) }} --}}
    <ul>
      @foreach ($allcsv as $k => $item)
          @if (is_array($item))
          <ul>
            @foreach ($item as $sk=> $supitem)
            <li>
              <B>{{ $k + 1 }} {{ ' - ' }}</B>
              <a href="{{ url($sk) }}">{{ $supitem }}</a>
            </li>
            @endforeach
          </ul>
          @else
          <li>
            <B>{{ $k + 1 }} {{ ' - ' }}</B>
            <a href="{{ url($k) }}">{{ $item }}</a>
          </li>
          @endif
      @endforeach
    </ul>
  @else
    {{ $allcsv }}
  @endif
    
  @else
    {{-- <ul>
      <li>no fiels</li>
    </ul> --}}
@endif

@if(isset($record))
{{-- view all files csv in school --}}
              <div class="col-md-12">
                <!-- The time line -->
                <div class="timeline">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
    
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-sm">Read more</a>
                        <a class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-green">3 Jan. 2014</span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-video bg-maroon"></i>
    
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
    
                      <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>
    
                      <div class="timeline-body">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                        </div>
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="fas fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <!-- /.col -->
{{--  end all files  --}}
@endif

