<!-- Modal -->
<div class="modal" id="alert_success_modal">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="text-center modal-body">
               <p><i class="fa fa-check-circle text-success fa-4x"></i></p>
               <p class="text-muted"> SUCCESS !</p>
               <hr>
               <button type="button" class="btn btn-success btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="alert_error_modal">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="text-center modal-body">
               <p><i class="fa fa-times-circle text-danger fa-4x"></i></p>
               <p class="text-muted"> ERROR !</p>
               <hr>
               <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<button class="hide" data-toggle="modal" id='btn_alert_success_modal' data-target="#alert_success_modal" type="button"></button>
<button class="hide" data-toggle="modal" id='btn_alert_error_modal' data-target="#alert_error_modal" type="button"></button>