<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head />

<body>
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ asset('assets/images/homes.png') }}" alt="Admin">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="mb-40 max-w-290-px">
                        <img src="{{ asset('assets/images/home.png') }}" alt="Admin Logo">
                    </a>
                    <h4 class="mb-12">Admin Sign Up</h4>
                    <p class="mb-32 text-secondary-light text-lg">Create an account to manage the platform</p>
                </div>

                <!-- Role Dropdown -->

                <form action="{{ route('admin.signup.store') }}" method="POST" id="admin-signup-form">
                    @csrf
                    <!-- Hidden Input for Role -->
                    <input type="hidden" name="role" id="roleInput" value="">

                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="f7:person"></iconify-icon>
                        </span>
                        <input type="text" name="username" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Username" id="username" required>
                    </div>

                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-neutral-50 radius-12"
                            placeholder="Email" id="email" required>
                    </div>

                    <div class="mb-20">
                        <div class="position-relative">
                            <div class="icon-field">
                                <span class="icon top-50 translate-middle-y">
                                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                </span>
                                <input type="password" name="password"
                                    class="form-control h-56-px bg-neutral-50 radius-12" id="password"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <span class="mt-12 text-sm text-secondary-light">Password must have at least 8 characters</span>
                    </div>

                    <div>
                        <div class="form-check style-check d-flex align-items-start">
                            <input class="form-check-input border border-neutral-300 mt-4" type="checkbox"
                                id="condition" required>
                            <label class="form-check-label text-sm" for="condition">
                                By creating an account, you agree to the
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Terms & Conditions</a>
                                and
                                <a href="javascript:void(0)" class="text-primary-600 fw-semibold">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>

                    <div class="dropdown mb-32">
                        <button class="btn btn-secondary dropdown-toggle w-100 h-56-px bg-neutral-50 radius-12"
                            type="button" id="roleDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Role
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="roleDropdown">
                            <li>
                                <button class="dropdown-item" type="button" onclick="selectRole('admin')">Admin</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button"
                                    onclick="selectRole('moderator')">Moderator</button>
                            </li>
                        </ul>
                    </div>


                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"
                        id="admin-signup-button" disabled>Sign Up</button>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Already have an admin account?<a href="{{ route('signin') }}"
                                class="text-primary-600 fw-semibold">Sign in</a></p>
                    </div>
                </form>

                <script>
                    // Handle Role Selection
                    function selectRole(role) {
                        document.getElementById('roleInput').value = role;
                        document.getElementById('roleDropdown').innerText = role.charAt(0).toUpperCase() + role.slice(1);
                    }

                    document.getElementById('admin-signup-form').addEventListener('input', function () {
                        const username = document.getElementById('username').value;
                        const email = document.getElementById('email').value;
                        const password = document.getElementById('password').value;
                        const role = document.getElementById('roleInput').value;
                        const condition = document.getElementById('condition').checked;

                        const submitButton = document.getElementById('admin-signup-button');

                        // Enable the submit button only if all fields are filled, role is selected, and condition is checked
                        if (username && email && password.length >= 8 ) {
                            submitButton.disabled = false;
                        } else {
                            submitButton.disabled = true;
                        }
                    });
                </script>
            </div>
        </div>
    </section>

    <x-script />
</body>

</html>