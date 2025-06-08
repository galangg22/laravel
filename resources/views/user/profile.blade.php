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
                <!-- Avatar Section -->
                <div class="relative inline-block mb-6">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-4xl font-bold text-white shadow-2xl border-4 border-green-400/30 overflow-hidden"
                         style="font-family: 'Orbitron', sans-serif;">
                        @if ($user->profile && $user->profile->profile_picture)
                            <img src="{{ asset('storage/profiles/' . $user->profile->profile_picture) }}" 
                                 alt="Profile Picture" 
                                 class="w-full h-full object-cover">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>
                    
                    <!-- Upload Button -->
                    <label for="profile_picture_input" class="absolute bottom-0 right-0 bg-green-600 hover:bg-green-700 rounded-full p-2 cursor-pointer shadow-lg border-2 border-green-400/50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </label>
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
                    
                    <!-- Hidden file input for profile picture -->
                    <input type="file" id="profile_picture_input" name="profile_picture" accept="image/*" class="hidden">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Full Name -->
                        <div class="md:col-span-2">
                            <label class="block text-green-400 font-semibold mb-2">Full Name</label>
                            <input type="text" name="name" 
                                   value="{{ old('name', $user->name) }}"
                                   required
                                   class="w-full bg-gray-800 border border-gray-600 rounded-lg px-4 py-3 text-white focus:border-green-500 focus:outline-none transition-colors"
                                   placeholder="Enter your full name">
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
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded - Initializing profile page');
    
    const profileForm = document.getElementById('profileForm');
    const profilePictureInput = document.getElementById('profile_picture_input');
    const submitBtn = document.getElementById('submitBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    
    if (!profileForm || !submitBtn || !cancelBtn) {
        console.error('Required elements not found!');
        return;
    }
    
    console.log('All elements found successfully');
    
    let isSaved = false;
    let hasChanges = false;

    // Profile picture preview
    if (profilePictureInput) {
        profilePictureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarContainer = document.querySelector('.w-32.h-32');
                    if (avatarContainer) {
                        avatarContainer.innerHTML = `<img src="${e.target.result}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">`;
                    }
                };
                reader.readAsDataURL(file);
                hasChanges = true;
            }
        });
    }

    // Form submission dengan Global Sweet Alert
    profileForm.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        
        const formData = new FormData(this);
        
        const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        
        if (!csrfTokenElement) {
            // GUNAKAN GLOBAL FUNCTION
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
        
        console.log('Sending request to:', updateRoute);
        
        fetch(updateRoute, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfTokenElement.getAttribute('content')
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                // GUNAKAN GLOBAL FUNCTION
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
                // GUNAKAN GLOBAL FUNCTION
                if (typeof window.showAlert === 'function') {
                    window.showAlert(data.message || 'Error saving profile', 'error');
                } else {
                    alert('Error: ' + (data.message || 'Error saving profile'));
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // GUNAKAN GLOBAL FUNCTION
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

    // Cancel button dengan Global Sweet Alert
    cancelBtn.addEventListener('click', function() {
        console.log('Cancel button clicked');
        
        if (isSaved) {
            window.location.href = '{{ route("dashboard.index") }}';
            return;
        }
        
        if (hasChanges) {
            // GUNAKAN GLOBAL FUNCTION
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
    
    console.log('Profile page initialized successfully');
});
</script>


<style>
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
</style>

@endsection
