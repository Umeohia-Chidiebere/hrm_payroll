
<div class="modal" id="update_profile_modal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content"><!-- modal-content -->


            <section class=" modal-body"> <!-- modal-body -->
            
            <!-- 
                //start tab
             -->           
<div class="card">
                                            <div class="card-header-tab card-header-tab-animation card-header">
                                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-gift icon-gradient bg-love-kiss"> </i> Employee Profile </div>
                                                <ul class="nav">
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-0" class="active nav-link"> Bio-Data </a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-1" class="nav-link"> Edit  </a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-2" class="nav-link"> Allowance </a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-3" class="nav-link"> Deductions </a></li>
                                                </ul>
                                            </div>
                                           
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-eg8-0" role="tabpanel"> <!-- bio-datatab -->
                                                    @include('partials.profile_bio_data_tab')
                                                    </div> <!-- //tab -->

                                                    <!-- Edit tab -->
                                                    <div class="tab-pane" id="tab-eg8-1" role="tabpanel">
                                                        @include('partials.profile_edit_tab')
                                                    </div>
                                                    <!-- //tab -->

                                                    <!-- Allowance tab -->
                                                    <div class="tab-pane" id="tab-eg8-2" role="tabpanel">
                                                    @include('partials.profile_allowance_tab')
                                                    </div>
                                                    <!-- //tab -->
                                                    <!-- tab -->
                                                    <div class="tab-pane" id="tab-eg8-3" role="tabpanel">
                                                    @include('partials.profile_deduction_tab')
                                                    </div>
                                                    <!-- //tab -->
                                                </div>
                                            </div>
            
                            </div>
                        
             <!-- 

             ///end atb
              -->

            </section> <!-- modal-body -->



            <div class="modal-footer"> <!-- modal-footer -->
               <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Close Modal </button>
            </div> <!-- //modal-footer -->

        </div><!-- //modal-content -->
    </div> <!-- //modal-dialog -->
</div>



