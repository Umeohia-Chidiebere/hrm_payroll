@extends("layouts.app")
<!-- allowance modal update -->
<div class="modal" id="_edit_modal_">
    <div class="modal-dialog" role="document">
<form action="{{route('update_allowance_settings')}}" method="post" id="update_form_data_">
    <input type="hidden" name="id" class="allowance_update_id">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Update allowance Structure </div>
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


<!-- modal for assigning allowance items -->
<div class="modal" id="update_allowance_items_modal_">
    <div class="modal-dialog modal-xl" role="document">
<form action="{{route('update_allowance_items')}}" method="post" id="update_allowance_items_form_">
    <input type="hidden" name="allowance_id" class="update_allowance_items_id_">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Allowance Structure </div>
            <div class="text-center modal-body">
                <p class="text-muted text-left"> Organization: <span class="allowance_item_mda_name"></span> </p>
                <p class="text-muted text-left"> Department: <span class="allowance_item_grade_level_name"></span> </p>
                <p class="text-muted text-left"> Level: <span class="allowance_item_step_level_name"></span> </p>

                <section class="row"> <!--row  -->
                                                        <div class="col-md-6"><!-- col -->
                                                              <div class="form-group">
                                                                  <input required type="text" name="name" class="form-control" placeholder="Allowance Name...">
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
                                                          <tbody class="allowance_item_records_table_"></tbody>
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
<button class="update_allowance_items_modal_btn_ hide" data-toggle="modal" data-target="#update_allowance_items_modal_"></button>

<a href="{{route('fetch_all_allowances')}}" class="hide fetch_allowance_link"></a>
<a href="{{route('delete_allowance_settings')}}" class="hide delete_allowance_link"></a>
<a href="{{route('find_single_allowance_record')}}" class="hide single_allowance_record_"></a>
<a href="{{route('fetch_allowances_item')}}" class="hide fetch_allowance_items_url_"></a>

<p class="page_title hide"> allowance Structure - Settings </p>
<section class="app-main__outer">
                    <section class="app-main__inner">  
            
                               <div class="card">
                                  <section class="card-header"> allowance Structure Settings </section>
                                      <div class="card-body">

                                          <section class="row"> <!-- row --> 

                                              <div class="col-md-12"> <!-- col -->
                                                  <form action="{{route('store_allowance_settings')}}" id="store_allowance_settings" method="post">
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
                                                             <button type="submit" class="btn btn-success save_btn__"> Save Allowance </button>
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
                                                                  <th> Level </th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="allowance_records_"></tbody>
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
    function _edit_allowance_item_(id_)
    {
        $('.update_allowance_items_id_').val(id_);
        $('.allowance_item_grade_level_name').text( $('.'+id_+'_allowance_item_grade_level_name_text').text() );
        $('.allowance_item_mda_name').text( $('.'+id_+'_allowance_item_mda_name_text').text()  );
        $('.allowance_item_step_level_name').text( $('.'+id_+'_allowance_item_step_level_name_text').text() );
        fetch_allowance_items_record_();
        $('.update_allowance_items_modal_btn_').click();
    }

    let fetch_allowance_items_record_ = () => {
            var id__ = $('.update_allowance_items_id_').val();
            var table_ = $(".allowance_item_records_table_");
            var tbody = "<tr>";
            var link_ = $('.fetch_allowance_items_url_').attr('href');
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
                    +"<button type='button' onClick='_delete_allowance_item_("+val.id+")' class='delete_allowance_item_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
    
    function _delete_allowance_item_(id_)
    {
       if( _confirm_() ){
        var data = {delete_item:1, id:id_};
        var url = $("#update_allowance_items_form_").attr('action');
            $.get(url, data, res => {
                fetch_allowance_items_record_();
            })
            .catch( (err) => {
                _alert_error_modal();
            });
       }
    }

    $("#update_allowance_items_form_").submit( (e) => {
        e.preventDefault();
        var url = $("#update_allowance_items_form_").attr('action'),
            data = $('#update_allowance_items_form_').serialize();
                   $('.update_btn__').toggle();
        $.post(url, data, response => {
            if(response.error ) _alert_error_modal();
            if(response.success ) _alert_success_modal();
            fetch_allowance_items_record_();
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
        var url = $('.single_allowance_record_').attr('href');
        $.get(url, {id:id_}, res => {
            $('.allowance_update_id').val(id_);
            $('#grade_id_').val( res.grade_id+'/'+res.mda_id).change();
            $('#step_id').val(res.step_id).change();
            $('.edit_modal_btn_').click();
        }); 
    }

    function _delete_(id_)
    {
       if(_confirm_() ){
        var link_ = $('.delete_allowance_link').attr('href');
                 $.get(link_, {id:id_}, res => {
                    _allowance_records();
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
            _allowance_records();
            $('.update_btn__').toggle();
            $('.modal').modal('hide');
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

        let _allowance_records = () => {
            var table_ = $(".allowance_records_");
            var tbody = "<tr>";
            var link_ = $('.fetch_allowance_link').attr('href');
            $.get(link_, ( res ) => {
                var no_records_status = $('.no_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td class='"+val.id+"_allowance_item_mda_name_text'>"+ val.mda.name +"</td>"+
                    "<td class='"+val.id+"_allowance_item_grade_level_name_text'>"+ val.grade.name +"</td>"+
                    "<td class='"+val.id+"_allowance_item_step_level_name_text'>"+ val.step.name +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_edit_allowance_item_("+val.id+")' class='edit_allowance_btn__ btn btn-outline-success'> Allowance Items </button> &nbsp; "
                    +"<button type='button' onClick='_edit_("+val.id+")' class='edit_allowance_btn__ btn btn-outline-info'> Edit </button> &nbsp; "
                    +"<button type='button' onClick='_delete_("+val.id+")' class='delete_allowance_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
        _allowance_records();

        $('#store_allowance_settings').on('submit', (e) => {
            e.preventDefault();
            var data = $('#store_allowance_settings').serialize(),
                url = $('#store_allowance_settings').attr('action');
                $('.save_btn__').toggle();
            $.post(url, data, (response) => {
                if( response.error ) _alert_error_modal();
                if( response.success ) _alert_success_modal();
                _allowance_records();
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
