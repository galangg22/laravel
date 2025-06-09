@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-[#002c14] via-[#000000] to-[#002c14] min-h-screen text-white">
    <div class="container mx-auto px-4 py-8">
        
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>

        <!-- Profile Container -->
        <div class="max-w-2xl mx-auto bg-gray-900/50 rounded-2xl border border-green-600/30 backdrop-blur-sm">
            
            <!-- Profile Header -->
            <div class="relative p-8 text-center border-b border-green-600/30">
                <!-- Avatar Section - hanya untuk klik -->
                <div class="relative inline-block mb-6">
                    <div id="profileAvatar" class="w-32 h-32 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-4xl font-bold text-white shadow-2xl border-4 border-green-400/30 overflow-hidden cursor-pointer hover:scale-105 transition-transform"
                         style="font-family: 'Orbitron', sans-serif;" title="Click to change profile picture">
                        @if ($user->profile && $user->profile->profile_picture)
                            <img src="{{ asset('storage/profiles/' . $user->profile->profile_picture) }}" 
                                 alt="Profile Picture" 
                                 class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>
                    
                    <!-- Hover overlay -->
                    <div id="avatarOverlay" class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <h1 id="userNameDisplay" class="text-3xl font-bold text-green-400 mb-2" style="font-family: 'Orbitron', sans-serif;">
                    {{ $user->name }}
                </h1>
                <p class="text-gray-300 text-lg">{{ $user->email }}</p>
                
                @if($user->profile)
                    <div class="mt-4 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        @switch($user->profile->status)
                            @case('jomblo') bg-blue-600/20 text-blue-300 @break
                            @case('hts') bg-purple-600/20 text-purple-300 @break
                            @case('healthy relationship') bg-green-600/20 text-green-300 @break
                            @case('toxic relationship') bg-red-600/20 text-red-300 @break
                            @default bg-gray-600/20 text-gray-300
                        @endswitch">
                        @switch($user->profile->status)
                            @case('jomblo') 🙋‍♂️ Jomblo @break
                            @case('hts') 💕 HTS @break
                            @case('backburner') 🔥 Backburner @break
                            @case('gak laku') 😅 Gak Laku @break
                            @case('toxic relationship') ☠️ Toxic Relationship @break
                            @case('healthy relationship') 💚 Healthy Relationship @break
                            @case('tidak direstui') 😢 Tidak Direstui @break
                            @case('diselingkuhin') 💔 Diselingkuhin @break
                            @case('gamon') 🎭 Gamon @break
                            @default {{ $user->profile->status }}
                        @endswitch
                    </div>
                @endif
            </div>

            <!-- Profile Form -->
            <div class="p-8">
                <form id="profileForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="md:col-span-2">
                            <label class="block text-green-400 font-semibold mb-2">Full Name</label>
                            <input type="text" name="name" 
                                value="{{ old('name', $user->name) }}"
                                required
                                maxlength="8"
                                class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-green-500 focus:outline-none transition-colors"
                                placeholder="Enter your full name (max 8 characters)">
                        </div>

                        <!-- Relationship Status -->
                        <div class="md:col-span-2">
                            <label class="block text-green-400 font-semibold mb-2">Relationship Status</label>
                            <select name="status" required class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-green-500 focus:outline-none transition-colors">
                                <option value="">Choose your status...</option>
                                <option value="jomblo" {{ old('status', $user->profile->status ?? '') == 'jomblo' ? 'selected' : '' }}>🙋‍♂️ Jomblo</option>
                                <option value="hts" {{ old('status', $user->profile->status ?? '') == 'hts' ? 'selected' : '' }}>💕 HTS (Hubungan Tanpa Status)</option>
                                <option value="backburner" {{ old('status', $user->profile->status ?? '') == 'backburner' ? 'selected' : '' }}>🔥 Backburner</option>
                                <option value="gak laku" {{ old('status', $user->profile->status ?? '') == 'gak laku' ? 'selected' : '' }}>😅 Gak Laku</option>
                                <option value="toxic relationship" {{ old('status', $user->profile->status ?? '') == 'toxic relationship' ? 'selected' : '' }}>☠️ Toxic Relationship</option>
                                <option value="healthy relationship" {{ old('status', $user->profile->status ?? '') == 'healthy relationship' ? 'selected' : '' }}>💚 Healthy Relationship</option>
                                <option value="tidak direstui" {{ old('status', $user->profile->status ?? '') == 'tidak direstui' ? 'selected' : '' }}>😢 Tidak Direstui</option>
                                <option value="diselingkuhin" {{ old('status', $user->profile->status ?? '') == 'diselingkuhin' ? 'selected' : '' }}>💔 Diselingkuhin</option>
                                <option value="gamon" {{ old('status', $user->profile->status ?? '') == 'gamon' ? 'selected' : '' }}>🎭 Gamon</option>
                            </select>
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-green-400 font-semibold mb-2">Gender</label>
                            <div class="flex gap-4">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="male" {{ old('gender', $user->profile->gender ?? '') == 'male' ? 'checked' : '' }} required class="mr-2 text-green-500 focus:ring-green-500">
                                    <span class="text-white">Male</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="female" {{ old('gender', $user->profile->gender ?? '') == 'female' ? 'checked' : '' }} required class="mr-2 text-green-500 focus:ring-green-500">
                                    <span class="text-white">Female</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="other" {{ old('gender', $user->profile->gender ?? '') == 'other' ? 'checked' : '' }} required class="mr-2 text-green-500 focus:ring-green-500">
                                    <span class="text-white">Other</span>
                                </label>
                            </div>
                        </div>

                        <!-- Age -->
                        <div>
                            <label class="block text-green-400 font-semibold mb-2">Age</label>
                            <input type="number" name="age" min="13" max="100" 
                                   value="{{ old('age', $user->profile->age ?? '') }}"
                                   class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-green-500 focus:outline-none transition-colors"
                                   placeholder="Enter your age">
                        </div>

                        <!-- Bio -->
                        <div class="md:col-span-2">
                            <label class="block text-green-400 font-semibold mb-2">Bio</label>
                            <textarea name="bio" rows="4" 
                                      class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-green-500 focus:outline-none resize-none transition-colors"
                                      placeholder="Tell us about yourself...">{{ old('bio', $user->profile->bio ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex gap-4">
                        <button type="submit" id="submitBtn" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition-colors">
                            @if($user->profile)
                                Update Profile
                            @else
                                Create Profile
                            @endif
                        </button>
                        <button type="button" id="cancelBtn" class="px-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition-colors">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Profile Picture Modal -->
    <div id="profilePictureModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-gray-900 rounded-2xl border border-green-600/30 p-8 max-w-md w-full mx-4">
            <!-- Modal Header -->
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-green-400 mb-2" style="font-family: 'Orbitron', sans-serif;">
                    Change Profile Picture
                </h3>
                <p class="text-gray-400 text-sm">Max file size: 5MB</p>
            </div>
            
            <!-- Current Profile Picture Preview -->
            <div class="text-center mb-6">
                <div id="modalProfilePreview" class="w-32 h-32 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-4xl font-bold text-white shadow-2xl border-4 border-green-400/30 overflow-hidden mx-auto"
                     style="font-family: 'Orbitron', sans-serif;">
                    @if ($user->profile && $user->profile->profile_picture)
                        <img src="{{ asset('storage/profiles/' . $user->profile->profile_picture) }}" 
                             alt="Profile Picture" 
                             class="w-full h-full object-cover">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>
            </div>
            
            <!-- Upload Options -->
            <div class="space-y-4" id="uploadOptionsContainer">
                <!-- Gallery Button -->
                <label for="profile_picture_gallery" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-6 rounded-lg cursor-pointer transition-colors flex items-center justify-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    📁 Choose from Gallery
                </label>
                
                <!-- Camera Button (Mobile) -->
                <label for="profile_picture_camera" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg cursor-pointer transition-colors flex items-center justify-center gap-3 md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    📷 Take Photo
                </label>
                
                <!-- Webcam Button (Desktop) -->
                <button id="webcamButton" type="button" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors items-center justify-center gap-3 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    🎥 Use Webcam
                </button>
            </div>
            
            <!-- Close Button -->
            <div class="mt-6 text-center">
                <button id="closeProfileModal" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
                    Close
                </button>
            </div>
            
            <!-- Hidden file inputs -->
            <input type="file" id="profile_picture_gallery" name="profile_picture" accept="image/*" class="hidden">
            <input type="file" id="profile_picture_camera" name="profile_picture" accept="image/*" capture="environment" class="hidden">
        </div>
    </div>

    <!-- Webcam Modal -->
    <div id="webcamModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-gray-900 rounded-2xl border border-purple-600/30 p-8 max-w-lg w-full mx-4">
            <!-- Modal Header -->
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-purple-400 mb-2" style="font-family: 'Orbitron', sans-serif;">
                    Take Photo with Webcam
                </h3>
                <p class="text-gray-400 text-sm">Position yourself and click capture</p>
            </div>
            
            <!-- Video Preview -->
            <div class="text-center mb-6 relative">
                <video id="webcamVideo" class="w-full h-64 bg-gray-800 rounded-lg object-cover" autoplay playsinline muted></video>
                <canvas id="webcamCanvas" class="hidden"></canvas>
                
                <!-- Loading indicator -->
                <div id="webcamLoading" class="absolute inset-0 bg-gray-800 rounded-lg flex items-center justify-center">
                    <div class="text-white text-center">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-400 mx-auto mb-2"></div>
                        <p class="text-sm">Accessing camera...</p>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <div class="flex gap-4">
                <button id="captureButton" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    📸 Capture Photo
                </button>
                <button id="retakeButton" class="px-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition-colors hidden">
                    🔄 Retake
                </button>
                <button id="closeWebcamModal" class="px-6 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 rounded-lg transition-colors">
                    ❌ Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 DOM Content Loaded - Initializing profile page');
    
    // Get all elements
    const profileForm = document.getElementById('profileForm');
    const profileAvatar = document.getElementById('profileAvatar');
    const avatarOverlay = document.getElementById('avatarOverlay');
    const profilePictureModal = document.getElementById('profilePictureModal');
    const closeProfileModal = document.getElementById('closeProfileModal');
    const galleryInput = document.getElementById('profile_picture_gallery');
    const cameraInput = document.getElementById('profile_picture_camera');
    const submitBtn = document.getElementById('submitBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const uploadOptionsContainer = document.getElementById('uploadOptionsContainer');
    
    // WebRTC variables
    let webcamStream = null;
    let webcamVideo = null;
    let webcamCanvas = null;
    let capturedImageBlob = null;

    // Initialize webcam elements
    const webcamButton = document.getElementById('webcamButton');
    const webcamModal = document.getElementById('webcamModal');
    const closeWebcamModal = document.getElementById('closeWebcamModal');
    const captureButton = document.getElementById('captureButton');
    const retakeButton = document.getElementById('retakeButton');
    const webcamLoading = document.getElementById('webcamLoading');
    
    // Debug: Check if elements exist
    console.log('📋 Elements found:');
    console.log('✅ profileAvatar:', !!profileAvatar);
    console.log('✅ avatarOverlay:', !!avatarOverlay);
    console.log('✅ profilePictureModal:', !!profilePictureModal);
    console.log('✅ webcamButton:', !!webcamButton);
    console.log('✅ webcamModal:', !!webcamModal);
    
    if (!profileForm || !submitBtn || !cancelBtn) {
        console.error('❌ Required form elements not found!');
        return;
    }
    
    if (!profileAvatar || !profilePictureModal) {
        console.error('❌ Profile avatar or modal not found!');
        return;
    }
    
    console.log('✅ All elements found successfully');
    
    let isSaved = false;
    let hasChanges = false;

    // Initialize webcam elements
    if (webcamButton && webcamModal) {
        webcamVideo = document.getElementById('webcamVideo');
        webcamCanvas = document.getElementById('webcamCanvas');
    }

    // PERBAIKAN: Check webcam support yang lebih robust
    async function checkWebcamSupport() {
        console.log('🔍 Checking webcam support...');
        
        // Check basic getUserMedia support
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            console.warn('⚠️ getUserMedia not supported');
            hideWebcamButton('Browser tidak mendukung akses kamera');
            return false;
        }
        
        try {
            // Check for camera devices
            const devices = await navigator.mediaDevices.enumerateDevices();
            const videoDevices = devices.filter(device => device.kind === 'videoinput');
            
            console.log(`📹 Found ${videoDevices.length} video devices`);
            console.log('Video devices:', videoDevices);
            
            if (videoDevices.length === 0) {
                console.warn('⚠️ No video devices found');
                hideWebcamButton('Kamera tidak tersedia di perangkat ini');
                return false;
            }
            
            // Test if we can actually access a camera
            try {
                const testStream = await navigator.mediaDevices.getUserMedia({ 
                    video: { facingMode: 'user' },
                    audio: false 
                });
                
                // Stop the test stream immediately
                testStream.getTracks().forEach(track => track.stop());
                console.log('✅ Camera access test successful');
                return true;
                
            } catch (testError) {
                console.warn('⚠️ Camera access test failed:', testError.name);
                
                // Handle different error types
                let errorMessage = 'Kamera tidak dapat diakses';
                switch(testError.name) {
                    case 'NotFoundError':
                        errorMessage = 'Kamera tidak ditemukan di perangkat ini';
                        break;
                    case 'NotAllowedError':
                        errorMessage = 'Akses kamera diblokir. Silakan izinkan akses kamera di browser';
                        break;
                    case 'NotReadableError':
                        errorMessage = 'Kamera sedang digunakan aplikasi lain';
                        break;
                    default:
                        errorMessage = `Kamera tidak tersedia: ${testError.message}`;
                }
                
                hideWebcamButton(errorMessage);
                return false;
            }
            
        } catch (error) {
            console.error('❌ Error checking devices:', error);
            hideWebcamButton('Gagal memeriksa ketersediaan kamera');
            return false;
        }
    }

    // Function untuk hide webcam button dan show message
    function hideWebcamButton(message) {
        if (webcamButton) {
            webcamButton.style.display = 'none';
            console.log(`🚫 Webcam button hidden: ${message}`);
            
            // Tambahkan pesan info di tempat webcam button
            const infoMessage = document.createElement('div');
            infoMessage.className = 'w-full bg-gray-600 text-gray-300 font-semibold py-4 px-6 rounded-lg flex items-center justify-center gap-3 text-sm';
            infoMessage.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
                ${message}
            `;
            
            // Insert after webcam button
            if (uploadOptionsContainer) {
                uploadOptionsContainer.appendChild(infoMessage);
            }
        }
    }

    // Function untuk check webcam availability sebelum open modal
    async function checkWebcamAvailability() {
        try {
            // Check basic support
            if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                if (typeof window.showAlert === 'function') {
                    window.showAlert('Browser tidak mendukung akses kamera', 'error');
                } else {
                    alert('Browser tidak mendukung akses kamera');
                }
                return false;
            }
            
            // Check for devices
            const devices = await navigator.mediaDevices.enumerateDevices();
            const videoDevices = devices.filter(device => device.kind === 'videoinput');
            
            if (videoDevices.length === 0) {
                if (typeof window.showAlert === 'function') {
                    window.showAlert('Kamera tidak tersedia di perangkat ini. Silakan gunakan opsi Gallery untuk upload foto.', 'warning');
                } else {
                    alert('Kamera tidak tersedia di perangkat ini. Silakan gunakan opsi Gallery untuk upload foto.');
                }
                return false;
            }
            
            return true;
            
        } catch (error) {
            console.error('❌ Error checking webcam availability:', error);
            if (typeof window.showAlert === 'function') {
                window.showAlert('Gagal memeriksa ketersediaan kamera', 'error');
            } else {
                alert('Gagal memeriksa ketersediaan kamera');
            }
            return false;
        }
    }

    // Function to open modal
    function openModal() {
        console.log('📱 Opening modal...');
        if (profilePictureModal) {
            profilePictureModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            console.log('✅ Modal opened successfully');
        }
    }

    // Function to close modal
    function closeModal() {
        console.log('❌ Closing modal...');
        if (profilePictureModal) {
            profilePictureModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            console.log('✅ Modal closed successfully');
        }
    }

    // PERBAIKAN: Function to open webcam modal dengan pre-check
    async function openWebcamModal() {
        try {
            console.log('🎥 Requesting webcam access...');
            
            // Pre-check webcam availability
            const isAvailable = await checkWebcamAvailability();
            if (!isAvailable) {
                return; // checkWebcamAvailability will show the error
            }
            
            // Close profile modal first
            if (profilePictureModal) {
                profilePictureModal.classList.add('hidden');
            }
            
            // Show webcam modal
            webcamModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Show loading indicator
            if (webcamLoading) {
                webcamLoading.classList.remove('hidden');
            }
            
            // PERBAIKAN: Constraints yang lebih spesifik
            const constraints = {
                video: {
                    width: { ideal: 640, max: 1280 },
                    height: { ideal: 480, max: 720 },
                    facingMode: 'user',
                    frameRate: { ideal: 30 }
                },
                audio: false // Tidak perlu audio untuk foto
            };
            
            console.log('📋 Using constraints:', constraints);
            
            // Request webcam access dengan error handling yang lebih baik
            webcamStream = await navigator.mediaDevices.getUserMedia(constraints);
            
            console.log('✅ Webcam stream obtained');
            
            if (!webcamVideo) {
                throw new Error('Webcam video element not found');
            }
            
            webcamVideo.srcObject = webcamStream;
            
            // PERBAIKAN: Event listener yang lebih robust
            webcamVideo.onloadedmetadata = function() {
                console.log('📹 Video metadata loaded');
                webcamVideo.play().then(() => {
                    console.log('▶️ Video playing');
                    
                    // Hide loading indicator
                    if (webcamLoading) {
                        webcamLoading.classList.add('hidden');
                    }
                    
                    if (captureButton) {
                        captureButton.disabled = false;
                        console.log('✅ Capture button enabled');
                    }
                }).catch(error => {
                    console.error('❌ Error playing video:', error);
                    throw error;
                });
            };
            
            webcamVideo.onerror = function(error) {
                console.error('❌ Video error:', error);
                throw new Error('Video playback failed');
            };
            
        } catch (error) {
            console.error('❌ Error accessing webcam:', error);
            
            let errorMessage = 'Tidak dapat mengakses kamera. ';
            
            // PERBAIKAN: Error handling yang lebih spesifik
            switch(error.name) {
                case 'NotAllowedError':
                    errorMessage += 'Silakan izinkan akses kamera di browser Anda.';
                    break;
                case 'NotFoundError':
                    errorMessage += 'Kamera tidak ditemukan. Silakan sambungkan webcam.';
                    break;
                case 'NotReadableError':
                    errorMessage += 'Kamera sedang digunakan aplikasi lain.';
                    break;
                case 'OverconstrainedError':
                    errorMessage += 'Pengaturan kamera tidak dapat dipenuhi.';
                    break;
                case 'SecurityError':
                    errorMessage += 'Akses kamera diblokir oleh pengaturan keamanan.';
                    break;
                default:
                    errorMessage += `Error: ${error.message || 'Terjadi kesalahan tidak diketahui'}`;
            }
            
            if (typeof window.showAlert === 'function') {
                window.showAlert(errorMessage, 'error');
            } else {
                alert(errorMessage);
            }
            
            closeWebcamModalFunc();
        }
    }

    // Function to close webcam modal
    function closeWebcamModalFunc() {
        if (webcamStream) {
            // Stop all tracks
            webcamStream.getTracks().forEach(track => track.stop());
            webcamStream = null;
        }
        
        if (webcamModal) {
            webcamModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Show loading indicator for next time
        if (webcamLoading) {
            webcamLoading.classList.remove('hidden');
        }
        
        // Reset states
        if (captureButton) captureButton.disabled = true;
        if (retakeButton) retakeButton.classList.add('hidden');
        if (captureButton) captureButton.classList.remove('hidden');
        
        console.log('✅ Webcam modal closed');
    }

    // PERBAIKAN: Function to capture photo yang lebih robust
    function capturePhoto() {
        try {
            console.log('📸 Starting photo capture...');
            
            if (!webcamVideo || !webcamCanvas) {
                throw new Error('Video or canvas element not found');
            }
            
            if (webcamVideo.readyState !== webcamVideo.HAVE_ENOUGH_DATA) {
                throw new Error('Video not ready for capture');
            }
            
            const context = webcamCanvas.getContext('2d');
            
            // PERBAIKAN: Set canvas size berdasarkan video yang sebenarnya
            const videoWidth = webcamVideo.videoWidth || webcamVideo.clientWidth;
            const videoHeight = webcamVideo.videoHeight || webcamVideo.clientHeight;
            
            console.log(`📐 Video dimensions: ${videoWidth}x${videoHeight}`);
            
            webcamCanvas.width = videoWidth;
            webcamCanvas.height = videoHeight;
            
            // PERBAIKAN: Clear canvas sebelum draw
            context.clearRect(0, 0, videoWidth, videoHeight);
            
            // Draw video frame to canvas
            context.drawImage(webcamVideo, 0, 0, videoWidth, videoHeight);
            
            console.log('🎨 Image drawn to canvas');
            
            // PERBAIKAN: Convert to blob dengan quality control
            webcamCanvas.toBlob(function(blob) {
                try {
                    if (!blob) {
                        throw new Error('Failed to create image blob');
                    }
                    
                    console.log(`📦 Blob created: ${(blob.size / 1024).toFixed(2)}KB`);
                    
                    // Validasi ukuran file (5MB)
                    const maxSize = 5 * 1024 * 1024;
                    if (blob.size > maxSize) {
                        throw new Error(`Image too large: ${(blob.size / 1024 / 1024).toFixed(2)}MB (max 5MB)`);
                    }
                    
                    capturedImageBlob = blob;
                    
                    // Show preview
                    const imageUrl = URL.createObjectURL(blob);
                    console.log('🖼️ Image URL created');
                    
                    // Update avatar
                    updateAvatarWithImage(imageUrl);
                    
                    // Update modal preview
                    const modalPreview = document.querySelector('#modalProfilePreview');
                    if (modalPreview) {
                        modalPreview.innerHTML = `<img src="${imageUrl}" alt="Profile Picture" class="w-full h-full object-cover">`;
                    }
                    
                    // Clear other inputs
                    if (galleryInput) galleryInput.value = '';
                    if (cameraInput) cameraInput.value = '';
                    
                    hasChanges = true;
                    
                    // Show success and close
                    if (typeof window.showAlert === 'function') {
                        window.showAlert('Photo captured successfully! Don\'t forget to save your changes.', 'success');
                    } else {
                        alert('Photo captured successfully!');
                    }
                    
                    closeWebcamModalFunc();
                    
                } catch (error) {
                    console.error('❌ Error processing captured image:', error);
                    if (typeof window.showAlert === 'function') {
                        window.showAlert(error.message, 'error');
                    } else {
                        alert(error.message);
                    }
                }
            }, 'image/jpeg', 0.85); // Quality 85%
            
        } catch (error) {
            console.error('❌ Error capturing photo:', error);
            if (typeof window.showAlert === 'function') {
                window.showAlert(`Capture failed: ${error.message}`, 'error');
            } else {
                alert(`Capture failed: ${error.message}`);
            }
        }
    }

    // PERBAIKAN: Helper function untuk update avatar
    function updateAvatarWithImage(imageUrl) {
        const avatarContainer = document.querySelector('#profileAvatar');
        if (avatarContainer) {
            const overlay = avatarContainer.querySelector('#avatarOverlay');
            avatarContainer.innerHTML = `<img src="${imageUrl}" alt="Profile Picture" class="w-full h-full object-cover">`;
            
            if (overlay) {
                avatarContainer.appendChild(overlay);
                // Re-attach event listener to overlay
                overlay.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('🖱️ New overlay clicked!');
                    openModal();
                });
            }
            console.log('✅ Avatar updated successfully');
        }
    }

    // PERBAIKAN: Event listener untuk profile avatar
    if (profileAvatar) {
        profileAvatar.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('🖱️ Profile avatar clicked!');
            openModal();
        });
    }

    // PERBAIKAN: Event listener untuk overlay juga
    if (avatarOverlay) {
        avatarOverlay.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('🖱️ Avatar overlay clicked!');
            openModal();
        });
    }

    // Webcam button event listener dengan pre-check
    if (webcamButton) {
        webcamButton.addEventListener('click', async function() {
            console.log('🎥 Webcam button clicked...');
            
            // Check availability first
            const isAvailable = await checkWebcamAvailability();
            if (isAvailable) {
                openWebcamModal();
            }
        });
    }

    // Close modal with button
    if (closeProfileModal) {
        closeProfileModal.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('🖱️ Close button clicked');
            closeModal();
        });
    }

    // Close webcam modal
    if (closeWebcamModal) {
        closeWebcamModal.addEventListener('click', function() {
            console.log('❌ Closing webcam modal...');
            closeWebcamModalFunc();
        });
    }

    // Capture photo
    if (captureButton) {
        captureButton.addEventListener('click', function() {
            console.log('📸 Capturing photo...');
            capturePhoto();
        });
    }

    // Retake photo
    if (retakeButton) {
        retakeButton.addEventListener('click', function() {
            console.log('🔄 Retaking photo...');
            retakeButton.classList.add('hidden');
            captureButton.classList.remove('hidden');
            capturedImageBlob = null;
        });
    }
    
    // Close modal when clicking outside
    if (profilePictureModal) {
        profilePictureModal.addEventListener('click', function(e) {
            if (e.target === profilePictureModal) {
                console.log('🖱️ Clicked outside modal');
                closeModal();
            }
        });
    }

    // Close webcam modal when clicking outside
    if (webcamModal) {
        webcamModal.addEventListener('click', function(e) {
            if (e.target === webcamModal) {
                console.log('🖱️ Clicked outside webcam modal');
                closeWebcamModalFunc();
            }
        });
    }

    // Function untuk handle file upload
    function handleFileUpload(file, inputElement) {
        if (!file) {
            console.log('❌ No file selected');
            return;
        }
        
        console.log('📁 File selected:', file.name, 'Size:', (file.size / 1024 / 1024).toFixed(2) + 'MB');
        
        // Validasi ukuran file (5MB)
        const maxSize = 5 * 1024 * 1024;
        if (file.size > maxSize) {
            console.log('❌ File too large:', (file.size / 1024 / 1024).toFixed(2) + 'MB');
            if (typeof window.showAlert === 'function') {
                window.showAlert('File terlalu besar! Maksimal ukuran file adalah 5MB.', 'error');
            } else {
                alert('File terlalu besar! Maksimal ukuran file adalah 5MB.');
            }
            inputElement.value = '';
            return;
        }
        
        // Validasi tipe file
        if (!file.type.startsWith('image/')) {
            console.log('❌ Invalid file type:', file.type);
            if (typeof window.showAlert === 'function') {
                window.showAlert('File harus berupa gambar!', 'error');
            } else {
                alert('File harus berupa gambar!');
            }
            inputElement.value = '';
            return;
        }
        
        console.log('✅ File validation passed');
        
        // Clear webcam blob
        capturedImageBlob = null;
        
        // Preview gambar
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageHtml = `<img src="${e.target.result}" alt="Profile Picture" class="w-full h-full object-cover">`;
            
            // Update avatar utama (keep the overlay)
            const avatarContainer = document.querySelector('#profileAvatar');
            if (avatarContainer) {
                // Save overlay before replacing content
                const overlay = avatarContainer.querySelector('#avatarOverlay');
                avatarContainer.innerHTML = imageHtml;
                // Re-add overlay
                if (overlay) {
                    avatarContainer.appendChild(overlay);
                    // Re-attach event listener to overlay
                    overlay.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        console.log('🖱️ New overlay clicked!');
                        openModal();
                    });
                }
                console.log('✅ Avatar updated');
            }
            
            // Update preview di modal
            const modalPreview = document.querySelector('#modalProfilePreview');
            if (modalPreview) {
                modalPreview.innerHTML = imageHtml;
                console.log('✅ Modal preview updated');
            }
        };
        reader.readAsDataURL(file);
        hasChanges = true;
        
        // Close modal after selecting file
        closeModal();
        
        // Show success message
        if (typeof window.showAlert === 'function') {
            window.showAlert('Profile picture selected! Don\'t forget to save your changes.', 'info');
        } else {
            alert('Profile picture selected! Don\'t forget to save your changes.');
        }
    }

    // Event listeners untuk file inputs
    if (galleryInput) {
        galleryInput.addEventListener('change', function(e) {
            console.log('📁 Gallery input changed');
            handleFileUpload(e.target.files[0], this);
            // Clear camera input
            if (cameraInput) cameraInput.value = '';
        });
    }

    if (cameraInput) {
        cameraInput.addEventListener('change', function(e) {
            console.log('📷 Camera input changed');
            handleFileUpload(e.target.files[0], this);
            // Clear gallery input
            if (galleryInput) galleryInput.value = '';
        });
    }

    // Form submission
    profileForm.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('📤 Form submitted');
        
        const formData = new FormData(this);
        
        // Add selected file to form data
        if (capturedImageBlob) {
            // Webcam captured image
            formData.append('profile_picture', capturedImageBlob, 'webcam-photo.jpg');
            console.log('✅ Added webcam blob to form data');
        } else if (galleryInput && galleryInput.files[0]) {
            // Gallery selected image
            formData.append('profile_picture', galleryInput.files[0]);
            console.log('✅ Added gallery file to form data');
        } else if (cameraInput && cameraInput.files[0]) {
            // Camera captured image (mobile)
            formData.append('profile_picture', cameraInput.files[0]);
            console.log('✅ Added camera file to form data');
        }
        
        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        
        if (!csrfTokenElement) {
            if (typeof window.showAlert === 'function') {
                window.showAlert('Please refresh the page and try again.', 'error');
            } else {
                alert('Please refresh the page and try again.');
            }
            return;
        }
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Saving...';
        
        const updateRoute = @if($user->profile) 
            '{{ route("user.profile.update") }}' 
        @else 
            '{{ route("profile.setup") }}'
        @endif;
        
        console.log('🚀 Sending request to:', updateRoute);
        
        fetch(updateRoute, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfTokenElement.getAttribute('content')
            }
        })
        .then(response => {
            console.log('📡 Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('📨 Response data:', data);
            if (data.success) {
                if (typeof window.showAlert === 'function') {
                    window.showAlert('Profile saved successfully!', 'success').then(() => {
                        window.location.href = '{{ route("dashboard.index") }}';
                    });
                } else {
                    alert('Profile saved successfully!');
                    window.location.href = '{{ route("dashboard.index") }}';
                }
                
                isSaved = true;
                hasChanges = false;
            } else {
                if (typeof window.showAlert === 'function') {
                    window.showAlert(data.message || 'Error saving profile', 'error');
                } else {
                    alert('Error: ' + (data.message || 'Error saving profile'));
                }
            }
        })
        .catch(error => {
            console.error('❌ Error:', error);
            if (typeof window.showAlert === 'function') {
                window.showAlert('Something went wrong! Please try again.', 'error');
            } else {
                alert('Something went wrong! Please try again.');
            }
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = @if($user->profile) 'Update Profile' @else 'Create Profile' @endif;
        });
    });

    // Cancel button
    cancelBtn.addEventListener('click', function() {
        console.log('❌ Cancel button clicked');
        
        if (isSaved) {
            window.location.href = '{{ route("dashboard.index") }}';
            return;
        }
        
        if (hasChanges) {
            if (typeof window.confirmAction === 'function') {
                window.confirmAction(
                    'Unsaved Changes', 
                    'You have unsaved changes. Are you sure you want to leave?',
                    'Yes, leave',
                    'Stay here'
                ).then((confirmed) => {
                    if (confirmed) {
                        window.location.href = '{{ route("dashboard.index") }}';
                    }
                });
            } else {
                if (confirm('You have unsaved changes. Are you sure you want to leave?')) {
                    window.location.href = '{{ route("dashboard.index") }}';
                }
            }
        } else {
            window.location.href = '{{ route("dashboard.index") }}';
        }
    });

    // Track changes
    const formInputs = profileForm.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        if (input) {
            input.addEventListener('input', () => { hasChanges = true; });
            input.addEventListener('change', () => { hasChanges = true; });
        }
    });
    
    // Check webcam support saat page load
    checkWebcamSupport().then(isSupported => {
        if (isSupported) {
            console.log('✅ Webcam support confirmed');
        } else {
            console.log('❌ Webcam not supported or not available');
        }
    });
    
    console.log('🎉 Profile page initialized successfully');
});
</script>

<style>
/* Pastikan avatar bisa diklik */
#profileAvatar {
    cursor: pointer !important;
    user-select: none;
    position: relative;
}

#profileAvatar:hover {
    transform: scale(1.05) !important;
}

/* Hover overlay styling */
#avatarOverlay {
    pointer-events: auto !important;
    cursor: pointer !important;
    z-index: 10;
}

/* Sweet Alert Heart Horizon Theme */
.swal2-popup {
    border: 2px solid #22c55e !important;
    border-radius: 1rem !important;
    box-shadow: 0 0 30px rgba(34, 197, 94, 0.3) !important;
    backdrop-filter: blur(10px) !important;
}

.swal2-title {
    font-family: 'Orbitron', sans-serif !important;
    text-shadow: 0 0 10px rgba(34, 197, 94, 0.5) !important;
}

.swal2-content {
    font-family: 'Orbitron', sans-serif !important;
}

/* Radio button styling */
input[type="radio"]:checked {
    background-color: #22c55e;
    border-color: #22c55e;
}

input[type="radio"]:focus {
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

/* Modal styling */
#profilePictureModal {
    backdrop-filter: blur(5px);
    z-index: 9999 !important;
}

#webcamModal {
    backdrop-filter: blur(5px);
    z-index: 9999 !important;
}

/* PERBAIKAN: Webcam video styling yang diperbaiki */
#webcamVideo {
    border-radius: 8px;
    border: 2px solid rgba(147, 51, 234, 0.3);
    background-color: #1f2937;
    object-fit: cover;
}

#webcamVideo:not([src]) {
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 48px;
}

/* Loading animation */
@keyframes spin {
    to { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

/* Debug styling - hapus setelah testing */
#profileAvatar:hover::after {
    content: "Click me!";
    position: absolute;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(34, 197, 94, 0.9);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1000;
}
</style>

@endsection
