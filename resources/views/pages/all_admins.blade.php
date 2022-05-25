@extends("layouts.app")
@section('content')
<p class="page_title hide"> All Admins </p>

<section class="app-main__outer">
                    <section class="app-main__inner">
                                 
                               <div class="card">
                                  <section class="card-header"> All Admins </section>
                                    <div class="card-body">
                                      <p class="text-muted"> Total: {{ count($admins) }}</p>
                                      <hr>
                                      <section class="table-responsive">
                                           <table class="table-hover table-striped table-bordered">
                                              <thead>
                                                  <tr>
                                                      <th> # </th>
                                                      <th> Name</th>
                                                      <th> Username</th>
                                                      <th> Computer No. </th>
                                                      <th> File No.</th>
                                                      <th> Role </th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                               @foreach( $admins as $index => $admin )
                                                  <tr>
                                                      <td> {{ $index + 1 }} </td>
                                                      <td> {{ $admin->lastname. ' '.$admin->firstname.' '.$admin->other_name }} </td>
                                                      <td> {{ $admin->username }} </td>
                                                      <td> {{ $admin->computer_no }} </td>
                                                      <td> {{ $admin->file_no }} </td>
                                                      <td> 
                                                        @if( $admin->status == 1 )
                                                        <span class="badge badge-warning"> Cashier </span>
                                                        @elseif( $admin->status == 2 )
                                                        <span class="badge badge-primary"> Supervisor </span>
                                                        @else
                                                        <span class="badge badge-success"> Admin </span>
                                                        @endif
                                                      </td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                           </table>
                                      </section>
                                    </div>
                                </div>

                    </section>
</section>

@stop

