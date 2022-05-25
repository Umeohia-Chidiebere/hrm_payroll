<?php $user = auth()->user(); ?>
<div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto"> 
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading"> Logged in as: </li> 
                                <li>
                                    <a href="#" class="mm-active">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        {{ $user->username }}
                                    </a>
                                </li>

                                <li class="app-sidebar__heading"> Dashboard </li> 
                                <li>
                                    <a href="{{ route('dashboard')}}#" class="">
                                        <i class="metismenu-icon pe-7s-monitor"></i>
                                        Dashboard
                                    </a>
                                </li>
                                @if( $user->status == 3)
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-config"></i>
                                         Settings
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                       <!-- <li>
                                            <a href="{{ route('mda_settings') }}#">
                                                <i class="metismenu-icon"></i> MDA
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('grade_settings') }}#">
                                                <i class="metismenu-icon"></i> Grade Level
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('step_settings') }}#">
                                                <i class="metismenu-icon"></i> Steps
                                            </a>
                                        </li> -->
                                        <li>
                                            <a href="{{ route('salary_settings') }}#">
                                                <i class="metismenu-icon"></i> Salaries
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('allowance_settings') }}#">
                                                <i class="metismenu-icon"></i> Allowances
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('deduction_settings') }}#">
                                                <i class="metismenu-icon"></i> Deductions
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                @endif
    
                                <li class="app-sidebar__heading"> Modules </li>
                                @if( $user->status > 1)
                                <li>
                                            <a href="{{ route('payroll_settings') }}#">
                                                <i class="metismenu-icon pe-7s-cash"></i> Payroll
                                            </a>
                                </li>
                                <li> 
                                    <a href="{{ route('employees_page')}}#">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i> Employees
                                    </a>
                                </li>
                                <!-- <li> 
                                    <a href="{{ route('admins') }}#">
                                        <i class="metismenu-icon pe-7s-user">
                                        </i> Admins
                                    </a>
                                </li>    -->

                                <li> 
                                    <a href="{{ route('expenditure_report') }}#">
                                        <i class="metismenu-icon pe-7s-graph3">
                                        </i> Expenditures Report
                                    </a>
                                </li>
                                @endif

                                <li> 
                                    <a href="{{ route('expenditures') }}#">
                                        <i class="metismenu-icon pe-7s-graph3">
                                        </i> Expenditures
                                    </a>
                                </li>

                                <li> 
                                    <a href="{{ route('logout') }}#">
                                        <i class="metismenu-icon pe-7s-power">
                                        </i> Logout
                                    </a>
                                </li>
                        <!---
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-timer">
                                        </i> Attendance
                                    </a>
                                </li>
                                 
                                <li class="app-sidebar__heading"> Reports </li>
                                <li> 
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-server">
                                        </i> Deduction Reports
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-server">
                                        </i> Salary Reports
                                    </a>
                                </li>
                                <li> 
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-server">
                                        </i> Attendance Report
                                    </a>
                                </li> 
                        --->                      
                            </ul>
                        </div>
                    </div>
                </div>
