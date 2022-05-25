$(function(){
    $('#preloader').fadeOut('1000', function () {
        $(this).remove();
   });

    $(".app-sidebar__heading").addClass("text-muted");
    $(".metismenu-icon").css("font-weight","1000");

    window._alert_error_modal =  function(){
        $('#btn_alert_error_modal').click();
    }
    window._alert_success_modal =  function(){
        $('#btn_alert_success_modal').click();
    }
    window._confirm_ =  function( $msg = "Please, Confirm this Activity... "){
        return confirm($msg);
    }
    window._clear_form_data =  function(){
        $(".form-control").val('');
    }
    window._close_modal =  function(){ 
        setTimeout( () => {
            $(".close_modals__").click();
        }, 3500);
    }
    window._open_modal =  function( modal_target_id){
        $("#"+modal_target_id).modal('show');
    }
    $('.modal').on('show.bs.modal', function(e) {
        window.location.hash = "modal";
    });
    $(window).on('hashchange', function (event) {
        if(window.location.hash != "#modal") {
            $('.modal').modal('hide');
        }
    });
    window.print_docs = (url_) => {
        var new_window = window.open(url_,"_blank","height=600,width=1000");
				setTimeout(function(){
					new_window.print()
					setTimeout(function(){
						new_window.close()
						},500)
				},1000)
    }

});


