</div>
<div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                    
                                </div>
                                <div class="app-footer-right">
                                   
                                </div>
                            </div>
                        </div>
                    </div>   
                    

<script>
    $( function() {
        var title_ = $('.page_title').text();
        document.title = title_;
        
        $(".logo-src").html("<img src='/assets/images/logo.png' class='img-thumbnail'>");
        $('#datatable_,.datatable_').DataTable({
             responsive:true,
             pageLength:100,
             lengthMenu: [[100, 200, 500, -1], [ 100, 200, 500, 'All']], 
        });
    });
</script>


