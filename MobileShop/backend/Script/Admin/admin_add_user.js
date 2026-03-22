document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("userRegistrationForm");
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // Toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // Toggle the icon (using Bootstrap Icons)
        this.querySelector('i').classList.toggle("bi-eye");
        this.querySelector('i').classList.toggle("bi-eye-slash");
    });

    // Validation patterns
    const patterns = {
        name: /^[A-Za-z\s]{3,}$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/, // Logic handles the single @ symbol
        phone: /^[0-9]{10}$/,
        password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
    };

    // Helper to toggle validation classes
    function validateInput(input, condition, feedbackText = "") {
    // If inside an input-group, the feedback is a sibling of the parent group
    const container = input.closest('.input-group') || input;
    const feedback = container.parentNode.querySelector('.invalid-feedback');
    
    if (condition) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        if (feedback) feedback.style.display = "none";
        return true;
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        if (feedback) {
            if(feedbackText) feedback.textContent = feedbackText;
            feedback.style.display = "block";
        }
        return false;
    }
}

    // Input Event Listeners
    window.checkFirstname = (input) => {
        input.value = input.value.replace(/[^A-Za-z\s]/g, "");
        validateInput(input, patterns.name.test(input.value), "Minimum 3 letters required.");
    };
    

    window.checkLastname = (input) => {
        input.value = input.value.replace(/[^A-Za-z\s]/g, "");
        validateInput(input, patterns.name.test(input.value), "Minimum 3 letters required.");
    };


    window.checkEmail = (input) => {
        const atCount = (input.value.match(/@/g) || []).length;
        const isValid = patterns.email.test(input.value) && atCount === 1;
        validateInput(input, isValid, atCount > 1 ? "Only one @ sign allowed." : "Enter a valid email (e.g. name@mail.com)");
    };


    window.checkPhone = (input) => {
    // Remove any non-numeric characters
    input.value = input.value.replace(/\D/g, "");
    // Limit length to 10 digits
    if (input.value.length > 10) {
        input.value = input.value.slice(0, 10);
    }
    const val = input.value;
    let errorMessage = "Must be exactly 10 digits.";
    // Specific check for the starting zero
    if (val.length > 0 && val[0] !== '0') {
        errorMessage = "Phone number must start with 0.";
    }
    const isValid = patterns.phone.test(val);
    validateInput(input, isValid, errorMessage);
};


    window.checkPassword = (input) => {
        validateInput(input, patterns.password.test(input.value));
    };

    // AJAX Submission
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Final check of all required fields
        const inputs = form.querySelectorAll('input[required], select[required]');
        let isFormValid = true;

        inputs.forEach(input => {
            if (input.classList.contains('is-invalid') || !input.value) {
                input.classList.add('is-invalid');
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            alert("Please correct the errors before submitting.");
            return;
        }

        const formData = new FormData(this);
        const submitBtn = document.getElementById("submitBtn");
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Creating...';

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert("Staff member added successfully!");
                form.reset();
                document.querySelectorAll('.is-valid').forEach(el => el.classList.remove('is-valid'));
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.log('Error:', error);
            alert("An error occurred. Check the console.");
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Create User';
        });
    });
});

window.resetForm = () => {
    const form = document.getElementById("userRegistrationForm");
    form.reset();
    form.querySelectorAll('.form-control, .form-select').forEach(el => {
        el.classList.remove('is-valid', 'is-invalid');
    });
};