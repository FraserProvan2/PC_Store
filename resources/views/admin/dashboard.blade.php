@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="content-wrapper">
    <h3>
        <div class="pull-right text-center">
        </div>Dashboard
    </h3>
    <div class="row">
        <!--Income-->
        <div class="col-md-4">
            <div data-toggle="play-animation" class="panel widget">
                <div class="panel-body">
                    <div class="row row-table row-flush">
                        <div class="col-lg-12">
                            <p class="mb3">Income (Last 30 Days)</p>
                            <h2 class="mb6">£150</h2>
                        </div>
                        <div class="col-xs-4 text-right">
                            <em class="fa fa-credit-card-alt fa-3x"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <!--Orders-->
            <div class="panel widget bg-inverse">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 bg-primary">
                        <div class="p-lg">
                            <div class="h5 mt0">Orders (Last 30 Days)</div>
                            <!-- Line chart-->
                            <div data-type="line" data-height="60" data-width="100%" data-line-width="2"
                                data-line-color="#dddddd" data-spot-color="#bbbbbb" data-fill-color=""
                                data-highlight-line-color="#fff" data-spot-radius="3" data-resize="true"
                                data-values="[1,5,3,6,5,8,2,4,5,7,9,6,4,3,6,5,9,2,2,4,5,7,9,6,4,3,6,5,9,2]"
                                class="inlinesparkline sparkline"></div>
                            {{-- <!-- Bar chart-->
                            <div class="text-center">
                                <div data-bar-color="#fff" data-height="60" data-bar-width="8" data-bar-spacing="6"
                                    data-values="[1,5,3,6,5,8,2,4,5,7,9,6,4,3,6,5,9,2]" class="inlinesparkline inline"></div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- END widget-->
        </div>
    </div>
    <div class="row">
        <section class="col-md-12">
            <div class="row">
                <!--Total Customers-->
                <div class="col-md-4">
                    <div data-toggle="play-animation" class="panel widget">
                        <div class="panel-body ">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">Total Customers</p>
                                    <h3 class="m0">150</h3>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <em class="fa fa-users fa-2x"></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Builds Sold-->
                    <div data-toggle="play-animation" class="panel widget">
                        <div class="panel-body ">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">Builds Sold (Last 30 Days)</p>
                                    <h3 class="m0">150</h3>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <em class="fa fa-truck fa-2x"></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--Components Sold-->
                    <div data-toggle="play-animation" class="panel widget">
                        <div class="panel-body ">
                            <div class="row row-table row-flush">
                                <div class="col-xs-8">
                                    <p class="mb0">Components Sold (Last 30 Days)</p>
                                    <h3 class="m0">150</h3>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <em class="fa fa-truck fa-2x"></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
       
            </div>
            <!-- END chart-->
        </section>
        <!-- END dashboard main content-->
    </div>
</div>

@endsection