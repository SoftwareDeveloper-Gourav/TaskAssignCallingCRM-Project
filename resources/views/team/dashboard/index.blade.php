{{-- @include('admin.dashboard.header') --}}
 @include('team.dashboard.header')
 @extends('team.dashboard.header')

  @push('title')
      <title>Dashboard</title>
  @endpush
         
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                                My Customer/ Client
                                            </p>
                                            <h4 class="my-1">{{$work}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                          
                                               
                                                ><a href="{{route('team.customer')}}">Show Details</a>
                                            </p>
                                        </div>
                                        <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                           <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart1"></div>
                                </div>
                            </div>
                            
                        </div>
                          <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                               Total Email Send
                                            </p>
                                            <h4 class="my-1">{{$email_send_cound}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                          
                                               
                                                ><a href="{{route('team.email')}}">Show Details</a>
                                            </p>
                                        </div>
                                        <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart1"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                               Total SMS Send
                                            </p>
                                            <h4 class="my-1">{{$sms_count}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                          
                                               
                                                ><a href="{{route('team.sms')}}">Show Details</a>
                                            </p>
                                        </div>
                                        <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart1"></div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    <!--end row-->
                 
                    <!--end row-->
                 
                    <!--end row-->
                  
                    <!--end row-->
                
                    <!--end row-->
              
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"
                ><i class="bx bxs-up-arrow-alt"></i
            ></a>

            @include('team.dashboard.footer')
          