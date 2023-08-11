{{-- @include('admin.dashboard.header') --}}
 @include('admin.dashboard.header')
 @extends('admin.dashboard.header')

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
                                                Total Team Member
                                            </p>
                                            <h4 class="my-1">{{$team_member}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                            >
                                                <i
                                                    class="bx bxs-up-arrow align-middle"
                                                ></i
                                                ><a href="{{route('admin.contact')}}" class="text-success">View Team Members</a>
                                            </p>
                                        </div>
                                        
                                         <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                                Total Customers / Clients
                                            </p>
                                            <h4 class="my-1">{{$total_customer}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                            >
                                                <i
                                                    class="bx bxs-up-arrow align-middle"
                                                ></i
                                                ><a href="{{route('admin.customer')}}" class="text-success">View Customers</a>
                                            </p>
                                        </div>
                                        
                                          <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                            
                        </div>
                          
                           <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                               Assign Customers
                                            </p>
                                            <h4 class="my-1">{{$assign_customer}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                            >
                                                <i
                                                    class="bx bxs-up-arrow align-middle"
                                                ></i
                                                ><a href="{{route('admin.assign')}}" class="text-success">View Assigned Customers</a>
                                            </p>
                                        </div>
                                        
                                          <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                            
                        </div>
                           <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">
                                               None Assign Customers
                                            </p>
                                            <h4 class="my-1">{{$none_assign_customer}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                            >
                                                <i
                                                    class="bx bxs-up-arrow align-middle"
                                                ></i
                                                ><a href="{{route('admin.noneassign')}}" class="text-success">None Assign Customers</a>
                                            </p>
                                        </div>
                                        
                                         <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
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
                                            <h4 class="my-1">{{$total_email}}</h4>
                                            <p
                                                class="mb-0 font-13 text-success"
                                            >
                                                <i class="bx bxs-up-arrow align-middle"
                                                ></i>
                                                <a href="{{route('admin.email')}}" class="text-success"> View Emails</a>
                                            </p>
                                        </div>
                                        
                                          <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
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
                                            >
                                                <i class="bx bxs-up-arrow align-middle"
                                                ></i>
                                                <a href="{{route('admin.sms')}}" class="text-success"> View SMS</a>
                                            </p>
                                        </div>
                                        
                                          <div
                                            class="widgets-icons bg-light-success text-success ms-auto"
                                        >
                                             <i class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                            
                        </div>
                     
                      
                     
                    </div>
               
              
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"
                ><i class="bx bxs-up-arrow-alt"></i
            ></a>

            @include('admin.dashboard.footer')
          