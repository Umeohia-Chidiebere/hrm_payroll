@extends("layouts.app")
<!-- deduction modal update -->
<div class="modal" id="_edit_modal_">
    <div class="modal-dialog" role="document">
<form action="{{route('update_deduction_settings')}}" method="post" id="update_form_data_">
    <input type="hidden" name="id" class="deduction_update_id">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Update Deduction Structure </div>
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


<!-- modal for assigning deduction items -->
<div class="modal" id="update_deduction_items_modal_">
    <div class="modal-dialog modal-xl" role="document">
<form action="{{route('update_deduction_items')}}" method="post" id="update_deduction_items_form_">
    <input type="hidden" name="deduction_id" class="update_deduction_items_id_">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Deduction Structure </div>
            <div class="text-center modal-body">
                <p class="text-muted text-left"> Organization: <span class="deduction_item_mda_name"></span> </p>
                <p class="text-muted text-left"> Department: <span class="deduction_item_grade_level_name"></span> </p>
                <p class="text-muted text-left"> Level: <span class="deduction_item_step_level_name"></span> </p>

                <section class="row"> <!--row  -->
                                                        <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                                  <input required type="text" name="name" class="form-control" placeholder="deduction Name...">
                                                              </div>
                                                          </div><!-- //col -->

                                                          <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                              <input type="text" name="description" class="form-control" placeholder="Description...">
                                                              </div>
                                                          </div><!-- //col -->

                                                          <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">                                                      
                                                              <input type="radio" id="use_percentage" value="percentage_" name="type">
                                                              <label for="use_percentage"> Use Percentage (%) </label> &nbsp;&nbsp;
                                                                                                                    
                                                              <input type="radio" id="use_amount" checked value="amount_" name="type">
                                                              <label for="use_amount"> Use Amount ({{currency()}}) </label> 
                                                              <p class="text-muted"> NB: Using Percentage automatically Calculates the Percentage amount of the Total Basic Salary</p>                                                    
                                                              </div>
                                                            
                                                          </div><!-- //col -->

                                                          <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                              <input type="number" step="any" required class="form-control" placeholder="0.00" name="amount">
                                                              </div>
                                                          </div><!-- //col -->

                                                      </section><!-- //row -->

                                                      <div class="form-group">
              <button type="submit" class="update_btn__ btn btn-success "> Save Item  </button>
              <button type="button" data-dismiss="modal" class="update_btn__ btn btn-secondary "> Close Modal </button>
              <button type="button" disabled class="update_btn__ btn btn-secondary hide"><i class="fa fa-spin fa-spinner"></i> Saving... </button>
            </div>
            </form>
                                                      <hr>

<div class="col-md-12"><!-- col -->
                                              
                                                  <section class="table-responsive">
                                                      <table class="table-bordered table-striped table-hover">
                                                          <thead class="word_no_wrap">
                                                              <tr>
                                                                  <th> # </th>
                                                                  <th> Item  </th>
                                                                  <th> Description </th>
                                                                  <th> Amount ({{currency()}})</th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="deduction_item_records_table_"></tbody>
                                                      </table>
                                                  </section>
                                                  <p class="text-center text-muted no_item_records_status hide"> You have no Records yet! </p>
                                              </div><!-- //col -->
              
            </div> <!-- //modal-body -->

         
        </div>

    </div>
</div>


@section('content')

<button class="edit_modal_btn_ hide" data-toggle="modal" data-target="#_edit_modal_"></button>
<button class="update_deduction_items_modal_btn_ hide" data-toggle="modal" data-target="#update_deduction_items_modal_"></button>

<a href="{{route('fetch_all_deductions')}}" class="hide fetch_deduction_link"></a>
<a href="{{route('delete_deduction_settings')}}" class="hide delete_deduction_link"></a>
<a href="{{route('find_single_deduction_record')}}" class="hide single_deduction_record_"></a>
<a href="{{route('fetch_deductions_item')}}" class="hide fetch_deduction_items_url_"></a>

<p class="page_title hide"> deduction Structure - Settings </p>
<section class="app-main__outer">
                    <section class="app-main__inner">  
            
                               <div class="card">
                                  <section class="card-header"> Deduction Structure Settings </section>
                                      <div class="card-body">

                                          <section class="row"> <!-- row --> 

                                              <div class="col-md-12"> <!-- col -->
                                                  <form action="{{route('store_deduction_settings')}}" id="store_deduction_settings" method="post">
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

                                                      <section class="d-flex justify-content-center">
                                                      <div class="form-group">
                                                             <button type="submit" class="btn btn-success save_btn__"> Save deduction </button>
                                                            <button disabled type="button" class="btn btn-secondary hide save_btn__"><i class="fa fa-spin fa-spinner"></i> Saving...  </button>
                                                      </div>
                                                      </section>
                    
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
                                                                  <th> Level</th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="deduction_records_"></tbody>
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
    function _edit_deduction_item_(id_)
    {
        $('.update_deduction_items_id_').val(id_);
        $('.deduction_item_grade_level_name').text( $('.'+id_+'_deduction_item_grade_level_name_text').text() );
        $('.deduction_item_mda_name').text( $('.'+id_+'_deduction_item_mda_name_text').text()  );
        $('.deduction_item_step_level_name').text( $('.'+id_+'_deduction_item_step_level_name_text').text() );
        fetch_deduction_items_record_();
        $('.update_deduction_items_modal_btn_').click();
    }

    let fetch_deduction_items_record_ = () => {
            var id__ = $('.update_deduction_items_id_').val();
            var table_ = $(".deduction_item_records_table_");
            var tbody = "<tr>";
            var link_ = $('.fetch_deduction_items_url_').attr('href');
            $.get(link_, {id:id__}, ( res ) => {
                var no_records_status = $('.no_item_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    var descr = (d = val.description) ? d : ' - ';
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.name +"</td>"+
                    "<td>"+ descr+"</td>"+
                    "<td>"+ val.amount +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_delete_deduction_item_("+val.id+")' class='delete_deduction_item_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
    
    function _delete_deduction_item_(id_)
    {
       if( _confirm_() ){
        var data = {delete_item:1, id:id_};
        var url = $("#update_deduction_items_form_").attr('action');
            $.get(url, data, res => {
                fetch_deduction_items_record_();
            })
            .catch( (err) => {
                _alert_error_modal();
            });
       }
    }

    $("#update_deduction_items_form_").submit( (e) => {
        e.preventDefault();
        var url = $("#update_deduction_items_form_").attr('action'),
            data = $('#update_deduction_items_form_').serialize();
                   $('.update_btn__').toggle();
        $.post(url, data, response => {
            if(response.error ) _alert_error_modal();
            if(response.success ) _alert_success_modal();
            fetch_deduction_items_record_();
            $('.update_btn__').toggle();
            _clear_form_data();
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

    function _edit_(id_)
    {
        _clear_form_data();
        var url = $('.single_deduction_record_').attr('href');
        $.get(url, {id:id_}, res => {
            $('.deduction_update_id').val(id_);
            $('#grade_id_').val( res.grade_id+'/'+res.mda_id).change();
            $('#step_id').val(res.step_id).change();
            $('.edit_modal_btn_').click();
        }); 
    }

    function _delete_(id_)
    {
       if(_confirm_() ){
        var link_ = $('.delete_deduction_link').attr('href');
                 $.get(link_, {id:id_}, res => {
                    _deduction_records();
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
            _deduction_records();
            $('.update_btn__').toggle();
            $('.modal').modal('hide');
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

        let _deduction_records = () => {
            var table_ = $(".deduction_records_");
            var tbody = "<tr>";
            var link_ = $('.fetch_deduction_link').attr('href');
            $.get(link_, ( res ) => {
                var no_records_status = $('.no_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td class='"+val.id+"_deduction_item_mda_name_text'>"+ val.mda.name +"</td>"+
                    "<td class='"+val.id+"_deduction_item_grade_level_name_text'>"+ val.grade.name +"</td>"+
                    "<td class='"+val.id+"_deduction_item_step_level_name_text'>"+ val.step.name +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_edit_deduction_item_("+val.id+")' class='edit_deduction_btn__ btn btn-outline-success'> deduction Items </button> &nbsp; "
                    +"<button type='button' onClick='_edit_("+val.id+")' class='edit_deduction_btn__ btn btn-outline-info'> Edit </button> &nbsp; "
                    +"<button type='button' onClick='_delete_("+val.id+")' class='delete_deduction_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
        _deduction_records();

        $('#store_deduction_settings').on('submit', (e) => {
            e.preventDefault();
            var data = $('#store_deduction_settings').serialize(),
                url = $('#store_deduction_settings').attr('action');
                $('.save_btn__').toggle();
            $.post(url, data, (response) => {
                if( response.error ) _alert_error_modal();
                if( response.success ) _alert_success_modal();
                _deduction_records();
                $('.save_btn__').toggle();
                _clear_form_data();
                _close_modal();
            })
            .catch( (err) => {
                _alert_error_modal();
                $('.save_btn__').toggle();
            });
        });
   
</script>
@stop
