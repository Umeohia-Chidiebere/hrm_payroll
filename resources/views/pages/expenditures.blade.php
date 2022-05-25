@extends("layouts.app")
@section('content')
<?php
$user = auth()->user();
?>
<p class="page_title hide"> Expenditures </p>

<section class="app-main__outer">
                    <section class="app-main__inner">
     
                               <div class="card">
                                  <section class="card-header"> Expenditures Record </section>
                                      <section class="card-body"><!-- card-body -->
                                       <button class="btn btn-outline-success toggle_ toggle_btn_ toggle_add_new_"><i class="fa fa-plus"></i> Add new </button>
                                       
                                         <button class="btn btn-outline-secondary toggle_search_btn_"> <i class="fa fa-search"></i> Get Report </button>
                                     
                                       <button class="btn btn-outline-info hide toggle_ toggle_btn_"> Hide Form </button>
                                      <hr>


                                      <section class="toggle_search_ hide">
                                           <form action="?">
                                           <input type="hidden" name='search_' value="1">
                                               <div class="row">
                                                   <div class="col-md-5"><!-- col -->
                                                       <div class="form-group">
                                                           <select name="approval_status_" class="form-control">
                                                           <option value=""> - Select Status -</option>
                                                           <option value="1"> Approved </option>
                                                           <option value="2"> Pending </option>
                                                           </select>
                                                       </div>
                                                   </div><!-- //col -->

                                                   <div class="col-md-5"><!-- col -->
                                                       <div class="form-group">
                                                           <select name="month_" class="form-control">
                                                           <option value="100"> -Select Month- </option>
                                                           <option value="1"> January </option>
                                                           <option value="2"> February </option>
                                                           <option value="3"> March </option>
                                                           <option value="4"> April </option>
                                                           <option value="5"> May</option>
                                                           <option value="6"> June </option>
                                                           <option value="7"> July </option>
                                                           <option value="8"> August </option>
                                                           <option value="9"> September</option>
                                                           <option value="10"> October </option>
                                                           <option value="11"> November </option>
                                                           <option value="12"> December </option>
                                                           </select>
                                                       </div>
                                                   </div><!-- //col -->

                                                   <div class="col-md-2">
                                                       <div class="form-group">
                                                       <button type="submit" class='btn btn-outline-secondary'> Get Report </button>
                                                       </div>
                                                   </div>

                                               </div>
                                           </form>
                                           <hr>
                                      </section>

                                      <section class="hide toggle_ ">
                                      <p class="text-muted"> Create New Expenditure  </p>
                                      <form action="{{ route('store_expenditure') }}" method="post" enctype="multipart/form-data">
                                      @csrf()
                                      <div class="row">
                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Name </label>
                                                  <input type="text" required name="name" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Description </label>
                                                  <input type="text" name="description"  class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Amount </label>
                                                  <input type="number" required name="amount" class="form-control">
                                                </div>
                                         </div> <!-- //col -->
                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Expenditure Type </label>
                                                  <select required name="type" class="form-control">
                                                  <option value=""> -Select Type- </option>
                                                  <option value="Recurrent"> Recurrent </option>
                                                  <option value="Capital"> Capital </option>
                                                  </select>
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Receiver </label>
                                                  <input type="text" required name="receiver" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Receiver Phone </label>
                                                  <input type="text" required name="receiver_phone" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Receiver Address </label>
                                                  <input type="text" required name="receiver_address" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Mode of Payment </label>
                                                  <select required name="payment_method" class="form-control">
                                                  <option value=""> - Select Type - </option>
                                                  <option value="Bank Transfer"> Bank Transfer </option>
                                                  <option value="Cash"> Cash </option>
                                                  <option value="Cheque"> Cheque </option>
                                                  <option value="Online Transfer"> Online Transfer </option>
                                                  </select>
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Cheque No/Receipt No</label>
                                                  <input type="text" name="receipt_no" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                         <div class="col-md-4"><!-- col -->
                                                <div class="form-group">
                                                  <label for=""> Upload Proof Of Payment </label>
                                                  <input type="file" name="file_" class="form-control">
                                                </div>
                                         </div> <!-- //col -->

                                      </div>

                                      <div class="d-flex justify-content-center">
                                           <button type="submit" class='btn btn-outline-success'> Submit </button> &nbsp;
                                           <button class="btn btn-outline-info hide toggle_ toggle_btn_"> Close  </button>
                                      </div>

                                      </form>

                                          <hr>
                                      </section>

                                      <p class="text-muted text-uppercase"> Organization: {{ auth()->user()->mda->name }} </p>
                                      <p class="text-muted"> Total Expenditure(s): {{ count($expenditures)}} </p>
                                      <p class="text-muted"> Total Approved Expenditure Amount: {{currency()}} {{ number_format($expenditures->filter->is_approved->sum('amount'), 2) }} </p>
                                      <hr>
                                      @include('partials.alert_msg')
                                      <div class="table-responsive">
                                          <table class="datatable_ table-hover table-striped table-bordered">
                                                 <thead>
                                                     <tr>
                                                         <th> Ref ID </th>
                                                         <th> Name</th>
                                                         <th> Amount ({{currency()}})</th>
                                                         <th> Status </th>
                                                         <th> Description</th>
                                                         <th> Type</th>
                                                         <th> Receiver </th>
                                                         <th> Receiver Phone</th>
                                                         <th> Receiver Address</th>
                                                         <th> Payment Method </th>
                                                         <th> Trnx No </th>
                                                         <th> Proof of Payment </th>
                                                         <th> Cashier </th>
                                                         <th> Date </th>
                                                         @if( auth()->user()->status > 1)
                                                         <th> Action </th>
                                                         @endif
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                 @foreach( $expenditures as $expenditure )
                                                     <tr>
                                                         <td> {{ $expenditure->id }} </td>
                                                         <td> {{$expenditure->name}} </td>
                                                         <td> {{ number_format( $expenditure->amount, 2 )}} </td>
                                                         <td>
                                                         @if( $expenditure->is_approved )
                                                            <span class="badge badge-success"> Approved </span>
                                                         @else
                                                            <span class="badge badge-warning"> Pending </span>
                                                         @endif
                                                         </td>
                                                         <td> {{ $expenditure->description }} </td>
                                                         <td> {{ $expenditure->type}} </td>
                                                         <td> {{ $expenditure->receiver }} </td>
                                                         <td> {{ $expenditure->receiver_phone }} </td>
                                                         <td> {{ $expenditure->receiver_address }} </td>
                                                         <td> {{ $expenditure->payment_method }} </td>
                                                         <td> {{ $expenditure->receipt_no }} </td>
                                                         <td> 
                                                         @if($expenditure->file_name)
                                                            <a href="{{asset('uploads/expenditures/'.$expenditure->file_name.'.'.$expenditure->file_type )}}" class="btn btn-outline-primary"> View </a>
                                                        @else
                                                        No Upload
                                                        @endif
                                                         </td>
                                                         <td> {{ $expenditure->user->username }} </td>
                                                         <td> {{ $expenditure->updated_at}} </td>
                                                         @if( auth()->user()->status > 1)
                                                         <td>
                                                         
                                                         @if( ! $expenditure->is_approved )
                                                            <form onsubmit="return confirm('You are about to approve this Expenditure...')" action="{{ route('store_expenditure') }}" method="post">
                                                            <input type="hidden" name="approve_expenditure_" value="1">
                                                            <input type="hidden" name="id" value="{{ $expenditure->id }}">
                                                            @csrf()
                                                            <button type="submit" class="btn btn-outline-success"> Approve </button>
                                                            </form>
                                                            @else
                                                            -
                                                            @endif
                                                     
                                                         </td>
                                                         @endif
                                                     </tr>
                                                     @endforeach
                                                 </tbody>
                                          </table>
                                      </div>

                                       </section><!-- //card-body -->
                                </div>

                    </section>
</section>

<script>
  $(function() {
      $('.toggle_btn_').click( () => {
        $('.toggle_search_').hide();
          $('.toggle_').toggle();
      });

      $('.toggle_search_btn_').click( () => {
          $('.toggle_').hide();
          $('.toggle_add_new_').show();
          $('.toggle_search_').show();
      });
  });
</script>
@stop
