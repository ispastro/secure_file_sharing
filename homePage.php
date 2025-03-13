<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureSphere | Military-Grade File Sharing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reuse previous animations */
        @keyframes holographic {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-holographic {
            background: linear-gradient(45deg, 
                rgba(255,255,255,0.1),
                rgba(255,255,255,0.3),
                rgba(255,255,255,0.1));
            background-size: 400% 400%;
            animation: holographic 8s ease infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-900 via-indigo-900 to-blue-900">
    <!-- Animated Particles Background -->
    <div class="absolute inset-0 overflow-hidden opacity-40">
        <?php for($i=0; $i<150; $i++): ?>
        <div class="absolute w-1 h-1 bg-white/20 rounded-full animate-float" 
             style="left: <?= rand(0,100) ?>%; 
                    top: <?= rand(0,100) ?>%;
                    animation-delay: <?= rand(0,30) ?>s"></div>
        <?php endfor; ?>
    </div>

    <!-- Navigation -->
    <nav class="relative z-50 px-8 py-6 backdrop-blur-lg border-b border-white/10">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-lock text-white text-sm"></i>
                </div>
                <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400">
                    SecureSphere
                </span>
            </div>
            <div class="flex gap-8 items-center">
                <a href="#features" class="text-gray-300 hover:text-white transition-colors">Features</a>
                <a href="#pricing" class="text-gray-300 hover:text-white transition-colors">Pricing</a>
                <a href="login_form.php" class="px-6 py-2 bg-white/5 hover:bg-white/10 rounded-lg transition-all">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center">
        <div class="max-w-7xl mx-auto px-8 py-24">
            <div class="glass-container max-w-3xl p-12 bg-white/5 backdrop-blur-lg rounded-3xl border border-white/10">
                <div class="absolute inset-0 rounded-3xl opacity-30 mix-blend-overlay animate-holographic"></div>
                
                <h1 class="text-6xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400">
                    Secure File Sharing<br>Reimagined
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Military-grade encryption meets seamless collaboration. Transfer sensitive files with 
                    confidence using zero-knowledge architecture.
                </p>
                <div class="flex gap-4">
                    <a href="register.php" 
                       class="px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-400 hover:to-purple-500 rounded-xl font-semibold transition-all transform hover:scale-[1.02]">
                        Start Free Trial
                    </a>
                    <a href="#features" 
                       class="px-8 py-4 bg-white/5 hover:bg-white/10 rounded-xl transition-all">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid -->
    <section id="features" class="relative py-24 bg-white/5 backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-8">
            <h2 class="text-4xl font-bold text-center mb-20 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400">
                Enterprise-Grade Security Features
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="glass-container p-8 bg-white/5 rounded-xl border border-white/10 hover:border-white/20 transition-all">
                    <div class="w-16 h-16 mb-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">AES-256 Encryption</h3>
                    <p class="text-gray-300">Bank-level encryption for files at rest and in transit</p>
                </div>

                <!-- Feature Card 2 -->
                <div class="glass-container p-8 bg-white/5 rounded-xl border border-white/10 hover:border-white/20 transition-all">
                    <div class="w-16 h-16 mb-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-fingerprint text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Zero-Knowledge Proof</h3>
                    <p class="text-gray-300">We never store or access your encryption keys</p>
                </div>

                <!-- Feature Card 3 -->
                <div class="glass-container p-8 bg-white/5 rounded-xl border border-white/10 hover:border-white/20 transition-all">
                    <div class="w-16 h-16 mb-6 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-hourglass-half text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Auto-Expiration</h3>
                    <p class="text-gray-300">Set expiration dates for sensitive files automatically</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative py-24">
        <div class="max-w-7xl mx-auto px-8">
            <div class="glass-container p-12 bg-white/5 backdrop-blur-lg rounded-3xl border border-white/10">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="p-6">
                        <div class="text-5xl font-bold bg-gradient-to-r from-pink-400 to-blue-400 bg-clip-text text-transparent">2M+</div>
                        <div class="text-gray-300 mt-2">Protected Files</div>
                    </div>
                    <div class="p-6">
                        <div class="text-5xl font-bold bg-gradient-to-r from-pink-400 to-blue-400 bg-clip-text text-transparent">99.99%</div>
                        <div class="text-gray-300 mt-2">Uptime Guarantee</div>
                    </div>
                    <div class="p-6">
                        <div class="text-5xl font-bold bg-gradient-to-r from-pink-400 to-blue-400 bg-clip-text text-transparent">150+</div>
                        <div class="text-gray-300 mt-2">Countries Served</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24">
        <div class="max-w-4xl mx-auto px-8 text-center">
            <div class="glass-container p-12 bg-gradient-to-br from-pink-500/20 to-purple-600/20 backdrop-blur-lg rounded-3xl border border-white/10">
                <h2 class="text-4xl font-bold mb-6">Ready to Secure Your Data?</h2>
                <p class="text-gray-300 mb-8 text-xl">Join thousands of businesses trusting SecureSphere with their sensitive data</p>
                <a href="register.php" 
                   class="inline-block px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-400 hover:to-purple-500 rounded-xl font-semibold transition-all transform hover:scale-[1.02]">
                    Start Your Free Trial
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative border-t border-white/10 py-12">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-lock text-white text-sm"></i>
                        </div>
                        <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400">
                            SecureSphere
                        </span>
                    </div>
                    <p class="text-gray-400">© 2025 SecureSphere. All rights reserved.</p>
                </div>
                <div>
                    <h4 class="text-gray-300 font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white">Features</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Security</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-gray-300 font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-gray-300 font-semibold mb-4">Connect</h4>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>