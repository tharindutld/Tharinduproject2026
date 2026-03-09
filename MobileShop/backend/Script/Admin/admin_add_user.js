function resetForm() {
    // 1. Get the form - matching your internal ID
    const form = document.getElementById('userRegistrationForm');
    
    if (!form) {
        console.error("Form not found! Check your HTML IDs.");
        return;
    }

    // 2. Standard HTML reset (clears text values)
    form.reset();

    // 3. Find ALL interactive elements inside the form
    const fieldsToLock = form.querySelectorAll('input, select');

    fieldsToLock.forEach(field => {
        // Reset Visuals
        field.style.borderColor = ""; 
        field.classList.remove('is-valid', 'is-invalid');

        // 4. THE LOCK: Disable everything except firstname
        if (field.id === 'firstname') {
            field.disabled = false; // Always open
            field.focus();          // Put cursor back at start
        } else {
            field.disabled = true;  // Force lock
        }
    });

    // 5. Force the Submit button to lock
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.disabled = true;
    }
    
    console.log("Form has been hard-reset and locked.");
}

function validateAllFields() {
    const submitBtn = document.getElementById("submitBtn");
    
    // Get all your inputs
    const firstname = document.getElementById("firstname").value.length >= 3;
    const lastname = document.getElementById("lastname").value.length >= 3;
    const email = document.getElementById("email").value.includes("@");
    const birthdate = document.getElementById("birthdate").value !== "";
    const phone = document.getElementById("phone").value.length === 10;
    const gender = document.getElementById("gender").value !== "";
    const password = document.getElementById("password").value.length >= 8;

    // Check if ALL are true
    if (firstname && lastname && email && birthdate && phone && gender && password) {
        submitBtn.disabled = false; // Enable submit
    } else {
        submitBtn.disabled = true;  // Keep disabled
    }
}

// 1. First Name
function checkFirstname(input) {
  input.value = input.value.replace(/[^A-Za-z\s]/g, "");
  const nextField = document.getElementById("lastname");

  if (input.value.length >= 3) {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    // If user deletes text, lock all following fields again
    nextField.disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("phone").disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("birthdate").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  
  }
    validateAllFields();
}

// 2. Last Name
function checkLastname(input) {
  input.value = input.value.replace(/[^A-Za-z\s]/g, "");
  const nextField = document.getElementById("email");

  if (input.value.length >= 3) {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    nextField.disabled = true;
    
    document.getElementById("phone").disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("birthdate").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

// 3. Email
function checkEmail(input) {
  const nextField = document.getElementById("phone");
  // Simple email check: must contain @ and .
  if (input.value.includes("@") && input.value.includes(".")) {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    nextField.disabled = true;
    document.getElementById("gender").disabled = true;
    document.getElementById("birthdate").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

// 4. phone number
function checkPhone(input) {
  // 1. Remove anything that is NOT a number
  input.value = input.value.replace(/[^0-9]/g, "");

  // 2. Prevent typing more than 10 digits
  if (input.value.length > 10) {
    input.value = input.value.slice(0, 10);
  }

  const nextField = document.getElementById("gender");

  // 3. Logic: Must be exactly 10 digits
  if (input.value.length === 10) {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    // Lock the chain if phone number is incomplete
    nextField.disabled = true;
    document.getElementById("birthdate").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

// 5. Gender
function checkGender(input) {
  const nextField = document.getElementById("birthdate");

  if (input.value !== "") {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    nextField.disabled = true;
    
    document.getElementById("role").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

// 6. Birthdate
function checkBirthDate(input) {
  console.log("Date selected: " + input.value); // This tells us if the function even started

  const nextField = document.getElementById("role"); // MAKE SURE your phone input has id="phone"

  if (!input.value) {
    console.log("No value in date input.");
    return;
  }

  const birthDate = new Date(input.value);
  const today = new Date();

  let age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }

  console.log("Calculated Age: " + age);

  if (age >= 16) {
    console.log("Age is valid (16+). Unlocking next field.");
    if (nextField) {
      nextField.disabled = false;
    } else {
      console.error("Could not find the element with id='phone'");
    }
    input.style.borderColor = "green";
  } else {
    console.log("Age is too young. Locking next field.");
    if (nextField) nextField.disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

// 7. Role
function checkRole(input) {
  const nextField = document.getElementById("status");

  if (input.value !== "") {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    nextField.disabled = true;
    document.getElementById("password").disabled = true;
    input.style.borderColor = "red";
  }
}

function checkStatus(input) {
  const nextField = document.getElementById("password");

  if (input.value !== "") {
    nextField.disabled = false;
    input.style.borderColor = "green";
  } else {
    nextField.disabled = true;
    input.style.borderColor = "red";
  }
  validateAllFields();
}

function checkPassword(input) {
  const submitBtn = document.getElementById("submitBtn");
  
  // Regex Breakdown:
  // (?=.*[a-z]) : Must contain at least one lowercase letter
  // (?=.*[A-Z]) : Must contain at least one uppercase letter
  // (?=.*[!@#$%^&*]) : Must contain at least one special character
  // .{8,} : Must be at least 8 characters long
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

  if (passwordPattern.test(input.value)) {
    input.style.borderColor = "green";
    if (submitBtn) submitBtn.disabled = false;
    
    // Optional: Add a 'Valid' class for Bootstrap
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
  } else {
    input.style.borderColor = "red";
    if (submitBtn) submitBtn.disabled = true;

    // Optional: Add an 'Invalid' class for Bootstrap
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
  }
  validateAllFields();
}
