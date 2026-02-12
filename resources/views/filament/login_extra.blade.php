<style xmlns:x-filament="http://www.w3.org/1999/html">
    .fi-simple-layout{
        background-image: url({{asset('/assets/img/voting-pana.png')}});
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    body {
        background: rgb(34,193,195) !important;
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%)  !important;;
    }

    @media screen and (min-width: 1024px) {
        main {
            position: absolute; right: 100px;
        }

        main:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: darkcyan;
            border-radius: 12px;
            z-index: -9;
            -webkit-transform: rotate(7deg);
            -moz-transform: rotate(7deg);
            -o-transform: rotate(7deg);
            -ms-transform: rotate(7deg);
            transform: rotate(7deg);
        }

        #register-form {
            position: fixed;
            left: 100px;
            margin-top: -200px;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 400px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    }

    /* Mobile styles */
    @media screen and (max-width: 1023px) {
        #register-form {
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 12px;
        margin-bottom: 5px;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
        color: black;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .register-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .register-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .register-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .form-title {
        text-align: center;
        color: #1f2937;
        margin-bottom: 24px;
        font-size: 1.5em;
        font-weight: bold;
    }

    .password-match {
        color: #10b981;
        font-size: 14px;
        margin-top: 5px;
    }

    .password-mismatch {
        color: #ef4444;
        font-size: 14px;
        margin-top: 5px;
    }

    /* Success Modal */
    .success-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .success-icon {
        font-size: 48px;
        color: #10b981;
        margin-bottom: 15px;
    }
</style>

<!-- Registration Form -->
<div id="register-form">
    <h3 class="form-title">Create Account</h3>

    <form method="POST" action="/register" id="registrationForm">
        @csrf
        <div class="form-group">
            <label class="form-label" for="fullname">Full Name</label>
            <input
                type="text"
                id="fullname"
                name="name"
                class="form-input"
                placeholder="Enter your full name"
                required
                value="{{ old('name') }}"
            >
            @error('name')
            <div style="color: #ef4444; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="reg_email">Email Address</label>
            <input
                type="email"
                id="reg_email"
                name="email"
                class="form-input"
                placeholder="Enter your email"
                required
                value="{{ old('email') }}"
            >
            @error('email')
            <div style="color: #ef4444; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="reg_password">Password</label>
            <input
                type="password"
                id="reg_password"
                name="password"
                class="form-input"
                placeholder="Enter password"
                required
                minlength="6"
            >
            @error('password')
            <div style="color: #ef4444; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="reg_password_confirmation">Confirm Password</label>
            <input
                type="password"
                id="reg_password_confirmation"
                name="password_confirmation"
                class="form-input"
                placeholder="Confirm your password"
                required
                minlength="6"
            >
            <div id="passwordMatchMessage"></div>
        </div>

        <button type="submit" class="register-btn" id="registerBtn">
            Register Now
        </button>
    </form>
</div>

<!-- Success Modal - Only show if registration was successful -->
@if(session('registration_success'))
    <div class="success-modal" id="successModal" style="display: flex;">
        <div class="modal-content">
            <div class="success-icon">✓</div>
            <h3 style="color: #10b981; margin-bottom: 15px;">Registration Successful!</h3>
            <p style="color: #6b7280; margin-bottom: 20px;">
                Thank you for registration. Soon our officer will contact you.
            </p>
            <button onclick="closeModal()" style="
            background: #10b981;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        ">
                OK
            </button>
        </div>
    </div>
@endif

<script>
    // Password match validation
    const regPassword = document.getElementById('reg_password');
    const regConfirmPassword = document.getElementById('reg_password_confirmation');
    const passwordMessage = document.getElementById('passwordMatchMessage');

    function validatePassword() {
        if (regPassword.value === '' || regConfirmPassword.value === '') {
            passwordMessage.textContent = '';
            passwordMessage.className = '';
            return;
        }

        if (regPassword.value === regConfirmPassword.value) {
            passwordMessage.textContent = '✓ Passwords match';
            passwordMessage.className = 'password-match';
        } else {
            passwordMessage.textContent = '✗ Passwords do not match';
            passwordMessage.className = 'password-mismatch';
        }
    }

    if (regPassword && regConfirmPassword) {
        regPassword.addEventListener('input', validatePassword);
        regConfirmPassword.addEventListener('input', validatePassword);
    }

    // Modal functions
    function closeModal() {
        const modal = document.getElementById('successModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('successModal');
        if (modal && event.target === modal) {
            closeModal();
        }
    }

    // Auto-close success modal after 5 seconds if it's visible
    document.addEventListener('DOMContentLoaded', function() {
        const successModal = document.getElementById('successModal');
        if (successModal && successModal.style.display === 'flex') {
            setTimeout(closeModal, 5000);
        }
    });
</script>
