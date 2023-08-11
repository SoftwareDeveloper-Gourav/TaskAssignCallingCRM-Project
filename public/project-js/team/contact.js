function Test() {
    var countryCodeTitle = $(".iti__selected-flag").attr("title");
    var countryCode = countryCodeTitle.match(/\+\d+/)[0];
    $("#country_code").val(countryCode);
}
$("#add_customer_form").validate({
    rules: {
        name: "required",
        phone: "required",
        email: {
            required: true,
            email: true,
        },
        msg: {
            required: true,
            minlength: 4,
            maxlength: 200,
        },
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html(
            "<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span class='visually-hidden'>Loading...</span></button>"
        );
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "/team/create_customer",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Submit");
                Command: toastr[data.icon](data.title, data.msg);
                if (data.status) {
                    $("#add_customer_form").trigger("reset");
                }
            },
        });
    },
});

// THIS IS update_contact_form FUNCTION \
$("#update_contact_form").validate({
    rules: {
        name: "required",
        phone: "required",
        email: {
            required: true,
            email: true,
        },
        dob: "required",
        pin: "required",
        password: {
            required: true,
            minlength: 4,
            maxlength: 30,
        },
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html(
            "<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span class='visually-hidden'>Loading...</span></button>"
        );
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "/admin/update_contact",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Submit");
                Command: toastr[data.icon](data.title, data.msg);
                if (data.status) {
                    $("#update_contact_form").trigger("reset");
                }
            },
        });
    },
});

// THIS IS update_contact_form FUNCTION

// THIS IS DeleteTeam FUNCTION

function DeleteTeam(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "team_delete",
                data: { id: id },
                dataType: "JSON",
                success: function (data) {
                    swal.fire({
                        icon: data.icon,
                        title: data.title,
                    });
                    if (data.status) {
                        $("#" + id).hide();
                    }
                },
            });
        }
    });
}

// THIS IS DeleteTeam FUNCTION

// THIS IS update_contact_form FUNCTION \
$("#email_send").validate({
    rules: {
        editor2: "required",
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html(
            "<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span class='visually-hidden'>Loading...</span></button>"
        );
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "/team/send-email",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Send Email");
                Command: toastr[data.icon](data.title, data.msg);
                if (data.status) {
                    $(".cke_wysiwyg_frame ").css("display", "none");
                }
            },
        });
    },
});

// THIS IS update_contact_form FUNCTION

// THIS IS message_send FUNCTION
$("#message_send").validate({
    rules: {
        editor2: "required",
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html(
            "<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span class='visually-hidden'>Loading...</span></button>"
        );
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "/team/send-message",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Send Message");
                Command: toastr[data.icon](data.title, data.msg);
                if (data.status) {
                    $("#message_send ").trigger("reset");
                }
            },
        });
    },
});
