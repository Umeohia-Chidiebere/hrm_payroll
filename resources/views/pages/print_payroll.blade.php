<!DOCTYPE html>
<?php
 $payroll = $payroll_items[0]->payroll;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payroll List - {{ $payroll->from }} - {{ $payroll->to }} </title>
    <link href="{{asset('app_theme.css')}}" rel="stylesheet">
</head>
<style>
body{
    zoom: 80%;
}
table{ width:100%;}
th,td{padding:5px;}
</style>
<body>
<hr>
<p class="hell"> <b>Payroll Ref ID: {{ $payroll->id }} </b></p>
<p class="text-muted"> <b> Total Net Salary:  {{currency()}} {{ number_format( $payroll_items->sum('net_salary'), 2 ) }} </b> </p>
<hr>
<section class="table-responsive">
                                              <table class="datatable_ table-hover table-bordered table-striped">
                                                  <thead class="word_no_wrap">
                                                      <tr>
                                                          <th> Emp No. </th>
                                                          <th> Name</th>
                                                          <th> Organization </th>
                                                          <th> Department </th>
                                                          <th> Level </th>
                                                          <th> Bank </th>
                                                          <th> Acct No.</th>
                                                          <th> Basic Salary ({{currency()}}) </th>
                                                          <th> Total Allowances ({{currency()}}) </th>
                                                          <th> Total Deductions ({{currency()}}) </th>
                                                          <th> Net Salary ({{currency()}}) </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach( $payroll_items as $payroll_item )
                                                      <tr>
                                                          <td> {!! $payroll_item->user->staff_id_card_no !!} </td>
                                                          <td> {!! $payroll_item->user->lastname.' '.$payroll_item->user->firstname.' '.$payroll_item->user->other_name !!} </td>
                                                          <td> {{ $payroll_item->mda->name }} </td>
                                                          <td> {{ $payroll_item->grade->name }} </td>
                                                          <td> {{ $payroll_item->step->name }} </td>
                                                          <td> {{ $payroll_item->bank->name }} </td>
                                                          <td> {{ $payroll_item->user->account_number }} </td>
                                                          <td> {{ number_format( $payroll_item->basic_salary, 2 ) }} </td>
                                                          <td> {{ number_format( $payroll_item->total_general_allowance + $payroll_item->total_personal_allowance, 2 )  }} </td>
                                                          <td> {{ number_format( $payroll_item->total_general_deduction + $payroll_item->total_personal_deduction, 2 )  }}  </td>
                                                          <td> {{ number_format( $payroll_item->net_salary , 2 )}} </td>
                                                      </tr>
                                                    @endforeach
                                                  </tbody>
                                              </table>
                                            </section>

</body>

</html>
