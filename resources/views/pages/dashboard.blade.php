@extends("layouts.app")
@section('content')
<p class="page_title hide"> Dashboard - Stats Overview  </p>

<div class="app-main__outer">
                <div class="app-main__inner">
                         
                    <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"> Total Staff </div>
                                                <div class="widget-subheading"> Total Staff </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"> {{ $total_employees }} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"> Total Paid Salaries </div>
                                                <div class="widget-subheading"> {{ date('M, Y') }} </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"> {{ currency() }} {{ number_format( $total_monthly_paid_salaries) }} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- //row -->



                        <div class="row"> <!-- row -->
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Monthly Expenditures Overview ({{ date('M, Y') }}) </div>
                                    <div class="table-responsive">
                                        <table class="text-center align-middle mb-0 table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th> Organization </th>
                                                <th> Total Approved Expenditures </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $monthly_mda_expenditures as $mda_expenditure )
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"> {{ $mda_expenditure->name }} </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>                                         
                                                <td class="text-center">
                                                    <span class="text-info"><b> {{ currency() }} {{ number_format($mda_expenditure->expenditure->sum('amount') ), 2 }} </b></span>
                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                
                                </div>
                            </div>
                        </div>



                        <div class="row"> <!-- row -->
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header"> Organization STATS
                                    </div>
                                    <div class="table-responsive">
                                        <table class="text-center align-middle mb-0 table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th> Organization </th>
                                                <th> Total Staff </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $mdas as $mda)
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$mda->name}} </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                <td class="text-center">
                                                    <div class="badge badge-warning"> {{ $mda->user->count() }} </div>
                                                </td>
                                                
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                
                                </div>
                            </div>
                        </div>


                        
                        <div class="row"> <!-- row -->
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            {{ date('Y') }} - Salary Report Overview 
                                        </div>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                                    <div class="widget-chat-wrapper-outer">
                                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                            <canvas id="canvas_1"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
</div> <!-- //row -->






<div class="row"> <!-- row -->
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            {{ date('Y') }} - Expenditure Report Overview 
                                        </div>
                                       
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                                    <div class="widget-chat-wrapper-outer">
                                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                            <canvas id="canvas_2"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
</div> <!-- //row -->


                                               </div>
                    </div>

@stop

