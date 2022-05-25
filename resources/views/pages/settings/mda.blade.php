@extends("layouts.app")

<div class="modal" id="_edit_modal_">
    <div class="modal-dialog" role="document">
<form action="{{route('update_mda_settings')}}" method="post" id="update_form_data_">
    <input type="hidden" name="id" class="mda_update_id">
    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
    @csrf()
        <div class="modal-content">
            <div class="modal-header"> Update MDA </div>
            <div class="text-center modal-body">
              <input type="text" required class="form-control mda_update_value" name="name">
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
<a href="{{route('fetch_all_mdas')}}" class="hide fetch_mda_link"></a>
<a href="{{route('delete_mda_settings')}}" class="hide delete_mda_link"></a>
<a href="{{route('find_single_mda_record')}}" class="hide single_mda_record_"></a>

<p class="page_title hide"> MDA - Settings </p>
<section class="app-main__outer">
                    <section class="app-main__inner">  
            
                               <div class="card">
                                  <section class="card-header"> MDA Settings </section>
                                      <div class="card-body">

                                          <section class="row"> <!-- row -->

                                              <div class="col-md-12"> <!-- col -->
                                                  <form action="{{route('store_mda_settings')}}" id="store_mda_settings" method="post">
                                                      @csrf()
                                                   <div class="input-group">
                                                       <input type="text" required placeholder="name of MDA..." name="name" class="form-control">
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
                                                                  <th> MDA </th>
                                                                  <th> Created By </th>
                                                                  <th> Actions </th>
                                                              </tr>
                                                          </thead>
                                                          <tbody class="mda_records_"></tbody>
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
        var url = $('.single_mda_record_').attr('href');
        $.get(url, {id:id_}, res=> {
            $('.mda_update_id').val(id_);
            $('.mda_update_value').val(res.name);
            $('.edit_modal_btn_').click();
        }); 
    }

    function _delete_(id_)
    {
       if(_confirm_() ){
        var link_ = $('.delete_mda_link').attr('href');
                 $.get(link_, {id:id_}, res => {
                    _mda_records();
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
            _mda_records();
            $('.update_btn__').toggle();
        })
        .catch( () => {
            _alert_error_modal();
            $('.update_btn__').toggle();
        });
    });

        let _mda_records = () => {
            var table_ = $(".mda_records_");
            var tbody = "<tr>";
            var link_ = $('.fetch_mda_link').attr('href');
            $.get(link_, ( res ) => {
                var no_records_status = $('.no_records_status');
                ( res.length ) ? no_records_status.hide() : no_records_status.show() ;
                res.forEach((val, key) => { 
                    tbody+=
                    "<td>"+Number(key+1) +"</td>"+
                    "<td>"+ val.name +"</td>"+
                    "<td>"+ val.created_by.username +"</td>"+
                    "<td class='word_no_wrap'>"  
                    +"<button type='button' onClick='_edit_("+val.id+")' class='edit_mda_btn__ btn btn-outline-info'> Edit </button> &nbsp; "
                    +"<button type='button' onClick='_delete_("+val.id+")' class='delete_mda_btn__ btn btn-outline-danger'> Delete </button> "+
                    "</td>"+
                    "</tr>";
                });
                table_.html(tbody);
            });
        }
        _mda_records();

        $('#store_mda_settings').on('submit', (e) => {
            e.preventDefault();
            var data = $('#store_mda_settings').serialize(),
                url = $('#store_mda_settings').attr('action');
                $('.save_btn__').toggle();
            $.post(url, data, (response) => {
                if( response.error ) _alert_error_modal();
                if( response.success ) _alert_success_modal();
                _mda_records();
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
