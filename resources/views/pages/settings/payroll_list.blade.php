<div class="modal" id="payslip_modal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <section class="modal-header"> <b>Employee Payslip</b> </section>
           
            <section class="modal-body"> <!-- modal-body -->
            <p class="text-muted"> <b> <span class="payroll_period_"></span> </b> </p>
            <hr>
            <div class="row"><!-- row -->
                <div class="col-md-4">
                  <p class="text-muted"> <b> PaySlip ID: <span class="payslip_id_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> Payroll Ref ID: <span class="payroll_id_"></span> </b></p>
                </div>
            </div> <!-- //row -->

            <hr>      
            <p class="text-muted"> <b> Employee Name: <span class="employee_name_"></span> </b></p>
            <hr>

            <div class="row"><!-- row -->
                <div class="col-md-4">
                  <p class="text-muted"> <b> Computer No: <span class="employee_computer_no_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> File No: <span class="employee_file_no_"></span> </b></p>
                </div>
            </div> <!-- //row -->    
            <hr>

            <div class="row"><!-- row -->
                <div class="col-md-4">
                  <p class="text-muted"> <b> Organization: <span class="employee_mda_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> Department: <span class="employee_grade_level_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> Level: <span class="employee_step_level_"></span> </b></p>
                </div>
            </div> <!-- //row -->   
            <hr>

            <div class="row"><!-- row -->
                <div class="col-md-4">
                  <p class="text-muted"> <b> Bank: <span class="employee_bank_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> Account Name: <span class="employee_account_name_"></span> </b></p>
                </div>
                <div class="col-md-4">
                  <p class="text-muted"> <b> Account Number: <span class="employee_account_number_"></span> </b></p>
                </div>
            </div> <!-- //row -->   
            <hr>
            
            <p class="text-muted"> <b> Basic Salary: {{currency()}} <span class="employee_basic_salary_"></span> </b></p>
            <hr>
            <p class="text-muted"> <b> Total General Allowance(s): {{currency()}} <span class="employee_general_allowance_"></span> </b></p>
            <hr>
            <p class="text-muted"> <b> Total Personal Allowance(s): {{currency()}} <span class="employee_personal_allowance_"></span> </b></p>
            <hr>
            <p class="text-muted"> <b> Total General Deduction(s): {{currency()}} <span class="employee_general_deduction_"></span> </b></p>
            <hr>
            <p class="text-muted"> <b> Total Personal Deduction(s): {{currency()}} <span class="employee_personal_deduction_"></span> </b></p>
            <hr>
            <p class="text-muted"> <b> Net Salary: {{currency()}} <span class="employee_net_salary_"></span> </b></p>
            
     
            </section> <!-- //modal-body -->

            <div class="modal-footer"> <!-- modal-footer -->
               <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Close Modal </button>
            </div> <!-- //modal-footer -->

        </div>
    </div>
</div>
<button class='payslip_modal_btn_ hide' data-toggle="modal" data-target="#payslip_modal"></button>
@extends("layouts.app")
@section('content')
<p class="page_title hide"> Payroll Items  </p>

<?php
   $payroll = $payroll_items[0]->payroll;
   $print_page_url = route('print_payroll_list', [
                                               'date_from_'=> $payroll->from , 
                                               'date_to_'=> $payroll->to,
                                               'id' => $payroll->id, 
                                               'ref_no' => $payroll->ref_no,
                                               'mda_id' => request()->mda_id,
                                               'step_id'=> request()->step_id,
                                               'grade_id'=> request()->grade_id,
                                               'bank_id'=> request()->bank_id,
                                               'query_record' => request()->query_record
                                            ]); 
?>

<a href="{{ route('view_payroll_items', ['id'=> $payroll->id ]) }}" class="current_url__"></a>
<section class="app-main__outer">
                    <section class="app-main__inner">
                    
                               <div class="card">
                                    <section class="card-header"> Payroll Ref ID:  <span class="ref_no_"> &nbsp; {{ $payroll->id }} </span>  </section>
                                       <div class="card-body">
                                          <p class='text-muted _payroll_period'><b> PERIOD: <span class="date_from_">{{ $payroll->from }} </span> -  <span class="date_to_">{{ $payroll->to }}</span> </b></p>  
                                            
                                            <div class="float-right"> 
                                                 <a href="{{ route('view_payroll_items', ['ref' => $payroll->ref_no, 'id' => $payroll->id, 're_calculate_payroll' => 1 ]) }}" class="hide_print_docs btn btn-warning re_calculate_payroll_btn"><i class="fa fa-money"></i> Re Calculate Payroll </a> &nbsp;
                                                 <button onClick="print_docs('<?php echo $print_page_url ?> ')" class="hide_print_docs btn btn-info"><i class="fa fa-print"></i> Print </button>
                                             </div>    
                                             <hr>                     
                                          <section class="query_record_section  hide_print_docs">
                                          <P class="text-muted"> Total Employees: {{ $payroll_items->count() }} </P>
                                          <p class="text-muted"> Total Net Salary:  {{currency()}} {{ number_format( $payroll_items->sum('net_salary'), 2 ) }}</p>
                                          @include('partials.alert_msg')
                                              <hr>

                                              <div class="row"><!-- row -->
                                                  <div class="col-md-3"><!-- col -->
                                                       <div class="form-group">
                                                           @include("partials.all_mda")
                                                       </div>
                                                  </div><!-- //col -->

                                                  <div class="col-md-3"><!-- col -->
                                                       <div class="form-group">
                                                           @include("partials.all_steps")
                                                       </div>
                                                  </div><!-- //col -->

                                                  <div class="col-md-3"><!-- col -->
                                                       <div class="form-group">
                                                           @include("partials.all_grades")
                                                       </div>
                                                  </div><!-- //col -->
                                                  
                                                  <div class="col-md-3"><!-- col -->
                                                       <div class="form-group">
                                                           @include("partials.all_banks")
                                                       </div>
                                                  </div><!-- //col -->                                         

                                                  <div class="col-md-12"><!-- col -->
                                                       <section class="d-flex justify-content-center">
                                                       <div class="form-group">
                                                           <button id="search_record_btn__" class="btn btn-outline-success"><i class="fa fa-search"></i> Get Report </button>
                                                       </div>
                                                       </section>
                                                  </div><!-- //col -->
                                              </div><!-- //row -->
                                              <hr>
                                          </section>
                                        

                                          <section class="table-responsive">
                                              <table class="datatable_ table-hover table-bordered table-striped">
                                                  <thead class="">
                                                      <tr>
                                                          <th> Emp No. </th>
                                                          <th> Name</th>
                                                          <th> Organization </th>
                                                          <th> Department </th>
                                                          <th> Level </th>
                                                          <th> Bank </th>
                                                          <th> Acct No.</th>
                                                          <th> Basic Salary ({{currency()}}) </th>
                                                          <th> Total Allowances ({{currency()}}) </th>
                                                          <th> Total Deductions ({{currency()}}) </th>
                                                          <th> Net Salary ({{currency()}}) </th>
                                                          <th> Action </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach( $payroll_items as $payroll_item )
                                                      <tr>
                                                          <td> {!! $payroll_item->user->staff_id_card_no !!} </td>
                                                          <td> {!! $payroll_item->user->lastname.' '.$payroll_item->user->firstname.' '.$payroll_item->user->other_name !!} </td>
                                                          <td> {{ $payroll_item->mda->name }} </td>
                                                          <td> {{ $payroll_item->grade->name }} </td>
                                                          <td> {{ $payroll_item->step->name }} </td>
                                                          <td> {{ $payroll_item->bank->name }} </td>
                                                          <td> {{ $payroll_item->user->account_number }} </td>
                                                          <td> {{ number_format( $payroll_item->basic_salary, 2 ) }} </td>
                                                          <td> {{ number_format( $payroll_item->total_general_allowance + $payroll_item->total_personal_allowance , 2 ) }} </td>
                                                          <td> {{ number_format( $payroll_item->total_general_deduction + $payroll_item->total_personal_deduction , 2 ) }}  </td>
                                                          <td> {{ number_format( $payroll_item->net_salary , 2 ) }} </td>
                                                          <td> <button id="{{ json_encode($payroll_item) }}" type="button" class="view_payslip_btn btn btn-outline-primary"> PaySlip </button> </td>
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
$( function() {
    $('.view_payslip_btn').click( e => {
        var data = JSON.parse(e.target.id);
        var other_name = ( data.user.other_name ) ? data.user.other_name : '';
        var employee_name = data.user.lastname +' '+data.user.firstname+' '+ other_name;
            $('.payroll_period_').text( $('._payroll_period').text() );
            $('.payslip_id_').text(data.id);
            $('.payroll_id_').text(data.payroll_id);
            $('.employee_name_').text(employee_name);
            $('.employee_computer_no_').text(data.user.computer_no);
            $('.employee_file_no_').text(data.user.file_no);
            $('.employee_mda_').text(data.mda.name);
            $('.employee_grade_level_').text(data.grade.name);
            $('.employee_step_level_').text(data.step.name);
            $('.employee_bank_').text(data.bank.name);
            $('.employee_account_number_').text(data.user.account_number);
            $('.employee_account_name_').text(data.user.account_name);
            $('.employee_basic_salary_').text(data.basic_salary);
            $('.employee_general_deduction_').text(data.total_general_deduction);
            $('.employee_personal_deduction_').text(data.total_personal_deduction);
            $('.employee_general_allowance_').text(data.total_general_allowance);
            $('.employee_personal_allowance_').text(data.total_personal_allowance);
            $('.employee_net_salary_').text(data.net_salary);

            $('.payslip_modal_btn_').click();
    });

    $(".search_btn").click( () => {
        $('.query_record_section').toggle();
    });

    $('#search_record_btn__').click( () => {
        var grade_id = $.trim( $("#grade_id_").val() ) ,
            step_id = $.trim( $("#step_id").val() ),
            mda_id = $.trim( $("#mda_id_").val() ),
            bank_id = $.trim( $("#bank_id").val() ),    
            current_url = $(".current_url__").attr('href');
        var data = "&grade_id="+grade_id+"&step_id="+step_id+"&mda_id="+mda_id+"&bank_id="+bank_id+"&query_record=1";
        var search_url = current_url+data;
        window.location.href = search_url;
    });

    $('.re_calculate_payroll_btn').click( e => {
        e.preventDefault();
        var url = e.target.href;
        if(_confirm_('Doing this will Reset the Payroll List, which means that employees who were not here as of the Initial time of computing may be added Now... ') ){
            window.location.href = url;
        }
    });
});
</script>
@stop

