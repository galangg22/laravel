<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Horizon Class - Belajar Cinta Sehat untuk Remaja Indonesia</title>
    <meta name="description" content="Platform pembelajaran online pertama di Indonesia yang membantu remaja memahami cinta sehat, mengatasi patah hati, dan membangun hubungan positif.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#002c14',
                        'light-green': '#00ff88',
                        'accent-green': '#00cc66',
                        'soft-green': '#4ade80'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        @keyframes sparkle {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-heartbeat { animation: heartbeat 2s ease-in-out infinite; }
        .animate-sparkle { animation: sparkle 2s ease-in-out infinite; }
        .animate-fadeInUp { animation: fadeInUp 0.6s ease-out; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .avatar-gradient-1 {
            background: linear-gradient(135deg, #00ff88 0%, #00cc66 100%);
        }
        .avatar-gradient-2 {
            background: linear-gradient(135deg, #00cc66 0%, #4ade80 100%);
        }
        .avatar-gradient-3 {
            background: linear-gradient(135deg, #4ade80 0%, #00ff88 100%);
        }
        .illustration-container {
            background: linear-gradient(135deg, #002c14 0%, #00cc66 50%, #00ff88 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-dark-green to-accent-green rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">💕</span>
                    </div>
                    <h1 class="text-2xl font-bold text-dark-green">Heart Horizon Class</h1>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="#beranda" class="text-gray-700 hover:text-accent-green transition-colors">Beranda</a>
                    <a href="#fitur" class="text-gray-700 hover:text-accent-green transition-colors">Fitur</a>
                    <a href="#materi" class="text-gray-700 hover:text-accent-green transition-colors">Materi</a>
                    <a href="#testimoni" class="text-gray-700 hover:text-accent-green transition-colors">Testimoni</a>
                    <a href="#tentang" class="text-gray-700 hover:text-accent-green transition-colors">Tentang</a>
                    <a href="#kontak" class="text-gray-700 hover:text-accent-green transition-colors">Kontak</a>
                </div>
                <div class="flex space-x-3">
                    <!-- LINK LOGIN DAN REGISTER DITAMBAHKAN -->
                    <a href="<?php echo url('login') ?>" class="text-gray-700 hover:text-accent-green transition-colors px-4 py-2 rounded-full border border-gray-300 hover:border-accent-green">
                        Masuk
                    </a>
                    <a href="<?php echo url('register') ?>" class="bg-accent-green text-white px-6 py-2 rounded-full hover:bg-dark-green transition-colors">
                        Daftar Gratis
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="bg-gradient-to-br from-dark-green via-gray-900 to-dark-green text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 text-6xl animate-float">💖</div>
            <div class="absolute top-32 right-20 text-4xl animate-sparkle">✨</div>
            <div class="absolute bottom-20 left-20 text-5xl animate-heartbeat">🌟</div>
            <div class="absolute bottom-32 right-10 text-3xl animate-float">💕</div>
        </div>
        
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 animate-fadeInUp">
                    <h2 class="text-4xl md:text-6xl font-bold leading-tight">
                        Belajar <span class="text-light-green">Cinta Sehat</span> 
                        untuk Masa Depan yang Lebih Baik
                    </h2>
                    <p class="text-xl text-gray-300 leading-relaxed">
                        Platform pembelajaran online pertama di Indonesia yang membantu remaja usia 13-19 tahun 
                        memahami cinta sehat, mengatasi patah hati, dan membangun hubungan positif bersama psikolog berpengalaman.
                    </p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 py-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-light-green">5K+</div>
                            <div class="text-sm text-gray-400">Remaja Terbantu</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-light-green">200+</div>
                            <div class="text-sm text-gray-400">Video Pembelajaran</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-light-green">15+</div>
                            <div class="text-sm text-gray-400">Psikolog Ahli</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-light-green">98%</div>
                            <div class="text-sm text-gray-400">Tingkat Kepuasan</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- BUTTON DENGAN LINK KE REGISTER -->
                        <a href="<?php echo url('register') ?>" class="bg-light-green text-black px-8 py-4 rounded-full font-semibold hover:bg-accent-green transition-colors transform hover:scale-105 text-center">
                            Mulai Belajar Gratis
                        </a>
                        <button class="border-2 border-light-green text-light-green px-8 py-4 rounded-full font-semibold hover:bg-light-green hover:text-black transition-colors">
                            Lihat Demo Video
                        </button>
                    </div>
                </div>
                
                <div class="relative z-10">
                    <div class="illustration-container rounded-3xl p-8 md:p-12 shadow-2xl transform hover:scale-105 transition-transform duration-500">
                        <div class="text-center space-y-6">
                            <div class="text-6xl md:text-8xl animate-heartbeat">💕</div>
                            <h3 class="text-2xl md:text-3xl font-bold text-white">Heart Horizon</h3>
                            <p class="text-lg text-gray-100">Platform Pembelajaran Cinta Sehat</p>
                            <div class="flex justify-center space-x-4 text-3xl">
                                <span class="animate-sparkle">🌟</span>
                                <span class="animate-sparkle" style="animation-delay: 1s;">💖</span>
                                <span class="animate-sparkle" style="animation-delay: 2s;">✨</span>
                            </div>
                            <div class="grid grid-cols-3 gap-4 mt-6">
                                <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center">
                                    <div class="text-2xl">📚</div>
                                    <div class="text-xs text-gray-200">Materi</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center">
                                    <div class="text-2xl">👥</div>
                                    <div class="text-xs text-gray-200">Komunitas</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-3 text-center">
                                    <div class="text-2xl">🎯</div>
                                    <div class="text-xs text-gray-200">Tujuan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark-green mb-4">Mengapa Memilih Heart Horizon Class?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami memahami bahwa setiap remaja memiliki perjalanan cinta yang unik. 
                    Platform kami dirancang khusus untuk memberikan pembelajaran yang aman, positif, dan relevan.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-20 bg-gradient-to-r from-light-green to-accent-green rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark-green mb-4">Cinta Sehat & Positif</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pelajari cara mencintai dan dicintai dengan sehat, tanpa drama berlebihan atau toxic relationship. 
                        Materi dibuat berdasarkan penelitian psikologi terkini.
                    </p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-20 bg-gradient-to-r from-accent-green to-soft-green rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark-green mb-4">Komunitas Supportif</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Bergabung dengan ribuan remaja Indonesia lainnya dalam lingkungan yang aman, 
                        positif, dan bebas dari judgment. Sharing pengalaman dan saling mendukung.
                    </p>
                </div>
                
                <div class="text-center p-8 rounded-2xl bg-gradient-to-br from-gray-50 to-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-20 h-20 bg-gradient-to-r from-soft-green to-light-green rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-md text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark-green mb-4">Dibuat oleh Psikolog</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Semua materi dikembangkan oleh tim psikolog berpengalaman yang memahami 
                        perkembangan remaja Indonesia dan tantangan cinta di era digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Topics Section -->
    <section id="materi" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark-green mb-4">Apa yang Akan Kamu Pelajari?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kurikulum komprehensif yang dirancang khusus untuk remaja Indonesia, 
                    dengan pendekatan yang fun, relatable, dan mudah dipahami.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-400 to-pink-600 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">💝</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Self Love & Kepercayaan Diri</h3>
                    <p class="text-gray-600 mb-4">Belajar mencintai diri sendiri sebelum mencintai orang lain. Membangun kepercayaan diri yang sehat.</p>
                    <div class="text-sm text-accent-green font-semibold">8 Video • 2 Jam</div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-400 to-green-400 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">🚩</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Red Flags vs Green Flags</h3>
                    <p class="text-gray-600 mb-4">Mengenali tanda-tanda hubungan yang sehat vs tidak sehat. Kapan harus bertahan atau pergi.</p>
                    <div class="text-sm text-accent-green font-semibold">12 Video • 3 Jam</div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">💔</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Healing dari Patah Hati</h3>
                    <p class="text-gray-600 mb-4">Cara sehat untuk move on, proses healing yang benar, dan bangkit lebih kuat dari sebelumnya.</p>
                    <div class="text-sm text-accent-green font-semibold">10 Video • 2.5 Jam</div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">💬</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Komunikasi Efektif</h3>
                    <p class="text-gray-600 mb-4">Cara berkomunikasi yang sehat dalam hubungan, menyelesaikan konflik, dan membangun intimacy.</p>
                    <div class="text-sm text-accent-green font-semibold">15 Video • 4 Jam</div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-indigo-400 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">🛡️</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Boundaries & Consent</h3>
                    <p class="text-gray-600 mb-4">Memahami dan menetapkan batasan yang sehat, pentingnya consent dalam setiap aspek hubungan.</p>
                    <div class="text-sm text-accent-green font-semibold">8 Video • 2 Jam</div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-teal-400 rounded-full flex items-center justify-center mb-4">
                        <span class="text-2xl">⚖️</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark-green mb-3">Balance Cinta & Masa Depan</h3>
                    <p class="text-gray-600 mb-4">Cara menyeimbangkan hubungan dengan pendidikan, karir, dan tujuan hidup jangka panjang.</p>
                    <div class="text-sm text-accent-green font-semibold">6 Video • 1.5 Jam</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark-green mb-4">Cerita Sukses dari Teman-teman</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Ribuan remaja Indonesia sudah merasakan manfaatnya. Ini cerita mereka yang berhasil 
                    membangun hubungan yang lebih sehat dan bahagia.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 md:p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <div class="avatar-gradient-1 w-10 h-10 md:w-12 md:h-12 rounded-full mr-3 md:mr-4 flex items-center justify-center">
                            <span class="text-black font-bold text-sm md:text-base">S</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark-green text-sm md:text-base">Sari, 17 tahun</h4>
                            <p class="text-gray-500 text-xs md:text-sm">Jakarta</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                        "Dulu aku selalu toxic dalam hubungan, possessive banget dan gampang jealous. 
                        Setelah ikut Heart Horizon Class, aku belajar cara mencintai yang sehat. 
                        Sekarang hubunganku jauh lebih bahagia dan peaceful!"
                    </p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 md:p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <div class="avatar-gradient-2 w-10 h-10 md:w-12 md:h-12 rounded-full mr-3 md:mr-4 flex items-center justify-center">
                            <span class="text-black font-bold text-sm md:text-base">A</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark-green text-sm md:text-base">Andi, 16 tahun</h4>
                            <p class="text-gray-500 text-xs md:text-sm">Bandung</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                        "Setelah putus sama mantan, aku down banget sampai nilai sekolah turun. 
                        Materi tentang healing di sini bener-bener membantu aku move on dengan cara yang sehat. 
                        Sekarang aku fokus sama diri sendiri dulu."
                    </p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 md:p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4 md:mb-6">
                        <div class="avatar-gradient-3 w-10 h-10 md:w-12 md:h-12 rounded-full mr-3 md:mr-4 flex items-center justify-center">
                            <span class="text-black font-bold text-sm md:text-base">M</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-dark-green text-sm md:text-base">Maya, 18 tahun</h4>
                            <p class="text-gray-500 text-xs md:text-sm">Surabaya</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                        "Aku belajar tentang red flags dan green flags di sini. Ternyata selama ini aku 
                        sering ignore red flags karena 'cinta'. Sekarang aku lebih aware dan bisa 
                        bedain mana cowok yang bener-bener worth it."
                    </p>
                    <div class="flex text-yellow-400 text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold text-dark-green mb-8">Tentang Heart Horizon Class</h2>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="text-left space-y-6">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Heart Horizon Class lahir dari keprihatinan melihat banyaknya remaja Indonesia 
                            yang mengalami hubungan toxic, patah hati berkepanjangan, dan kurangnya edukasi 
                            tentang cinta sehat.
                        </p>
                        <p class="text-lg text-gray-700 leading-relaxed">
                            Kami percaya bahwa setiap remaja berhak mendapatkan edukasi yang tepat tentang 
                            cinta dan hubungan, sehingga mereka bisa membangun masa depan yang lebih bahagia 
                            dan sehat secara emosional.
                        </p>
                        <div class="bg-white p-6 rounded-xl shadow-lg">
                            <h3 class="font-bold text-dark-green mb-3">Visi Kami</h3>
                            <p class="text-gray-600">
                                Menjadi platform edukasi cinta sehat terdepan di Indonesia yang membantu 
                                generasi muda membangun hubungan yang positif dan berkelanjutan.
                            </p>
                        </div>
                    </div>
                    <div class="illustration-container rounded-3xl p-8 text-center">
                        <div class="space-y-6">
                            <div class="text-6xl animate-heartbeat">🎯</div>
                            <h3 class="text-2xl font-bold text-white">Misi Kami</h3>
                            <div class="grid grid-cols-2 gap-4 text-white">
                                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                                    <div class="text-2xl mb-2">📚</div>
                                    <div class="text-sm">Edukasi Berkualitas</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                                    <div class="text-2xl mb-2">🤝</div>
                                    <div class="text-sm">Komunitas Supportif</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                                    <div class="text-2xl mb-2">💡</div>
                                    <div class="text-sm">Inovasi Pembelajaran</div>
                                </div>
                                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                                    <div class="text-2xl mb-2">🌟</div>
                                    <div class="text-sm">Dampak Positif</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-dark-green mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Punya pertanyaan atau butuh bantuan? Tim kami siap membantu kamu 24/7.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-light-green to-accent-green rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-dark-green mb-2">Email</h3>
                            <p class="text-gray-600">hello@hearthorizon.id</p>
                            <p class="text-gray-600">support@hearthorizon.id</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-accent-green to-soft-green rounded-full flex items-center justify-center">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-dark-green mb-2">WhatsApp</h3>
                            <p class="text-gray-600">+62 812-3456-7890</p>
                            <p class="text-sm text-gray-500">Tersedia 24/7</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-soft-green to-light-green rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-dark-green mb-2">Alamat</h3>
                            <p class="text-gray-600">Jakarta, Indonesia</p>
                            <p class="text-sm text-gray-500">Platform Online</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <h3 class="font-bold text-dark-green mb-4">Ikuti Media Sosial Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gradient-to-r from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gradient-to-r from-gray-800 to-black rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-2xl">
                    <h3 class="text-2xl font-bold text-dark-green mb-6">Kirim Pesan</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-green focus:border-transparent" placeholder="Nama kamu">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-green focus:border-transparent" placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent-green focus:border-transparent" placeholder="Tulis pesan kamu di sini..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-accent-green text-white py-3 rounded-lg font-semibold hover:bg-dark-green transition-colors">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-dark-green to-accent-green text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Siap Memulai Perjalanan Cinta yang Lebih Sehat?
                </h2>
                <p class="text-xl mb-8 text-gray-100">
                    Bergabunglah dengan 5000+ remaja Indonesia yang sudah merasakan manfaatnya. 
                    Daftar sekarang dan dapatkan akses gratis ke semua materi selama 7 hari!
                </p>
                
                <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-2xl p-8 mb-8">
                    <div class="grid md:grid-cols-4 gap-6 text-center">
                        <div>
                            <div class="text-3xl mb-2">🔒</div>
                            <div class="font-semibold">100% Anonim</div>
                            <div class="text-sm text-gray-200">Privasi terjamin</div>
                        </div>
                        <div>
                            <div class="text-3xl mb-2">📱</div>
                            <div class="font-semibold">Mobile Friendly</div>
                            <div class="text-sm text-gray-200">Akses kapan saja</div>
                        </div>
                        <div>
                            <div class="text-3xl mb-2">💬</div>
                            <div class="font-semibold">Chat Support 24/7</div>
                            <div class="text-sm text-gray-200">Bantuan langsung</div>
                        </div>
                        <div>
                            <div class="text-3xl mb-2">🏆</div>
                            <div class="font-semibold">Sertifikat</div>
                            <div class="text-sm text-gray-200">Pengembangan diri</div>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <!-- BUTTON CTA DENGAN LINK KE REGISTER -->
                    <a href="<?php echo url('register') ?>" class="inline-block bg-light-green text-black px-8 py-4 rounded-full text-lg font-bold hover:bg-white transition-colors transform hover:scale-105 shadow-lg">
                        Daftar Gratis Sekarang
                    </a>
                    <p class="text-sm text-gray-200">
                        Tidak ada biaya tersembunyi • Batalkan kapan saja • Dipercaya 5000+ remaja Indonesia
                    </p>
                    <div class="mt-4">
                        <a href="<?php echo url('login') ?>" class="text-light-green hover:text-white transition-colors underline">
                            Sudah punya akun? Masuk di sini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark-green text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-light-green to-accent-green rounded-full flex items-center justify-center">
                            <span class="text-black font-bold">💕</span>
                        </div>
                        <h3 class="text-xl font-bold">Heart Horizon Class</h3>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Platform pembelajaran cinta sehat pertama di Indonesia untuk remaja.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-light-green hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-light-green hover:text-white transition-colors">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                        <a href="#" class="text-light-green hover:text-white transition-colors">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Platform</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#beranda" class="hover:text-light-green transition-colors">Beranda</a></li>
                        <li><a href="#fitur" class="hover:text-light-green transition-colors">Fitur</a></li>
                        <li><a href="#materi" class="hover:text-light-green transition-colors">Materi</a></li>
                        <li><a href="#testimoni" class="hover:text-light-green transition-colors">Testimoni</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Akun</h4>
                    <ul class="space-y-2 text-gray-300">
                        <!-- FOOTER LINKS KE LOGIN DAN REGISTER -->
                        <li><a href="<?php echo url('login') ?>" class="hover:text-light-green transition-colors">Masuk</a></li>
                        <li><a href="<?php echo url('register') ?>" class="hover:text-light-green transition-colors">Daftar</a></li>
                        <li><a href="#tentang" class="hover:text-light-green transition-colors">Tentang Kami</a></li>
                        <li><a href="#kontak" class="hover:text-light-green transition-colors">Kontak</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li>
                            <i class="fas fa-envelope mr-2"></i>
                            hello@hearthorizon.id
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2"></i>
                            +62 812-3456-7890
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Heart Horizon Class. All rights reserved. Made with 💕 for Indonesian teenagers.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to elements
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Active navigation highlighting
        window.addEventListener('scroll', () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-accent-green');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-accent-green');
                }
            });
        });
    </script>
</body>
</html>
