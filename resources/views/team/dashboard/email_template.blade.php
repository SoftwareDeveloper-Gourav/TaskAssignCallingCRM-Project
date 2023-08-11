@include('team.dashboard.header')
@extends('team.dashboard.header')
@push('title')
    <title>Choose Email Template</title>
@endpush

	<div class="card">
	      			<div class="card-body p-4">
								<h5 class="mb-4">Choose Email Template </h5> <br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 m-auto">
                                            <div class="card">
                                               <div class="p-3">
                                           <h6>Template 1</h6>
Dear {{$data->customer_name}},<br>

We are excited to introduce our latest offering to you! [Briefly describe your product or service and highlight its benefits or special features].
<center> <br><button id="btn" class="btn-sm btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button"> Modify  & Send</button></center>
                                               </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4 m-auto">
                                            <div class="card">
                                               <div class="p-3">
                                                    <h6>Template 2</h6>
                                           Subject: Your Subject Line Here<br>

Dear {{$data->customer_name}},<br>

We are excited to introduce our latest offering to you! [Briefly describe your product or service and highlight its benefits or special features].
<center> <br><button class="btn-sm btn btn-primary">Show</button></center>

                                               </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4 m-auto">
                                            <div class="card">
                                               <div class="p-3">
                                                    <h6>Template 3</h6>
                                           Subject: Your Subject Line Here <br>

Dear {{$data->customer_name}},<br>

We are excited to introduce our latest offering to you! [Briefly describe your product or service and highlight its benefits or special features].
<center> <br><button class="btn-sm btn btn-primary">Show</button></center>
                                               </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-4 m-auto">
                                            <div class="card">
                                               <div class="p-3">
                                               <h6>Manual Text Editor</h6>
                                               Click Here to open manual text editor..
<center> <br><a href="{{route('team.send-email',['id'=>$id])}}" class="btn-sm btn btn-primary">Click Here</a></center>

                                               </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
								
									
							</div>
						</div>
                      {{-- THIS IS FIRST TEMPLATE MODAL  --}}
                        {{-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel">Email Template Design </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" contenteditable="true" id="email">
                                <p><b>Dear {{$data->customer_name}}</b>,</p>

                                <p>We are excited to introduce our latest offering to you! [Briefly describe your product or service and highlight its benefits or special features].</p>

                                <p>To learn more, visit our website: [Link to Your Website]</p>
                                <p>
                                If you have any questions or need assistance, feel free to contact our support team at [Contact Email or Phone Number].</p>

                                <p>Thank you for considering our product/service. We look forward to serving you!</p> <br>

                                Best regards, <br>
                                [Your Company Name]
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="SendEmail({{$data->customer_id}})">Send Email</button>
                                    </div>
                                </div>
                                </div>
                     </div> --}}
                      {{-- THIS IS FIRST TEMPLATE MODAL  --}}

@include('team.dashboard.footer')

<script>
    function SendEmail(id) {
    let email = $("#email").html();
    let myid = id;
    $.ajax({
        url: "/team/send-emailTemplate",
        method: "GET",
        dataType: "JSON",
        data: {
             id: id,
              text: email 
            },
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#btn").html("Please Wait");
            $("#btn").attr("disabled", true);
        },
        success: function (data) {
            $("#btn").attr("disabled", false);
            $("#btn").html("Send Message");
            Command: toastr[data.icon](data.title, data.msg);
            if (data.status) {
                $("#message_send ").trigger("reset");
            }
        },
        error: function () {
            Command: toastr["error"]("Internal Issue", "Error");
        },
    });
}
</script>