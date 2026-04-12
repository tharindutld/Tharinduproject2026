$(document).ready(function () {

    // =========================
    // RESET FORM
    // =========================
    $("#resetBtn").click(function () {
        $("#userRegistrationForm")[0].reset();
        $(".form-control, .form-select").removeClass("is-valid is-invalid");
        $("#formMessage").html("");
    });

    // =========================
    // VALIDATION HELPERS
    // =========================
    function valid(el) {
        $(el).removeClass("is-invalid").addClass("is-valid");
    }

    function invalid(el) {
        $(el).removeClass("is-valid").addClass("is-invalid");
    }

    // =========================
    // LIVE VALIDATIONS (Preserved)
    // =========================
    $("#first_name, #last_name").on("input", function () {
        /^[A-Za-z\s]{3,}$/.test(this.value) ? valid(this) : invalid(this);
    });

    $("#email").on("input", function () {
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value) ? valid(this) : invalid(this);
    });

    $("#phone").on("input", function () {
        /^[0-9]{10}$/.test(this.value) ? valid(this) : invalid(this);
    });

    $("#gender, #role, #status").on("change", function () {
        $(this).val() !== "" ? valid(this) : invalid(this);
    });

    $("#birth_date").on("change", function () {
        let date = new Date(this.value);
        let min = new Date("1950-01-01");
        let max = new Date("2020-01-01");
        (date >= min && date <= max) ? valid(this) : invalid(this);
    });

    $("#password").on("input", function () {
        let strong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/.test(this.value);
        strong ? valid(this) : invalid(this);
    });

    // =========================
    // FORM SUBMIT (The Fix)
    // =========================
    $("#userRegistrationForm").submit(function (e) {
        e.preventDefault();

        let hasError = false;

        // Check empty fields
        $(".form-control, .form-select").each(function () {
            if ($(this).val() === "") {
                $(this).addClass("is-invalid");
                hasError = true;
            }
        });

        if (hasError || $(".is-invalid").length > 0) {
            $("#formMessage").html(
                `<div class="alert alert-danger">❌ Please fix all errors before submitting.</div>`
            );
            return;
        }

        // Gather all data from the form
        let formData = $(this).serialize();

        // Show a "Processing" message so the user knows something is happening
        $("#formMessage").html(`<div class="alert alert-info">⏳ Processing... Please wait.</div>`);

        // --- THE AJAX CALL ---
        $.ajax({
            type: "POST",
            url: "../../Controllers/Admin/adm_add_staff.php", // Ensure this path is 100% correct
            data: formData,
            dataType: "json", // Tells jQuery to parse the JSON response automatically
            success: function (response) {
                if (response.status === "success") {
                    $("#formMessage").html(
                        `<div class="alert alert-success">✅ ${response.message} Redirecting...</div>`
                    );
                    
                    // Clear form on success
                    $("#userRegistrationForm")[0].reset();
                    $(".form-control, .form-select").removeClass("is-valid is-invalid");

                    // Redirect to the list view after success
                    setTimeout(() => {
                        window.location.href = "adm_view_staff.php"; 
                    }, 2000);
                } else {
                    // Show error from the PHP Controller (e.g., Age < 6 or DB error)
                    $("#formMessage").html(
                        `<div class="alert alert-danger">❌ ${response.message}</div>`
                    );
                }
            },
            error: function (xhr, status, error) {
                // If this runs, the path or the PHP script is crashing
                console.error("Server Error:", xhr.responseText);
                $("#formMessage").html(
                    `<div class="alert alert-danger">❌ System error: Check the Console (F12) for details.</div>`
                );
            }
        });
    });
});