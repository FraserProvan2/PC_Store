@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- <div class="content-wrapper">
            <h3>
               <div class="pull-right text-center">
                  <div class="text-sm mb-sm">500 ratings</div>
                  <div data-bar-color="#cfdbe2" data-height="18" data-bar-width="3" data-bar-spacing="2" data-values="[2,3,4,7,5,7,8,9,5,7,8,4,7]" class="inlinesparkline"></div>
               </div>Dashboard
               <small>Hi, User. Welcome back!</small>
            </h3>
            <div data-toggle="notify" data-onload data-message="&lt;b&gt;This is notify!&lt;/b&gt; Dismiss with a click or wait for it to disappear." data-options="{&quot;status&quot;:&quot;warning&quot;, &quot;pos&quot;:&quot;bottom-right&quot;}" class="hidden-xs"></div>
            <div class="row">
               <!-- START dashboard main content-->
               <section class="col-md-9">
                  <!-- START chart-->
                  <div class="row">
                     <div class="col-lg-12">
                        <!-- START widget-->
                        <div class="panel widget bg-inverse">
                           <div class="row">
                              <div class="col-lg-2 col-sm-3 text-right">
                                 <div class="row">
                                    <div class="col-sm-12 col-xs-4">
                                       <div class="ph">
                                          <p class="h3 mb0">11200</p>
                                          <p class="m0 text-muted">Visits</p>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-4">
                                       <div class="ph">
                                          <p class="h3 mb0">2000</p>
                                          <p class="m0 text-muted">Likes</p>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-4">
                                       <div class="ph">
                                          <p class="h3 mb0">3500</p>
                                          <p class="text-muted">Subscriptions</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-10 col-sm-9 bg-primary">
                                 <div class="p-lg">
                                    <div class="h5 mt0">Latest stadistics</div>
                                    <!-- Line chart-->
                                    <div data-type="line" data-height="100" data-width="100%" data-line-width="2" data-line-color="#dddddd" data-spot-color="#bbbbbb" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-resize="true"
                                    data-values="[1,5,3,6,5,11,2,4,5,7,9,6,4]" class="inlinesparkline sparkline"></div>
                                    <!-- Bar chart-->
                                    <div class="text-center">
                                       <div data-bar-color="#fff" data-height="60" data-bar-width="8" data-bar-spacing="6" data-values="[1,5,3,6,5,8,2,4,5,7,9,6,4,3,6,5,9,2]" class="inlinesparkline inline"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- END widget-->
                     </div>
                  </div>
                  <!-- END chart-->
                  <div class="row">
                     <div class="col-md-4">
                        <!-- START widget-->
                        <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="100" class="panel widget">
                           <div class="panel-body bg-primary">
                              <div class="row row-table row-flush">
                                 <div class="col-xs-8">
                                    <p class="mb0">Connections</p>
                                    <h3 class="m0">150</h3>
                                 </div>
                                 <div class="col-xs-4 text-right">
                                    <em class="fa fa-share-alt fa-2x"></em>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-body">
                              <!-- Bar chart-->
                              <div class="text-center">
                                 <div data-width="100%" data-resize="true" data-bar-color="primary" data-height="30" data-bar-width="6" data-bar-spacing="6" data-values="[5,3,4,6,5,9,4,4,10,5,9,6,4]" class="inlinesparkline"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <!-- START widget-->
                        <div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget">
                           <div class="panel-body bg-success">
                              <div class="row row-table row-flush">
                                 <div class="col-xs-8">
                                    <p class="mb0">Uploads</p>
                                    <h3 class="m0">540</h3>
                                 </div>
                                 <div class="col-xs-4 text-right">
                                    <em class="fa fa-cloud-upload fa-2x"></em>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-body">
                              <!-- Bar chart-->
                              <div class="text-center">
                                 <div data-width="100%" data-resize="true" data-bar-color="success" data-height="30" data-bar-width="6" data-bar-spacing="6" data-values="[10,30,40,70,50,90,70,50,90,40,40,60,40]" class="inlinesparkline"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <!-- START widget-->
                        <div data-toggle="play-animation" data-play="fadeInRight" data-offset="0" data-delay="100" class="panel widget">
                           <div class="panel-body bg-danger">
                              <div class="row row-table row-flush">
                                 <div class="col-xs-8">
                                    <p class="mb0">Ratings</p>
                                    <h3 class="m0">7000</h3>
                                 </div>
                                 <div class="col-xs-4 text-right">
                                    <em class="fa fa-star fa-2x"></em>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-body">
                              <!-- Bar chart-->
                              <div class="text-center">
                                 <div data-width="100%" data-resize="true" data-bar-color="danger" data-height="30" data-bar-width="6" data-bar-spacing="6" data-values="[2,7,5,9,4,2,7,5,7,5,9,6,4]" class="inlinesparkline"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- START messages and activity-->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <div class="pull-right label label-danger">5</div>
                              <div class="pull-right label label-success">12</div>
                              <div class="panel-title">Messages</div>
                           </div>
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- START list group item-->
                              <a href="#" class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <img src="{{ asset('admin_site/app/img/user/01.jpg') }}" alt="Image" class="media-object img-circle thumb48">
                                    </div>
                                    <div class="media-body clearfix">
                                       <small class="pull-right">2h</small>
                                       <strong class="media-heading text-primary">
                                          <span class="circle circle-success circle-lg text-left"></span>Jean Daniels</strong>
                                       <p class="mb-sm">
                                          <small>Cras sit amet nibh libero, in gravida nulla. Nulla...</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <a href="#" class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <img src="{{ asset('admin_site/app/img/user/04.jp') }}" alt="Image" class="media-object img-circle thumb48">
                                    </div>
                                    <div class="media-body clearfix">
                                       <small class="pull-right">3h</small>
                                       <strong class="media-heading text-primary">
                                          <span class="circle circle-success circle-lg text-left"></span>Alexis Wright</strong>
                                       <p class="mb-sm">
                                          <small>Cras sit amet nibh libero, in gravida nulla. Nulla facilisi.</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <a href="#" class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <img src="{{ asset('admin_site/app/img/user/03.jpg') }}" alt="Image" class="media-object img-circle thumb48">
                                    </div>
                                    <div class="media-body clearfix">
                                       <small class="pull-right">4h</small>
                                       <strong class="media-heading text-primary">
                                          <span class="circle circle-danger circle-lg text-left"></span>Lance Simpson</strong>
                                       <p class="mb-sm">
                                          <small>Cras sit amet nibh libero, in gravida nulla. Nulla...</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <a href="#" class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <img src="{{ asset('admin_site/app/img/user/06.jpg') }}" alt="Image" class="media-object img-circle thumb48">
                                    </div>
                                    <div class="media-body clearfix">
                                       <small class="pull-right">4h</small>
                                       <strong class="media-heading text-primary">
                                          <span class="circle circle-danger circle-lg text-left"></span>Krin Price</strong>
                                       <p class="mb-sm">
                                          <small>Vestibulum pretium aliquam scelerisque.</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <a href="#" class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <img src="{{ asset('admin_site/app/img/user/06.jpg') }}" alt="Image" class="media-object img-circle thumb48">
                                    </div>
                                    <div class="media-body clearfix">
                                       <small class="pull-right">4h</small>
                                       <strong class="media-heading text-primary">
                                          <span class="circle circle-lg text-left"></span>Johnny Gilbert</strong>
                                       <p class="mb-sm">
                                          <small>Sed egestas, augue vitae blandit imperdiet, justo neque tincidunt sapien...</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- END list group item-->
                           </div>
                           <!-- END list group-->
                           <!-- START panel footer-->
                           <div class="panel-footer clearfix">
                              <div class="input-group">
                                 <input type="text" placeholder="Search message .." class="form-control input-sm">
                                 <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i>
                                    </button>
                                 </span>
                              </div>
                           </div>
                           <!-- END panel-footer-->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <div class="panel-title">News feed</div>
                           </div>
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- START list group item-->
                              <div class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <span class="fa-stack fa-lg">
                                          <em class="fa fa-circle fa-stack-2x text-purple"></em>
                                          <em class="fa fa-cloud-upload fa-stack-1x fa-inverse text-white"></em>
                                       </span>
                                    </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading text-purple m0">NEW FILE</div>
                                       <small class="text-muted pull-right">15 minutes ago</small>
                                       <p class="m0">
                                          <small>A new uploaded file<a href="#">Bootstrap.xls</a> is now on the cloud</small>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <span class="fa-stack fa-lg">
                                          <em class="fa fa-circle fa-stack-2x text-info"></em>
                                          <em class="fa fa-file-text-o fa-stack-1x fa-inverse text-white"></em>
                                       </span>
                                    </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading text-info m0">NEW DOCUMENT</div>
                                       <small class="text-muted pull-right">2 hours ago</small>
                                       <p class="m0">
                                          <small>New document<a href="#">Bootstrap.doc</a> created</small>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <span class="fa-stack fa-lg">
                                          <em class="fa fa-circle fa-stack-2x text-danger"></em>
                                          <em class="fa fa-exclamation fa-stack-1x fa-inverse text-white"></em>
                                       </span>
                                    </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading text-danger m0">IMPORTANT MESSAGE</div>
                                       <small class="text-muted pull-right">5 hours ago</small>
                                       <p class="m0">
                                          <small>Todd Walker sent you an important messsage.<a href="#">Open</a>
                                          </small>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <span class="fa-stack fa-lg">
                                          <em class="fa fa-circle fa-stack-2x text-success"></em>
                                          <em class="fa fa-clock-o fa-stack-1x fa-inverse text-white"></em>
                                       </span>
                                    </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading text-success m0">NEW MEETING</div>
                                       <small class="text-muted pull-right">15 hours ago</small>
                                       <p class="m0">
                                          <small>Roberta Lane added a new meeting.
                                             <em>Hey Guys! Want to see there tomorrow. We have good new to share with you. Cheers!</em>
                                          </small>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END list group item-->
                              <!-- START list group item-->
                              <div class="list-group-item">
                                 <div class="media">
                                    <div class="pull-left">
                                       <span class="fa-stack fa-lg">
                                          <em class="fa fa-circle fa-stack-2x text-warning"></em>
                                          <em class="fa fa-envelope-o fa-stack-1x fa-inverse text-white"></em>
                                       </span>
                                    </div>
                                    <div class="media-body clearfix">
                                       <div class="media-heading text-warning m0">ANOTHER MESSAGE</div>
                                       <small class="text-muted pull-right">last week</small>
                                       <p class="m0">
                                          <small>Estela Soccer sent you a messsage. Quisque viverra faucibus neque, quis elementum velit vulputate et.</small>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- END list group item-->
                           </div>
                           <!-- END list group-->
                           <!-- START panel footer-->
                           <div class="panel-footer clearfix">
                              <a href="#" class="pull-left">
                                 <small>Load more</small>
                              </a>
                           </div>
                           <!-- END panel-footer-->
                        </div>
                     </div>
                  </div>
                  <!-- END messages and activity-->
               </section>
               <!-- END dashboard main content-->
               <!-- START dashboard sidebar-->
               <aside class="col-md-3">
                  <!-- START widget-->
                  <div class="panel widget">
                     <div class="panel-body bg-success text-center">
                        <p>
                           <img src="{{ asset('admin_site/app/img/user/08.jpg') }}" alt="" class="img-circle thumb64">
                        </p>
                        <p>
                           <strong>Carrie Daniels</strong>
                           <span>is now following you</span>
                        </p>
                     </div>
                  </div>
                  <!-- END widget-->
                  <!-- START Secondary Widgets-->
                  <!-- START widget-->
                  <div class="panel widget">
                     <div class="panel-body">
                        <div class="text-right text-muted">
                           <em class="fa fa-globe fa-2x"></em>
                        </div>
                        <h3 class="mt0">50.5 Gb</h3>
                        <p class="text-muted">Traffic this month</p>
                        <div class="progress progress-striped progress-xs">
                           <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-purple progress-50">
                              <span class="sr-only">50% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END widget-->
                  <!-- START widget-->
                  <div class="panel widget">
                     <div class="panel-body">
                        <div class="text-right text-muted">
                           <em class="fa fa-gamepad fa-2x"></em>
                        </div>
                        <h3 class="mt0">99.999</h3>
                        <p class="text-muted">Games played last month</p>
                        <div class="progress progress-striped progress-xs">
                           <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-warning progress-60">
                              <span class="sr-only">60% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END widget-->
                  <!-- START widget-->
                  <div class="panel widget">
                     <div class="panel-body">
                        <div class="text-right text-muted">
                           <em class="fa fa-coffee fa-2x"></em>
                        </div>
                        <h3 class="mt0">300</h3>
                        <p class="text-muted">Coffee cups per day</p>
                        <div class="progress progress-striped progress-xs">
                           <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-green progress-80">
                              <span class="sr-only">80% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END widget-->
                  <!-- START widget-->
                  <div class="panel widget">
                     <div class="panel-body">
                        <div class="text-right text-muted">
                           <em class="fa fa-upload fa-2x"></em>
                        </div>
                        <h3 class="mt0">1000 Gb</h3>
                        <p class="text-muted">Average Monthly Uploads</p>
                        <div class="progress progress-striped progress-xs">
                           <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-info progress-40">
                              <span class="sr-only">40% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- END widget-->
                  <!-- END Secondary Widgets-->
               </aside>
               <!-- END dashboard sidebar-->
            </div>
    </div> --}}
dashboard
@endsection