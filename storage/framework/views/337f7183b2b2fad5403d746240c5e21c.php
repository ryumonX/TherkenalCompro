<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'float-slow': 'float 15s ease-in-out infinite',
                        'float-medium': 'float 12s ease-in-out infinite',
                        'float-fast': 'float 10s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0) translateX(0) rotate(0deg)' },
                            '25%': { transform: 'translateY(-20px) translateX(20px) rotate(5deg)' },
                            '50%': { transform: 'translateY(10px) translateX(-15px) rotate(-5deg)' },
                            '75%': { transform: 'translateY(-15px) translateX(-25px) rotate(3deg)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins">
    <!-- Main Container -->
    <div class="relative min-h-screen flex items-center justify-center bg-black p-4 overflow-hidden">

        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <!-- Background Gradients -->
            <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] rounded-full bg-gradient-to-r from-fuchsia-600 to-blue-500 opacity-60 filter blur-[80px] animate-float-slow"></div>
            <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] rounded-full bg-gradient-to-r from-violet-700 to-cyan-400 opacity-60 filter blur-[80px] animate-float-medium"></div>
            <div class="absolute top-[40%] left-[60%] w-[300px] h-[300px] rounded-full bg-gradient-to-r from-rose-500 to-amber-500 opacity-50 filter blur-[80px] animate-float-fast"></div>
        </div>

        <!-- Login Form Card -->
        <div class="relative w-full max-w-md z-10 px-6">
            <!-- Glassmorphism Card -->
            <div class="backdrop-blur-xl bg-white/10 rounded-3xl p-8 shadow-2xl border border-white/20 transition-all duration-500 hover:shadow-purple-500/10">

                <!-- Logo Circle -->
                <div class="absolute -top-12 left-1/2 transform -translate-x-1/2">
                    <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-lg shadow-purple-500/30 animate-pulse-slow">
                        <div class="w-20 h-20 bg-black/80 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <!-- Replace with your logo or icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Header -->
                <div class="text-center mt-12 mb-8">
                    <h2 class="text-3xl font-bold text-white mb-2">Welcome Back</h2>
                    <p class="text-gray-300 text-sm">Sign in to continue your journey</p>
                </div>

                <!-- Form -->
                <form method="POST" action="/login" class="space-y-6">
                    <!-- CSRF Token (for Laravel) -->
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <!-- Email Input -->
                    <div class="group relative">
                        <div class="h-14 w-full rounded-xl border border-white/20 backdrop-blur-md bg-white/5 group-hover:bg-white/10 transition-all duration-300 overflow-hidden">
                            <input type="email" name="email" id="email" placeholder=" "
                                   class="peer h-full w-full outline-none bg-transparent px-5 pt-4 text-white">
                            <label for="email" class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                                Email
                            </label>
                        </div>
                        <!-- Email Error Message -->
                        <div class="error-message text-red-400 text-xs mt-1 ml-2 hidden">
                            Please enter a valid email address
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="group relative">
                        <div class="h-14 w-full rounded-xl border border-white/20 backdrop-blur-md bg-white/5 group-hover:bg-white/10 transition-all duration-300 overflow-hidden">
                            <input type="password" name="password" id="password" placeholder=" "
                                   class="peer h-full w-full outline-none bg-transparent px-5 pt-4 text-white">
                            <label for="password" class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">
                                Password
                            </label>
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-700 duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <!-- Password Error Message -->
                        <div class="error-message text-red-400 text-xs mt-1 ml-2 hidden">
                            Password must be at least 6 characters
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2 text-gray-300 hover:text-white cursor-pointer group">
                            <div class="relative">
                                <input type="checkbox" name="remember" class="appearance-none w-4 h-4 border border-white/30 rounded bg-white/10 checked:bg-gradient-to-r checked:from-indigo-500 checked:to-purple-500 transition-all duration-300 cursor-pointer group-hover:border-white/50">
                                <svg class="absolute top-0 left-0 w-4 h-4 text-white opacity-0 check-icon transition-all duration-300 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span>Remember me</span>
                        </label>
                        
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full h-14 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg shadow-purple-700/20 hover:shadow-purple-700/40 relative overflow-hidden group">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 group-hover:animate-pulse-slow transition-all duration-300"></span>
                        <span class="relative z-10 inline-flex items-center justify-center w-full">
                            Sign In
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </button>
                </form>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute -bottom-10 -left-10 w-20 h-20 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 filter blur-xl opacity-50"></div>
            <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 filter blur-xl opacity-50"></div>
        </div>
    </div>

    <script>
        // Script to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            this.innerHTML = type === 'password'
                ? '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>'
                : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>';
        });

        // Script to handle checkbox styling
        document.querySelector('input[name="remember"]').addEventListener('change', function() {
            const checkIcon = this.parentNode.querySelector('.check-icon');
            if (this.checked) {
                checkIcon.classList.remove('opacity-0');
                checkIcon.classList.add('opacity-100');
            } else {
                checkIcon.classList.remove('opacity-100');
                checkIcon.classList.add('opacity-0');
            }
        });
    </script>
</body>
</html><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/auth/login.blade.php ENDPATH**/ ?>