<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Upload | SecureSphere</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css>
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

        .upload-progress {
            background: linear-gradient(90deg, #ec4899 0%, #8b5cf6 100%);
            transition: width 0.3s ease;
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
                <a href="dashboard.php" class="text-gray-300 hover:text-white transition-colors">Dashboard</a>
                <a href="upload.php" class="text-gray-300 hover:text-white transition-colors">Upload</a>
                <a href="logout.php" class="px-6 py-2 bg-white/5 hover:bg-white/10 rounded-lg transition-all">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Upload Section -->
    <section class="relative py-24">
        <div class="max-w-7xl mx-auto px-8">
            <div class="glass-container bg-white/5 backdrop-blur-lg rounded-3xl border border-white/10 p-12">
                <div class="absolute inset-0 rounded-3xl opacity-30 mix-blend-overlay animate-holographic"></div>
                
                <h2 class="text-4xl font-bold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-blue-400">
                    Secure File Upload
                </h2>

                <!-- Upload Form -->
                <form action="upload.php" method="POST" enctype="multipart/form-data" class="space-y-8" id="uploadForm">
                    <!-- Drag & Drop Zone -->
                    <div class="group relative border-2 border-dashed border-white/20 rounded-2xl p-12 text-center transition-all hover:border-purple-400/50"
                         id="dropZone">
                        <div class="space-y-4">
                            <div class="text-6xl text-purple-400">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <p class="text-gray-300">Drag and drop files here</p>
                            <p class="text-gray-400 text-sm">or</p>
                            <label class="cursor-pointer px-6 py-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all">
                                Browse Files
                                <input type="file" name="files[]" multiple class="hidden" id="fileInput">
                            </label>
                        </div>
                    </div>

                    <!-- Selected Files Preview -->
                    <div class="space-y-4 hidden" id="filePreview">
                        <h3 class="text-xl text-gray-300">Selected Files:</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="fileList"></div>
                    </div>

                    <!-- Security Options -->
                    <div class="space-y-6">
                        <div class="group relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="encryption_password" 
                                   class="w-full pl-12 pr-5 py-4 bg-white/5 backdrop-blur-sm border border-white/20 rounded-xl focus:border-pink-400/50 focus:ring-2 focus:ring-pink-400/30 placeholder-gray-400 text-gray-100 transition-all duration-300 outline-none"
                                   placeholder="Encryption Password (optional)">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="group relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                    <i class="fas fa-calendar-times"></i>
                                </div>
                                <input type="date" name="expiration_date" 
                                       class="w-full pl-12 pr-5 py-4 bg-white/5 backdrop-blur-sm border border-white/20 rounded-xl focus:border-pink-400/50 focus:ring-2 focus:ring-pink-400/30 text-gray-100 transition-all duration-300 outline-none">
                            </div>

                            <div class="group relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                    <i class="fas fa-user-lock"></i>
                                </div>
                                <select name="access_level" 
                                        class="w-full pl-12 pr-5 py-4 bg-white/5 backdrop-blur-sm border border-white/20 rounded-xl focus:border-pink-400/50 focus:ring-2 focus:ring-pink-400/30 text-gray-100 transition-all duration-300 outline-none">
                                    <option value="private">Private</option>
                                    <option value="link">Anyone with Link</option>
                                    <option value="public">Public</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="h-3 bg-white/5 rounded-full overflow-hidden hidden" id="progressContainer">
                        <div class="upload-progress h-full w-0"></div>
                    </div>

                    <!-- Upload Button -->
                    <button type="submit" 
                            class="w-full py-4 px-6 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-400 hover:to-purple-500 text-white font-semibold rounded-xl transition-all transform hover:scale-[1.02] shadow-lg hover:shadow-pink-500/20 relative overflow-hidden">
                        <span class="relative z-10">Encrypt & Upload</span>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm opacity-0 hover:opacity-100 transition-opacity"></div>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Recent Uploads Section -->
    <section class="relative py-16">
        <div class="max-w-7xl mx-auto px-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-300">Recent Uploads</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- File Card Example -->
                <div class="glass-container p-6 bg-white/5 rounded-xl border border-white/10 hover:border-white/20 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-file-alt text-purple-400 text-xl"></i>
                            <span class="text-gray-300 truncate">document.pdf</span>
                        </div>
                        <div class="text-sm text-gray-400">2 hours ago</div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-400">Encrypted</span>
                        <div class="flex items-center gap-2">
                            <button class="text-purple-400 hover:text-purple-300">
                                <i class="fas fa-share"></i>
                            </button>
                            <button class="text-red-400 hover:text-red-300">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative border-t border-white/10 py-12">
        <!-- ... Same footer as homepage ... -->
    </footer>

    <script>
        // Drag & Drop Functionality
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');
        const filePreview = document.getElementById('filePreview');

        dropZone.addEventListener('click', () => fileInput.click());
        
        ['dragenter', 'dragover'].forEach(event => {
            dropZone.addEventListener(event, (e) => {
                e.preventDefault();
                dropZone.classList.add('border-purple-400', 'bg-white/10');
            });
        });

        ['dragleave', 'drop'].forEach(event => {
            dropZone.addEventListener(event, (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-purple-400', 'bg-white/10');
            });
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            fileInput.files = e.dataTransfer.files;
            handleFiles(fileInput.files);
        });

        fileInput.addEventListener('change', (e) => handleFiles(e.target.files));

        function handleFiles(files) {
            fileList.innerHTML = '';
            Array.from(files).forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.className = 'p-4 bg-white/5 rounded-lg flex items-center gap-4';
                fileItem.innerHTML = `
                    <i class="fas fa-file text-purple-400"></i>
                    <div class="flex-1">
                        <div class="text-gray-300 truncate">${file.name}</div>
                        <div class="text-sm text-gray-400">${(file.size/1024/1024).toFixed(2)} MB</div>
                    </div>
                `;
                fileList.appendChild(fileItem);
            });
            filePreview.classList.remove('hidden');
        }

        // Upload Progress Animation
        document.getElementById('uploadForm').addEventListener('submit', (e) => {
            const progressBar = document.querySelector('.upload-progress');
            const progressContainer = document.getElementById('progressContainer');
            progressContainer.classList.remove('hidden');
            
            // Simulate upload progress
            let width = 0;
            const interval = setInterval(() => {
                if(width >= 100) clearInterval(interval);
                progressBar.style.width = width + '%';
                width += Math.random() * 10;
            }, 200);
        });
    </script>
</body>
</html>