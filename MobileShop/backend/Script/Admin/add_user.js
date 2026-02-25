document.addEventListener("DOMContentLoaded", function () {

    var form = document.getElementById("userForm");

    var firstName = document.getElementById("firstName");
    var lastName = document.getElementById("lastName");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    // var role = document.getElementById("role");
    var status = document.getElementById("status");

    var nameRegex = /^[A-Za-z]+$/;               
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/; 
    var phoneRegex = /^07[0-9]{8}$/;             

    // ===== Real-time input validation =====

    firstName.addEventListener("input", function () {
        if (!nameRegex.test(firstName.value)) {
            firstName.classList.add("is-invalid");
            firstName.classList.remove("is-valid");
        } else {
            firstName.classList.remove("is-invalid");
            firstName.classList.add("is-valid");
        }
    });

    lastName.addEventListener("input", function () {
        if (!nameRegex.test(lastName.value)) {
            lastName.classList.add("is-invalid");
            lastName.classList.remove("is-valid");
        } else {
            lastName.classList.remove("is-invalid");
            lastName.classList.add("is-valid");
        }
    });

    email.addEventListener("input", function () {
        if (!emailRegex.test(email.value)) {
            email.classList.add("is-invalid");
            email.classList.remove("is-valid");
        } else {
            email.classList.remove("is-invalid");
            email.classList.add("is-valid");
        }
    });

    phone.addEventListener("input", function () {
        if (!phoneRegex.test(phone.value)) {
            phone.classList.add("is-invalid");
            phone.classList.remove("is-valid");
        } else {
            phone.classList.remove("is-invalid");
            phone.classList.add("is-valid");
        }
    });

    // role.addEventListener("change", function () {
    //     if (role.value === "") {
    //         role.classList.add("is-invalid");
    //         role.classList.remove("is-valid");
    //     } else {
    //         role.classList.remove("is-invalid");
    //         role.classList.add("is-valid");
    //     }
    // });

    status.addEventListener("change", function () {
        if (status.value === "") {
            status.classList.add("is-invalid");
            status.classList.remove("is-valid");
        } else {
            status.classList.remove("is-invalid");
            status.classList.add("is-valid");
        }
    });

    // ===== Form submit validation =====
    form.addEventListener("submit", function (e) {
        var isValid = true;

        if (!nameRegex.test(firstName.value)) {
            firstName.classList.add("is-invalid");
            isValid = false;
        }

        if (!nameRegex.test(lastName.value)) {
            lastName.classList.add("is-invalid");
            isValid = false;
        }

        if (!emailRegex.test(email.value)) {
            email.classList.add("is-invalid");
            isValid = false;
        }

        if (!phoneRegex.test(phone.value)) {
            phone.classList.add("is-invalid");
            isValid = false;
        }

        // if (role.value === "") {
        //     role.classList.add("is-invalid");
        //     isValid = false;
        // }

      

      
        if (!isValid) {
            e.preventDefault();
        }
    });

});