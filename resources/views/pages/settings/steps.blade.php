@extends("layouts.app")

<div class="modal" id="_edit_modal_">
    <div class="modal-dialog" role="document">
<form action="{{route('update_step_settings')}}" method="post" id="update_form_data_">
    <input type="hidden" name="id" class="step_update_id">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Update Step Levels </div>
            <div class="text-center modal-body">
              <input type="text" required class="form-control step_update_value" name="name">
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
<a href="{{route('fetch_all_steps')}}" class="hide fetch_step_link"></a>
<a href="{{route('delete_step_settings')}}" class="hide delete_step_link"></a>
<a href="{{route('find_single_step_record')}}" class="hide single_step_record_"></a>

<p class="page_title hide"> Step Level - Settings </p>
<section class="app-main__outer">
                    <section class="app-main__inner">  
            
                               <div class="card">
                                  <section class="card-header"> Step Level Settings </section>
                                      <div class="card-body">

                                          <section class="row"> <!-- row -->

                                              <div class="col-md-12"> <!-- col -->
                                                  <form action="{{route('store_step_settings')}}" id="store_step_settings" method="post">
                                                      @csrf()
                                                   <div class="input-group">
                                                       <input type="text" required placeholder="name of step..." name="name" class="form-control">
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
                                                                  <th> step </th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="step_records_"></tbody>
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
        var url = $('.single_step_record_').attr('href');
        $.get(url, {id:id_}, res=> {
            $('.step_update_id').val(id_);
            $('.step_update_value').val(res.name);
            $('.edit_modal_btn_').click();
        }); 
    }

    function _delete_(id_)
    {
       if(_confirm_() ){
        var link_ = $('.delete_step_link').attr('href');
                 $.get(link_, {id:id_}, res => {
                    _step_records();
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
            _step_records();
            $('.update_btn__').toggle();
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

        let _step_records = () => {
            var table_ = $(".step_records_");
            var tbody = "<tr>";
            var link_ = $('.fetch_step_link').attr('href');
            $.get(link_, ( res ) => {
                var no_records_status = $('.no_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.name +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_edit_("+val.id+")' class='edit_step_btn__ btn btn-outline-info'> Edit </button> &nbsp; "
                    +"<button type='button' onClick='_delete_("+val.id+")' class='delete_step_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
        _step_records();

        $('#store_step_settings').on('submit', (e) => {
            e.preventDefault();
            var data = $('#store_step_settings').serialize(),
                url = $('#store_step_settings').attr('action');
                $('.save_btn__').toggle();
            $.post(url, data, (response) => {
                if( response.error ) _alert_error_modal();
                if( response.success ) _alert_success_modal();
                _step_records();
                $('.save_btn__').toggle();
                $('.form-control').val('');
            })
            .catch( (err) => {
                _alert_error_modal();
                $('.save_btn__').toggle();
            });
        });

   
</script>
@stop
