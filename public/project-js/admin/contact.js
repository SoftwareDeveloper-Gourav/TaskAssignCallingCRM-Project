function addTeamMember() {
    var countryCodeTitle = $(".iti__selected-flag").attr("title");
    var countryCode = countryCodeTitle.match(/\+\d+/)[0];
    $("#country_code").val(countryCode);
}
$("#add_contact_form").validate({
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
            url: "/admin/create_contact",
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
                    $("#add_contact_form").trigger("reset");
                }
            },
        });
    },
});

// THIS IS update_contact_form FUNCTION \

function updateTeamMember() {
    var countryCodeTitle = $(".iti__selected-flag").attr("title");
    var countryCode = countryCodeTitle.match(/\+\d+/)[0];
    $("#country_code").val(countryCode);
}
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
                $("#btn").html("Update");
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
$("#assign_client_form").validate({
    rules: {
        team_member: {
            required: true,
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
            url: "/admin/assign",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Submit");
                swal.fire({
                    title: data.title,
                    icon: data.icon,
                });
                if (data.status) {
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            },
        });
    },
});

// THIS IS update_contact_form FUNCTION

// THIS IS upload_clients FUNCTION
$("#upload_clients").validate({
    rules: {
        csv: "required",
    },
    messages: {},
    submitHandler: function (form, event) {
        event.preventDefault();
        $("#btn").html(
            "<button class='btn btn-primary' type='button' disabled> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span><span class='visually-hidden'>Loading...</span></button>"
        );
        $("#btn").attr("disabled", true);
        $.ajax({
            url: "/admin/upload_csv",
            method: "POST",
            dataType: "JSON",
            data: new FormData(form),
            contentType: false,
            enctype: "multipart/form-data",
            processData: false,
            success: function (data) {
                $("#btn").attr("disabled", false);
                $("#btn").html("Upload Clients");
                Command: toastr[data.icon](data.title, data.msg);
                if (data.status) {
                    $("#upload_clients").trigger("reset");
                }
            },
            error: function (xhr) {
                if (xhr.status == 500) {
                    $("#btn").attr("disabled", false);
                    $("#btn").html("Upload Clients");
                    Command: toastr["error"](
                        "Please Upload Formated Excel File ",
                        "Error"
                    );
                }
            },
        });
    },
});

// THIS IS upload_clients FUNCTION

// THIS IS DeleteTeam FUNCTION

function DeleteCustomer(id) {
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
                url: "client_delete",
                method: "POST",
                data: { id: id },
                dataType: "JSON",
                success: function (data) {
                    Command: toastr[data.icon](data.title, data.msg);
                    if (data.status) {
                        $("#" + id).hide();
                    }
                },
            });
        }
    });
}

// THIS IS DeleteTeam FUNCTION
