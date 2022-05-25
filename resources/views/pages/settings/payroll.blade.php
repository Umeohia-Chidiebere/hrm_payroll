@extends("layouts.app")
@section('content')
<p class="page_title hide"> Payroll Managemnt </p>
<button class="hide" id="update_profile_modal_btn" data-toggle="modal" data-target="#update_profile_modal"></button>
<section class="app-main__outer">
                        <section class="app-main__inner">     
                                <div class="card">
                                  <section class="card-header"> Payroll Management </section>
                                      <div class="card-body">
                                       
                                      <form action="{{ route('register_payroll')}}" method='post'>
                                          @csrf()
                                          <section class="row"><!-- //row -->

                                              <div class="col-md-6"><!-- col -->
                                                  <div class="form-group">
                                                      <label for=""> From </label>
                                                      <input type="date" required class="form-control" name="from">
                                                    </div>
                                              </div><!-- //col -->

                                              <div class="col-md-6"><!-- col -->
                                                  <div class="form-group">
                                                      <label for=""> To </label>
                                                      <input type="date" required class="form-control" name="to">
                                                    </div>
                                              </div><!-- //col -->

                                          </section><!--// row -->

                                          <div class="d-flex justify-content-center">
                                              <button type="submit" class="btn btn-outline-success"> Create Payroll </button>
                                          </div>
                                    
                                        </form>

                                          <hr>
                                          Total Payroll: {{ count($payrolls)}}
                                          <hr>
                                          @include('partials.alert_msg')

                                          <section class="table-responsive">
                                              <table id="datatable_" class="word_no_wrap table-hover table-striped table-bordered">
                                                  <thead class="">
                                                      <tr>
                                                          <th> # </th>
                                                          <th> Ref ID. </th>
                                                          <th> Date From </th>
                                                          <th> Date To </th>
                                                          <th> Actions </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach( $payrolls as $index => $payroll )
                                                      <tr>
                                                          <td> {{$index + 1}} </td>
                                                          <td> {{ $payroll->id}} </td>
                                                          <td> {{ $payroll->from }} </td>
                                                          <td> {{ $payroll->to}} </td>
                                                          <td> 
                                                              <a href="{{ route('view_payroll_items', ['id' => $payroll->id, 'ref_no' => $payroll->ref_no ]) }}" class="btn btn-outline-primary"> View List </a> &nbsp;
                                                              <a href="{{ route('delete_payroll', ['id' => $payroll->id, 'ref_no' => $payroll->ref_no ])}}" class=" delete_payroll_ btn btn-outline-danger"> Delete </a>
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

<script>
    $('.delete_payroll_').click( (e) => {
        e.preventDefault();
        if(_confirm_() ){
            window.location.href = e.target.href;
        }
    });
</script>
@stop
