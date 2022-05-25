@extends("layouts.app")

<div class="modal" id="_edit_modal_">
    <div class="modal-dialog" role="document">
<form action="{{route('update_salary_settings')}}" method="post" id="update_form_data_">
    <input type="hidden" name="id" class="salary_update_id">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Update Salary Structure </div>
            <div class="text-center modal-body">
                <section class="row"> <!--row  -->
                                                          <div class="col-md-12"><!-- col -->
                                                              <div class="form-group">
                                                                  @include('partials.all_grades')
                                                              </div>
                                                          </div><!-- //col -->

                                                          <div class="col-md-12"><!-- col -->
                                                              <div class="form-group">
                                                                  @include('partials.all_steps')
                                                              </div>
                                                          </div><!-- //col -->

                                                          <div class="col-md-12"><!-- col -->
                                                              <div class="form-group">
                                                              <input type="number" step="any" required class="form-control salary_update_value" name="amount">
                                                              </div>
                                                          </div><!-- //col -->

                                                      </section><!-- //row -->
              
            </div>
            <div class="modal-footer">
              <button type="submit" class="update_btn__ btn btn-success btn-block"> Update </button>
              <button type="button" disabled class="update_btn__ btn btn-secondary btn-block hide"><i class="fa fa-spin fa-spinner"></i> Updating... </button>
            </div>
        </div>
</form>
    </div>
</div>

@section('content')

<button class="edit_modal_btn_ hide" data-toggle="modal" data-target="#_edit_modal_"></button>
<a href="{{route('fetch_all_salarys')}}" class="hide fetch_salary_link"></a>
<a href="{{route('delete_salary_settings')}}" class="hide delete_salary_link"></a>
<a href="{{route('find_single_salary_record')}}" class="hide single_salary_record_"></a>

<p class="page_title hide"> Salary Structure - Settings </p>
<section class="app-main__outer">
                    <section class="app-main__inner">  
            
                               <div class="card">
                                  <section class="card-header"> Salary Structure Settings </section>
                                      <div class="card-body">

                                          <section class="row"> <!-- row --> 

                                              <div class="col-md-12"> <!-- col -->
                                                  <form action="{{route('store_salary_settings')}}" id="store_salary_settings" method="post">
                                                      @csrf()
                                                      <section class="row"> <!--row  -->

                                                          <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                                  @include('partials.all_grades')
                                                              </div>
                                                          </div><!-- //col -->

                                                          <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                                  @include('partials.all_steps')
                                                              </div>
                                                          </div><!-- //col -->

                                                      </section><!-- //row -->
                                                   <div class="input-group">
                                                       <input type="number" step="any" required placeholder="Amount..." name="amount" class="form-control">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-success save_btn__"> Save </button>
                                                            <button disabled type="button" class="btn btn-secondary hide save_btn__"><i class="fa fa-spin fa-spinner"></i> Saving...  </button>
                                                        </div>
                                                    </div>
                                                </form>
                                              </div> <!-- //col -->

                                              <div class="col-md-12"><!-- col -->
                                              <hr>
                                                  <section class="table-responsive">
                                                      <table class="table-bordered table-striped table-hover">
                                                          <thead class="word_no_wrap">
                                                              <tr>
                                                                  <th> # </th>
                                                                  <th> Organization </th>
                                                                  <th> Department </th>
                                                                  <th> Level </th>
                                                                  <th> Salary ({{currency()}}) </th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="salary_records_"></tbody>
                                                      </table>
                                                  </section>
                                                  <p class="text-center text-muted no_records_status hide"> You have no Records yet! </p>
                                              </div><!-- //col -->

                                          </section> <!-- //row -->

                                       </div>
                                </div>

                    </section>
</section>

<script>
    function _edit_(id_)
    {
        _clear_form_data();
        var url = $('.single_salary_record_').attr('href');
        $.get(url, {id:id_}, res=> {
            $('.salary_update_id').val(id_);
            $('.salary_update_value').val(res.amount);
            $('#grade_id_').val( res.grade_id+'/'+res.mda_id).change();
            $('#step_id').val(res.step_id).change();
            $('.edit_modal_btn_').click();
        }); 
    }

    function _delete_(id_)
    {
       if(_confirm_() ){
        var link_ = $('.delete_salary_link').attr('href');
                 $.get(link_, {id:id_}, res => {
                    _salary_records();
                 })
                 .catch( () => {
                     _alert_error_modal();
                 });
        }
    }

    $("#update_form_data_").submit( (e) => {
        e.preventDefault();
        var url = $("#update_form_data_").attr('action'),
            data = $('#update_form_data_').serialize();
                   $('.update_btn__').toggle();
        $.post(url, data, response => {
            if(response.error ) _alert_error_modal();
            if(response.success ) _alert_success_modal();
            _salary_records();
            $('.update_btn__').toggle();
            $('.modal').modal('hide');
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

        let _salary_records = () => {
            var table_ = $(".salary_records_");
            var tbody = "<tr>";
            var link_ = $('.fetch_salary_link').attr('href');
            $.get(link_, ( res ) => {
                var no_records_status = $('.no_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.mda.name +"</td>"+
                    "<td>"+ val.grade.name +"</td>"+
                    "<td>"+ val.step.name +"</td>"+
                    "<td>"+ val.amount +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_edit_("+val.id+")' class='edit_salary_btn__ btn btn-outline-info'> Edit </button> &nbsp; "
                    +"<button type='button' onClick='_delete_("+val.id+")' class='delete_salary_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
        _salary_records();

        $('#store_salary_settings').on('submit', (e) => {
            e.preventDefault();
            var data = $('#store_salary_settings').serialize(),
                url = $('#store_salary_settings').attr('action');
                $('.save_btn__').toggle();
            $.post(url, data, (response) => {
                if( response.error ) _alert_error_modal();
                if( response.success ) _alert_success_modal();
                _salary_records();
                $('.save_btn__').toggle();
                _clear_form_data();
            })
            .catch( (err) => {
                _alert_error_modal();
                $('.save_btn__').toggle();
            });
        });
   
</script>
@stop
