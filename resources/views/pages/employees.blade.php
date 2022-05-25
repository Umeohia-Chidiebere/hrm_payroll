@include("partials.employee_registration_modal")
@include("partials.profile_modal")
@extends("layouts.app")
@section('content')
<p class="page_title hide"> Employees Managemnt </p>
<button class="hide" id="update_profile_modal_btn" data-toggle="modal" data-target="#update_profile_modal"></button>
<a href='{{ route("fetch_employee_allowance")}}' class="hide fetch_employee_allowance_url_"></a>
<a href='{{ route("fetch_employee_deduction")}}' class="hide fetch_employee_deduction_url_"></a>
<section class="app-main__outer">
                        <section class="app-main__inner">     
                                <div class="card">
                                  <section class="card-header"> Employees Management </section>
                                      <div class="card-body">
                                          <!-- <button data-toggle="modal" data-target="#register_modal" type="button" class="btn btn-outline-success"><i class="fa fa-plus"></i> New Employee </button>
                                          <hr> -->
                                          Total Employees: {{ count($employees) }}
                                          <hr>
                                          @include('partials.alert_msg')

                                          <section class="table-responsive">
                                              <table id="datatable_" class="table-hover table-striped table-bordered">
                                                  <thead class="word_no_wrap">
                                                      <tr>
                                                          <th> # </th>
                                                          <th> Name </th>
                                                          <th> Organization </th>
                                                          <th> Department </th>
                                                          <th> Level </th>
                                                          <th> Actions </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @foreach( $employees as $index =>$employee )
                                                      <tr>
                                                          <td>{{ $index + 1}} </td>
                                                          <td>{{ $employee->fullnames() }} </td>
                                                          <td>{{ $employee->mda->name }} </td>
                                                          <td>{{ $employee->grade->name }} </td>
                                                          <td>{{ $employee->step->name }} </td>
                                                          <th class="word_no_wrap">
                                                              <button class="view_profile_btn btn btn-outline-primary" id="{{ json_encode( $employee ) }}" > View Profile </button> &nbsp;
                                                              <!-- <a class="btn btn-outline-danger delete_user_" href="{{route('delete_employee', ['employee_id' => $employee->id ])}}"> Delete </a> -->
                                                          </th>
                                                      </tr>
                                                      @endforeach
                                                  </tbody>
                                              </table>
                                          </section>
                                          @if(! count($employees))
                                          <p class="text-center text-muted"> You have No Records yet! </p>
                                          @endif

                                       </div>
                                </div>
                        </section> 
</section>

<script>


    $('.view_profile_btn').click( e => {
        var employee = JSON.parse(e.target.id); 
        //data for edit-form
        $('#employee_id_value').val(employee.id);
        $('#employee_lastname').val(employee.lastname);
        $('#employee_firstname').val(employee.firstname);
        $('#employee_other_name').val(employee.other_name);
        $('#employee_qualification').val(employee.qualification);
        $('#employee_address').val(employee.address);
        $('#employee_email').val(employee.email);
        $('#employee_phone').val(employee.phone);
        $('#employee_staff_id_card_no').val(employee.staff_id_card_no);
        $('#employee_computer_no').val(employee.computer_no);
        $('#employee_date_of_first_appointment').val(employee.date_of_first_appointment);
        $('#employee_dob').val(employee.dob);
        $('#employee_file_no').val(employee.file_no);
        $('#employee_entry_level').val(employee.entry_level);
        $('.bank_id_').val(employee.bank.id).change();
        $('.step_id_').val(employee.step_id).change();
        $('.grade_id_').val(employee.grade_id+'/'+employee.mda_id).change();
        $('#employee_account_number').val(employee.account_number);
        $('#employee_account_name').val(employee.account_name);
        $('#employee_bvn').val(employee.bvn);
        $('#employee_nin').val(employee.nin);

        //Data for profile view
        $('.employee_id_value').text(employee.id);
        $('.employee_lastname').text(employee.lastname);
        $('.employee_firstname').text(employee.firstname);
        $('.employee_other_name').text(employee.other_name);
        $('.employee_qualification').text(employee.qualification);
        $('.employee_address').text(employee.address);
        $('.employee_email').text(employee.email);
        $('.employee_phone').text(employee.phone);
        $('.employee_staff_id_card_no').text(employee.staff_id_card_no);
        $('.employee_computer_no').text(employee.computer_no);
        $('.employee_date_of_first_appointment').text(employee.date_of_first_appointment);
        $('.employee_dob').text(employee.dob);
        $('.employee_file_no').text(employee.file_no);
        $('.employee_entry_level').text(employee.entry_level);
        $('.employee_bank_name').text(employee.bank.name ??= '');
        $('.employee_step_name').text(employee.step.name ??= '');
        $('.employee_grade_name').text(employee.grade.name ??= '');
        $('.employee_mda_name').text(employee.mda.name ??= '');
        $('.employee_account_number').text(employee.account_number);
        $('.employee_account_name').text(employee.account_name);
        $('.employee_bvn').text(employee.bvn);
        $('.employee_nin').text(employee.nin);
        $('.employee_created_by').text(employee.created_by.username ??= '');
        
        _fetch_employee_allowances();
        _fetch_employee_deductions();
        
        $('#update_profile_modal_btn').click();
    });

    $('.delete_user_').click( e => {
        e.preventDefault();
        var link_ = e.target.href;
        if(_confirm_()){
            window.location.href = link_;
        }
    });

    $("#store_employee_allowance_form").submit( e => {
        e.preventDefault();
        var data = $('#store_employee_allowance_form').serialize(),
            url = $("#store_employee_allowance_form").attr('action');
            $.post(url, data, response => {
                if(response.error) _alert_error_modal();
                if(response.success) _alert_success_modal();
                _clear_form_data();
                _fetch_employee_allowances();
            })
            .catch( err => {
                _alert_error_modal();
            });
    });

    $("#store_employee_deduction_form").submit( e => {
        e.preventDefault();
        var data = $('#store_employee_deduction_form').serialize(),
            url = $("#store_employee_deduction_form").attr('action');
            $.post(url, data, response => {
                if(response.error) _alert_error_modal();
                if(response.success) _alert_success_modal();
                _clear_form_data();
                _fetch_employee_deductions();
            })
            .catch( err => {
                _alert_error_modal();
            });
    });

    function _fetch_employee_allowances()
    {
        var employee_id = $('#employee_id_value').val(),
            url = $(".fetch_employee_allowance_url_").attr('href'),
            table_ = $(".employee_allowance_table_records_"),
            tbody = "<tr>";
            $('.employee_id_value__').val(employee_id);
            $.get(url, {user_id:employee_id}, res => {
                res.forEach((val, key) => { 
                    var description_ = '-';
                    ( val.description ) ? description_ = val.description : description_; 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.name +"</td>"+
                    "<td>"+ val.amount +"</td>"+
                    "<td>"+ description_ +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_delete_employee_allowance("+val.id+")' class='btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
    }

    function _fetch_employee_deductions()
    {
        var employee_id = $('#employee_id_value').val(),
            url = $(".fetch_employee_deduction_url_").attr('href'),
            table_ = $(".employee_deduction_table_records_"),
            tbody = "<tr>";
            $('.employee_id_value___').val(employee_id);
            $.get(url, {user_id:employee_id}, res => {
                res.forEach((val, key) => { 
                    var description_ = '-';
                    ( val.description ) ? description_ = val.description : description_; 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.name +"</td>"+
                    "<td>"+ val.amount +"</td>"+
                    "<td>"+ description_ +"</td>"+
                    "<td>"+ val.start_date +"</td>"+
                    "<td>"+ val.due_date +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_delete_employee_deduction("+val.id+")' class='btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
    }

    function _delete_employee_deduction(_id)
    {
       if(_confirm_()){
        var url = $(".fetch_employee_deduction_url_").attr('href'),
            data = {id:_id, delete_employee_deduction:1};
        $.get(url, data, res => {
            _fetch_employee_deductions();
            if(response.error) _alert_error_modal();
                if(response.success) _alert_success_modal();       
        })
        .catch( err => {
                _alert_error_modal();
            });;
       }
    }

    function _delete_employee_allowance(_id)
    {
       if(_confirm_()){
        var url = $(".fetch_employee_allowance_url_").attr('href'),
            data = {id:_id, delete_employee_allowance:1};
        $.get(url, data, res => {
            _fetch_employee_allowances();
            if(response.error) _alert_error_modal();
                if(response.success) _alert_success_modal();       
        })
        .catch( err => {
                _alert_error_modal();
            });;
       }
    }
   

</script>

@stop

