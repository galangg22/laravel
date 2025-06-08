<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // Menampilkan halaman dashboard
    public function index()
    {
        $categories = Category::all();

        // Cek apakah user sudah memiliki profil
        $user = Auth::user();
        
        // Pastikan user ada dan load relasi profile
        if ($user) {
            // Gunakan with() untuk eager loading atau cek langsung
            $profile = $user->profile;
            $showProfilePopup = is_null($profile);
        } else {
            $showProfilePopup = false;
        }

        return view('user.dashboard', compact('categories', 'showProfilePopup'));
    }

    // Menampilkan kategori dan video berdasarkan kategori
    public function showCategory(Category $category)
    {
        $videos = $category->videos()->latest()->get();
        return view('user.category.show', compact('category', 'videos'));
    }

    // Menampilkan detail video
    public function showVideo(Category $category)
    {
        $videos = Video::where('category_id', $category->id)->latest()->get();
        return view('user.video.show', compact('category', 'videos'));
    }

    // PERBAIKAN: Menampilkan halaman profile user
    public function profile()
    {
        $user = Auth::user();
        
        // Pastikan user ada
        if (!$user) {
            return redirect()->route('login');
        }
        
        // PERBAIKAN: Jangan redirect jika belum ada profile
        // Biarkan user masuk ke halaman profile untuk membuat profile baru
        return view('user.profile', compact('user'));
    }

    // Menyimpan profil yang dibuat user
    public function storeProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|in:jomblo,hts,backburner,gak laku,toxic relationship,healthy relationship,tidak direstui,diselingkuhin,gamon',
                'bio' => 'nullable|string|max:500',
                'age' => 'nullable|integer|min:13|max:100',
                'gender' => 'required|in:male,female,other',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }
            
            // Update nama user
            $user->update([
                'name' => $request->name
            ]);
            
            // PERBAIKAN: Jika sudah ada profil, update saja
            if ($user->profile) {
                return $this->updateProfile($request);
            }

            $data = $request->only(['status', 'bio', 'age', 'gender']);
            $data['user_id'] = $user->id;

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $fileName = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
                
                // Simpan file ke storage/app/public/profiles
                $file->storeAs('public/profiles', $fileName);
                $data['profile_picture'] = $fileName;
            }

            // Buat profile baru
            Profile::create($data);

            return response()->json([
                'success' => true, 
                'message' => 'Profile created successfully!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    // Update profil user
    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|in:jomblo,hts,backburner,gak laku,toxic relationship,healthy relationship,tidak direstui,diselingkuhin,gamon',
                'bio' => 'nullable|string|max:500',
                'age' => 'nullable|integer|min:13|max:100',
                'gender' => 'required|in:male,female,other',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Update nama user
            $user->update([
                'name' => $request->name
            ]);
            
            // Jika belum ada profil, buat baru
            if (!$user->profile) {
                return $this->storeProfile($request);
            }

            $profile = $user->profile;
            $data = $request->only(['status', 'bio', 'age', 'gender']);

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                // Hapus foto lama jika ada
                if ($profile->profile_picture) {
                    Storage::delete('public/profiles/' . $profile->profile_picture);
                }

                $file = $request->file('profile_picture');
                $fileName = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/profiles', $fileName);
                $data['profile_picture'] = $fileName;
            }

            // Update profile
            $profile->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    // Menangani aksi "Lewati" ketika user memilih untuk melewati pembuatan profil
    public function skipProfileSetup(Request $request)
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // PERBAIKAN: Jika sudah ada profil, update saja
            if ($user->profile) {
                return response()->json([
                    'success' => true,
                    'message' => 'Profile already exists!'
                ]);
            }

            // Buatkan profil default
            Profile::create([
                'user_id' => $user->id,
                'status' => 'jomblo',
                'bio' => 'Belum ada deskripsi tentang saya.',
                'age' => null,
                'profile_picture' => null,
                'gender' => 'other',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Default profile created successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create default profile: ' . $e->getMessage()
            ], 500);
        }
    }

    // ===== FAVORITE METHODS =====

    // Toggle favorite (add/remove)
    public function toggleFavorite(Request $request, $videoId)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $video = Video::findOrFail($videoId);

            // Cek apakah sudah di-favorite
            $existingFavorite = Favorite::where('user_id', $user->id)
                                      ->where('video_id', $videoId)
                                      ->first();

            if ($existingFavorite) {
                // Jika sudah favorite, hapus (unlike)
                $existingFavorite->delete();
                $isFavorited = false;
                $message = 'Video removed from favorites';
            } else {
                // Jika belum favorite, tambah (like)
                Favorite::create([
                    'user_id' => $user->id,
                    'video_id' => $videoId
                ]);
                $isFavorited = true;
                $message = 'Video added to favorites';
            }

            // Hitung total favorites untuk video ini
            $favoritesCount = $video->favoritesCount();

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_favorited' => $isFavorited,
                'favorites_count' => $favoritesCount
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan daftar video favorite user
    public function favorites()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        $favoriteVideos = $user->favoriteVideos()
                              ->with('category')
                              ->latest('favorites.created_at')
                              ->get();

        return view('user.favorites', compact('favoriteVideos'));
    }

    // Hapus favorite
    public function removeFavorite($videoId)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }
            
            $favorite = Favorite::where('user_id', $user->id)
                               ->where('video_id', $videoId)
                               ->first();

            if ($favorite) {
                $favorite->delete();
                
                // Hitung ulang total favorites
                $video = Video::find($videoId);
                $favoritesCount = $video ? $video->favoritesCount() : 0;
                
                return response()->json([
                    'success' => true,
                    'message' => 'Video removed from favorites',
                    'favorites_count' => $favoritesCount
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Video not found in favorites'
                ], 404);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    // Get favorite status untuk video tertentu
    public function getFavoriteStatus($videoId)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $video = Video::findOrFail($videoId);
            $isFavorited = $user->hasFavorited($videoId);
            $favoritesCount = $video->favoritesCount();

            return response()->json([
                'success' => true,
                'is_favorited' => $isFavorited,
                'favorites_count' => $favoritesCount
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }

    // Get semua favorites user (untuk API)
    public function getUserFavorites()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $favorites = $user->favorites()
                             ->with(['video' => function($query) {
                                 $query->with('category');
                             }])
                             ->latest()
                             ->get();

            return response()->json([
                'success' => true,
                'favorites' => $favorites
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
}
