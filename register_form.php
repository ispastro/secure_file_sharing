<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure File Sharing - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes holographic {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .animate-holographic {
            background: linear-gradient(
                45deg,
                rgba(255,255,255,0.1),
                rgba(255,255,255,0.3),
                rgba(255,255,255,0.1)
            );
            background-size: 400% 400%;
            animation: holographic 8s ease infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-slide-down {
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .animate-text-shine {
            background-size: 200% auto;
            animation: textShine 3s linear infinite;
        }

        @keyframes textShine {
            to { background-position: 200% center; }
        }

        .glass-container {
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-900 via-indigo-900 to-blue-900 flex items-center justify-center">
    <!-- Animated Background Particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particles">
            <?php for($i=0; $i<50; $i++): ?>
                <div class="absolute w-1 h-1 bg-white/20 rounded-full animate-float"></div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Glassmorphism Form Container -->
    <div class="relative glass-container w-full max-w-md mx-4 p-8 bg-white/10 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 hover:shadow-2xl transition-shadow duration-300">
        <!-- Holographic Effect Overlay -->
        <div class="absolute inset-0 rounded-2xl opacity-30 mix-blend-overlay animate-holographic"></div>

        <!-- Form Content -->
        <div class="relative z-10">
            <!-- Animated Logo -->
            <div class="flex justify-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-2xl flex items-center justify-center transform rotate-45 hover:rotate-12 transition-transform duration-300">
                    <i class="fas fa-lock text-white text-2xl -rotate-45"></i>
                </div>
            </div>

            <h2 class="text-4xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400 mb-8 animate-text-shine">
                Secure File Sharing
            </h2>

            <!-- Error Messages -->
            <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
                <div class="bg-red-400/30 backdrop-blur-sm p-4 mb-6 rounded-xl border border-red-400/50 animate-slide-down">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p class="text-red-100 flex items-center gap-2">
                            <i class="fas fa-exclamation-circle"></i>
                            <?= htmlspecialchars($error) ?>
                        </p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <!-- Registration Form -->
            <form action="register.php" method="POST" class="space-y-6">
                <!-- Form Fields -->
                <?php 
                $fields = [
                    ['icon' => 'user', 'name' => 'username', 'label' => 'Username', 'type' => 'text'],
                    ['icon' => 'envelope', 'name' => 'email', 'label' => 'Email', 'type' => 'email'],
                    ['icon' => 'lock', 'name' => 'password', 'label' => 'Password', 'type' => 'password'],
                    ['icon' => 'lock', 'name' => 'confirm_password', 'label' => 'Confirm Password', 'type' => 'password']
                ];
                
                foreach ($fields as $field): ?>
                <div class="group relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-pink-400 transition-colors">
                        <i class="fas fa-<?= $field['icon'] ?>"></i>
                    </div>
                    <input 
                        type="<?= $field['type'] ?>" 
                        name="<?= $field['name'] ?>" 
                        id="<?= $field['name'] ?>" 
                        required
                        class="w-full pl-12 pr-5 py-4 bg-white/5 backdrop-blur-sm border border-white/20 rounded-xl focus:border-pink-400/50 focus:ring-2 focus:ring-pink-400/30 placeholder-gray-400 text-gray-100 transition-all duration-300 outline-none"
                        placeholder="<?= $field['label'] ?>" />
                    <label 
                        for="<?= $field['name'] ?>" 
                        class="absolute left-12 top-4 text-gray-400 pointer-events-none transition-all duration-300 group-focus-within:-translate-y-6 group-focus-within:text-sm group-focus-within:text-pink-400 <?= !empty($_POST[$field['name']]) ? '-translate-y-6 text-sm text-pink-400' : '' ?>"
                    >
                        <?= $field['label'] ?>
                    </label>
                </div>
                <?php endforeach; ?>

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full py-4 px-6 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-400 hover:to-purple-500 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-pink-500/20 relative overflow-hidden">
                    <span class="relative z-10">Create Account</span>
                    <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 hover:opacity-100 transition-opacity"></div>
                </button>
            </form>

            <!-- Login Link -->
            <p class="text-center mt-6 text-gray-300">
                Already have an account?
                <a href="login.php" class="text-pink-300 hover:text-pink-200 font-semibold underline underline-offset-4 decoration-white/30 hover:decoration-pink-200 transition-colors">
                    Sign In
                </a>
            </p>
        </div>
    </div>

</body>
</html>
