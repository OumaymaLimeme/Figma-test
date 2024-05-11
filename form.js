$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault(); // to prevent default form submission

        var formData = $(this).serialize(); // serialize the form data

        $.ajax({
            type: "POST",
            url: "process.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function(data) {
            console.log(data);
            if (!data.success) {
                if (data.errors.name) {
                    $("#name-group").addClass("has-error");
                    $("#name-group").append(
                      '<div class="help-block">' + data.errors.name + "</div>"
                    );
                }

                if (data.errors.email) {
                    $("#email-group").addClass("has-error");
                    $("#email-group").append(
                      '<div class="help-block">' + data.errors.email + "</div>"
                    );
                }

                if (data.errors.superheroAlias) {
                    $("#superhero-group").addClass("has-error");
                    $("#superhero-group").append(
                      '<div class="help-block">' + data.errors.superheroAlias + "</div>"
                    );
                }
            } else {
                $("form").html(
                    '<div class="alert alert-success">' + data.message + "</div>"
                );
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: " + textStatus + ', ' + errorThrown);
        });
    });
});
