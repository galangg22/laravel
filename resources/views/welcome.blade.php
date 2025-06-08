<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Heart Horizon</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  
  <style>
    /* Animasi untuk lingkaran hijau */
    @keyframes moveGreen1 {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(50px, -30px) scale(1.2); }
    }
    @keyframes moveGreen2 {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(-40px, 40px) scale(0.8); }
    }
    /* Animasi untuk lingkaran merah/pink */
    @keyframes moveRed1 {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(-60px, 50px) scale(1.3); }
    }
    @keyframes movePink1 {
      0%, 100% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(30px, -25px) scale(0.9); }
    }
    /* Animasi untuk segitiga */
    @keyframes rotateMove1 {
      0% { transform: rotate(0deg) translate(0, 0); }
      50% { transform: rotate(180deg) translate(20px, -15px); }
      100% { transform: rotate(360deg) translate(0, 0); }
    }
    @keyframes rotateMove2 {
      0% { transform: rotate(360deg) translate(0, 0); }
      50% { transform: rotate(180deg) translate(-25px, 20px); }
      100% { transform: rotate(0deg) translate(0, 0); }
    }
    @keyframes rotateMove3 {
      0% { transform: rotate(0deg) translate(0, 0); }
      50% { transform: rotate(-180deg) translate(15px, -30px); }
      100% { transform: rotate(-360deg) translate(0, 0); }
    }
  </style>
</head>
<body class="relative min-h-screen bg-gray-900">

  <div style="position: fixed; inset: 0; overflow: hidden; pointer-events: none; z-index: 0;">
    <!-- Lingkaran Hijau Besar -->
    <div style="
      position: absolute;
      top: 10%;
      left: 5%;
      width: 24rem;
      height: 24rem;
      background-color: rgba(34,197,94,0.125); /* green-400/20 */
      border-radius: 50%;
      filter: blur(48px);
      animation: moveGreen1 8s ease-in-out infinite;
    "></div>

    <!-- Lingkaran Hijau Kecil -->
    <div style="
      position: absolute;
      top: 60%;
      right: 10%;
      width: 16rem;
      height: 16rem;
      background-color: rgba(34,197,94,0.075); /* green-500/15 */
      border-radius: 50%;
      filter: blur(24px);
      animation: moveGreen2 10s ease-in-out infinite;
      animation-delay: 2s;
    "></div>

    <!-- Lingkaran Merah -->
    <div style="
      position: absolute;
      top: 30%;
      right: 5%;
      width: 20rem;
      height: 20rem;
      background-color: rgba(239,68,68,0.125); /* red-500/20 */
      border-radius: 50%;
      filter: blur(48px);
      animation: moveRed1 12s ease-in-out infinite;
      animation-delay: 1s;
    "></div>

    <!-- Lingkaran Pink -->
    <div style="
      position: absolute;
      bottom: 20%;
      left: 15%;
      width: 18rem;
      height: 18rem;
      background-color: rgba(236,72,153,0.075); /* pink-500/15 */
      border-radius: 50%;
      filter: blur(24px);
      animation: movePink1 9s ease-in-out infinite;
      animation-delay: 3s;
    "></div>

    <!-- Segitiga Hijau -->
    <div style="
      position: absolute;
      top: 15%;
      left: 20%;
      animation: rotateMove1 15s linear infinite;
    ">
      <div style="
        width: 0;
        height: 0;
        border-left: 30px solid transparent;
        border-right: 30px solid transparent;
        border-bottom: 50px solid rgba(34,197,94,0.1875);
      "></div>
    </div>

    <!-- Segitiga Merah -->
    <div style="
      position: absolute;
      top: 70%;
      right: 25%;
      animation: rotateMove2 18s linear infinite;
      animation-delay: 2s;
    ">
      <div style="
        width: 0;
        height: 0;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-bottom: 40px solid rgba(239,68,68,0.15625);
      "></div>
    </div>

    <!-- Segitiga Pink -->
    <div style="
      position: absolute;
      bottom: 30%;
      right: 10%;
      animation: rotateMove3 20s linear infinite;
      animation-delay: 4s;
    ">
      <div style="
        width: 0;
        height: 0;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        border-bottom: 35px solid rgba(236,72,153,0.125);
      "></div>
    </div>

    <!-- Gradient Overlay -->
    <div style="
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom right, rgba(0,0,0,0.6), transparent, rgba(0,0,0,0.4));
    "></div>
  </div>

  <!-- Konten Utama -->

  <div>
    <style>
    /* Animasi masuk dari atas */
    .fade-down {
      opacity: 0;
      transform: translateY(-50px);
      animation: fadeDown 0.6s ease-out forwards;
    }

    @keyframes fadeDown {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Hover scale */
    .hover-scale:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease;
    }

    .btn-hover-green:hover {
      background-color: #4ADE80;
      color: #0f172a;
    }

    /* Custom Colors */
    .bg-dark-bg {
      background-color: #0f172a;
    }

    .bg-heart-green {
      background-color: #4ADE80;
    }

    .text-dark-bg {
      color: #0f172a;
    }

    .border-heart-green {
      border-color: #4ADE80;
    }
  </style>

  <header class="fade-down flex justify-between items-center px-6 py-4 bg-dark-bg">
    <div class="flex items-center gap-2 hover-scale">
      <div class="w-8 h-8 bg-heart-green rounded-full flex items-center justify-center">
        <i class="fa fa-user text-dark-bg text-sm"></i>
      </div>
      <span class="text-white font-bold text-lg">Heart Horizon</span>
    </div>
    
    <div class="flex gap-4">
    <a href="/login">
        <button 
        class="text-white px-4 py-2 rounded hover-scale btn-hover-green transition-colors"
        >
        Log In
        </button>
    </a>
    <a href="/register">
        <button 
        class="text-white px-4 py-2 rounded border border-heart-green hover-scale hover:bg-heart-green hover:text-dark-bg transition-colors"
        >
        Sign In
        </button>
    </a>
    </div>
  </header>
  </div>

  <div>
    <section class="min-h-screen mt-10 bg-gradient-to-br from-black via-gray-900 to-green-900 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 relative overflow-hidden">
  <div class="absolute inset-0 bg-[url('/img/img.png')] bg-cover bg-center opacity-5"></div>

  <div class="w-full max-w-7xl mx-auto flex flex-col items-center text-center justify-center z-10 mt-10">
    <div class="text-center flex-1 max-w-4xl">
      <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">
        Temukan Arah Baru untuk Hati
        <br />
        <span class="text-green-400">yang Pernah Tersesat.</span>
      </h1>

      <p class="text-gray-300 text-base sm:text-lg md:text-xl mb-6 lg:mb-10">
        Heart Horizon akan membantu memahami kembali luka, koneksi, dan cinta dengan cara yang tepat melalui dewasa dan sehat.
      </p>

      <!-- Video Player Mobile -->
      <div class="relative mb-8 lg:hidden">
        <div class="w-full max-w-sm h-40 sm:h-48 mx-auto bg-gray-800 rounded-2xl border-4 border-green-400 flex items-center justify-center cursor-pointer group">
          <div class="w-12 h-12 sm:w-16 sm:h-16 bg-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
            <i class="fas fa-play text-gray-800 text-lg sm:text-xl ml-1"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-1 max-w-lg lg:max-w-xl w-full">
      <!-- Video Player Desktop -->
      <div class="relative mb-8 hidden lg:block">
        <div class="w-full h-56 xl:h-64 bg-gray-800 rounded-2xl border-4 border-green-400 flex items-center justify-center cursor-pointer group">
          <div class="w-16 h-16 xl:w-20 xl:h-20 bg-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
            <i class="fas fa-play text-gray-800 text-xl xl:text-2xl ml-1"></i>
          </div>
        </div>
      </div>

      <a href="/register">
        <button class="bg-green-400 text-black font-bold py-3 sm:py-4 px-8 sm:px-12 rounded-full text-base sm:text-lg hover:bg-green-300 transition-colors mb-8 lg:mb-12 w-full">
          MULAI PERJALANANMU<br />SEKARANG
        </button>
      </a>

      <div class="w-full mb-10">
        <div class="bg-black/80 backdrop-blur-sm rounded-2xl p-4 sm:p-6 lg:p-8 border border-green-400/50 shadow-2xl max-h-96 lg:max-h-[500px] overflow-y-auto">
          <div class="space-y-4 text-white text-xs sm:text-sm lg:text-base leading-relaxed">
            <p><span class="text-green-400 font-semibold">Kamu pernah ngerasa capek banget</span>, bukan karena hubunganmu berakhir, tapi karena kamu nggak ngerti kenapa semuanya selalu berulang?</p>
            <p>Mungkin kamu sering milih pasangan yang salah, tapi nggak tahu kenapa kamu terus jadi orang yang kamu anggep sebagai "yang salah" itu.</p>
            <p>Atau kamu takut dekat sama orang, takut ditinggalin, tapi lebih takut lagi jadi gak penting sama sekali.</p>
            <p>Bisa juga kamu kelihatan kuat, cuek, mandiri padahal dalam hati kamu cuma pengen diperlakukan kayak anak-anak.</p>
            <p>Kamu tumbuh bawa cerita. Dari orang tua. Dari mantan. Dari luka kecil yang waktu itu kamu anggap sepele.</p>
            <p>Kamu belum nemuin cara yang tepat ngelindungin diri tanpa akhirnya nyakitin orang lain.</p>
            <p>Dan ketika hubunganmu gagal, kamu nyalahin diri sendiri: <em>"Mungkin aku terlalu lebay. Mungkin aku emang nggak pantas dicintai. Mungkin aku harus belajar lebih banyak lagi."</em></p>
            <p>Kalau itu semua terdengar familiar, berarti kamu ada di tempat yang tepat. Aku bakal kasih tahu kenapa bisa ngeyakin sendiri kamu gak pernah cukup.</p>
            <p class="text-green-300 font-medium">Tapi buat kamu yang ngerti... Kenapa kamu merasa kayak gitu.</p>
            <p>Kenapa kamu susah percaya orang (atau malah terlalu gampang percaya). Kenapa kamu bisa kebiasaan diri sendiri tapi nggak bisa ngomong.</p>
            <p>Dan gimana caranya mulai bangun relasi yang sehat—bukan cuma sama orang lain, tapi juga sama dirimu sendiri.</p>
            <p class="text-green-400 font-semibold">The Heart Horizon aku rancang pelan-pelan, dengan hati. Bukan kelas instan yang janji "move on dalam seminggu".</p>
            <p>Tapi ruang yang aman, tempat kamu bisa belajar pelan-pelan nempegang tanganmu sendiri... sebelum kamu siap memegang tangan orang lain.</p>
            <p>Dan ngelus luka ngerasa sendirian dalam luka itu, kamu nggak sendiri.</p>
            <p class="text-green-300">Kamu cuma belum tahu harus mulai dari mana.</p>
            <p class="text-green-400 font-medium">Dan mungkin... ini adalah awalnya.</p>
          </div>

          <!-- Scroll indicator -->
          <div class="flex justify-center mt-4 lg:hidden">
            <div class="flex space-x-1">
              <div class="w-1 h-1 bg-green-400 rounded-full animate-pulse"></div>
              <div class="w-1 h-1 bg-green-400/50 rounded-full animate-pulse delay-100"></div>
              <div class="w-1 h-1 bg-green-400/30 rounded-full animate-pulse delay-200"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Decorative dots -->
  <div class="absolute top-20 left-10 w-2 h-2 bg-green-400 rounded-full animate-pulse opacity-60"></div>
  <div class="absolute bottom-32 right-16 w-3 h-3 bg-green-400 rounded-full animate-pulse opacity-40"></div>
  <div class="absolute top-1/3 right-8 w-1 h-1 bg-white rounded-full animate-pulse opacity-50"></div>
</section>
  </div>

  <div>
    <section class="features-section">
  <div class="container">
    <h2 class="features-title">
      <span>Kelas ini </span>
      <span class="highlight">cocok</span>
      <span> buat kamu yang ingin...</span>
    </h2>

    <div class="features-grid">
      <!-- Menghindari Section -->
      <div class="features-box avoid">
        <h3><span>Menghindari</span><span class="icon red">×</span></h3>
        <ul>
          <li><span class="icon red">×</span> Terus balik lagi ke hubungan yang nggak jelas.</li>
          <li><span class="icon red">×</span> Menyalahkan diri sendiri setiap kali hubungan gagal.</li>
          <li><span class="icon red">×</span> Ketergantungan pada validasi pasangan.</li>
          <li><span class="icon red">×</span> Terjebak pola komunikasi toksik dan berulang.</li>
          <li><span class="icon red">×</span> Takut disakiti tapi juga takut sendiri.</li>
        </ul>
      </div>

      <!-- Membangun Section -->
      <div class="features-box build">
        <h3><span>Membangun</span><span class="icon green">✓</span></h3>
        <ul>
          <li><span class="icon green">✓</span> Lebih sadar sama emosi sendiri.</li>
          <li><span class="icon green">✓</span> Tenang hadapi konflik karena tahu pola hubunganmu.</li>
          <li><span class="icon green">✓</span> Membangun hubungan sehat tanpa manipulasi.</li>
          <li><span class="icon green">✓</span> Percaya diri karena tahu batasan & kebutuhanmu.</li>
          <li><span class="icon green">✓</span> Siap membuka hati tanpa kehilangan diri.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<style>
    .features-section {
  padding: 80px 20px;
  background-color: #0f0f0f;
  color: #e5e5e5;
  font-family: sans-serif;
}

.container {
  max-width: 1000px;
  margin: auto;
}

.features-title {
  text-align: center;
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 40px;
}

.features-title .highlight {
  color: #4ade80;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 24px;
}

.features-box {
  background-color: rgba(30, 30, 30, 0.6);
  border-radius: 16px;
  padding: 24px;
  backdrop-filter: blur(6px);
}

.features-box.avoid {
  border: 1px solid rgba(239, 68, 68, 0.3);
}

.features-box.build {
  border: 1px solid rgba(34, 197, 94, 0.3);
}

.features-box h3 {
  font-size: 20px;
  margin-bottom: 16px;
  color: inherit;
  display: flex;
  align-items: center;
  gap: 8px;
}

.features-box ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.features-box li {
  display: flex;
  align-items: flex-start;
  margin-bottom: 12px;
  font-size: 14px;
  line-height: 1.6;
}

.icon {
  display: inline-block;
  margin-right: 8px;
  font-weight: bold;
  font-size: 16px;
}

.icon.red {
  color: #ef4444;
}

.icon.green {
  color: #4ade80;
}

</style>
  </div>

  <div>
    <!-- Learning Path Section -->
<section class="bg-gray-900 text-white py-16 px-6">
  <div class="max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold text-center mb-12">
      Disini kamu bakal belajar apa aja?
    </h2>

    <div class="space-y-6">
      <!-- Path Item 1 -->
      <div class="flex gap-6 items-start">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-gray-900 font-bold">
            01
          </div>
          <div class="w-0.5 h-16 bg-green-500 mt-2"></div>
        </div>

        <div class="flex-1 bg-gray-800 p-6 rounded-lg border border-green-500">
          <h3 class="text-xl font-semibold mb-3 text-green-500">
            Memahami Pola Lama yang Tak Disadari
          </h3>
          <p class="text-gray-300 text-sm">
            Banyak dari kita mengulangi pola hubungan yang sama tanpa menyadari kenapa. Modul ini akan membantu...
          </p>
        </div>

        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center cursor-pointer">
          <span class="block w-2 h-2 bg-gray-900 rounded-full"></span>
        </div>
      </div>

      <!-- Path Item 2 -->
      <div class="flex gap-6 items-start">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-gray-900 font-bold">
            02
          </div>
          <div class="w-0.5 h-16 bg-green-500 mt-2"></div>
        </div>

        <div class="flex-1 bg-gray-800 p-6 rounded-lg border border-green-500">
          <h3 class="text-xl font-semibold mb-3 text-green-500">
            Membangun Antara Cinta, Keterjatan, dan Pelarian
          </h3>
          <p class="text-gray-300 text-sm">
            Tidak semua yang layaknya disebut cinta. Kadang kita tertukar dalam ketidaktahuan emosional yang membuat...
          </p>
        </div>

        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center cursor-pointer">
          <span class="block w-2 h-2 bg-gray-900 rounded-full"></span>
        </div>
      </div>

      <!-- Path Item 3 -->
      <div class="flex gap-6 items-start">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-gray-900 font-bold">
            03
          </div>
          <div class="w-0.5 h-16 bg-green-500 mt-2"></div>
        </div>

        <div class="flex-1 bg-gray-800 p-6 rounded-lg border border-green-500">
          <h3 class="text-xl font-semibold mb-3 text-green-500">
            Cara Komunikasi Sehat dalam Relasi Dewasa
          </h3>
          <p class="text-gray-300 text-sm">
            Bicara jujur tanpa menyakiti, mendengarkan tanpa menyudutkan. Modul ini akan membahas cara komunikasi sehat...
          </p>
        </div>

        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center cursor-pointer">
          <span class="block w-2 h-2 bg-gray-900 rounded-full"></span>
        </div>
      </div>

      <!-- Path Item 4 -->
      <div class="flex gap-6 items-start">
        <div class="flex flex-col items-center">
          <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-gray-900 font-bold">
            04
          </div>
        </div>

        <div class="flex-1 bg-gray-800 p-6 rounded-lg border border-green-500">
          <h3 class="text-xl font-semibold mb-3 text-green-500">
            Mengatasi Takut Menyakitkan Diri Sendiri
          </h3>
          <p class="text-gray-300 text-sm">
            Akhir dari sebuah hubungan bukan selalu sesuai dengan yang kita harap. Modul ini akan membahas cara berdamai...
          </p>
        </div>

        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center cursor-pointer">
          <span class="block w-2 h-2 bg-gray-900 rounded-full"></span>
        </div>
      </div>
    </div>

    <div class="text-center mt-12">
      <a href="/login" class="inline-block bg-green-500 text-gray-900 px-8 py-3 rounded-lg font-semibold text-lg hover:shadow-lg transition-all">
        MULAI PERJALANANMU SEKARANG
      </a>
    </div>
  </div>
</section>
  </div>

  <div>
    <!-- whyus.php -->
<section class="min-h-screen w-full gradient-bg flex flex-col items-center justify-center px-4 py-8">
  <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white text-center mb-16 text-shadow">
    Kenapa Harus Pilih Kita?
  </h1>
  <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 max-w-7xl w-full" id="whyus-cards">
    <!-- Cards will be populated via JavaScript -->
  </div>
</section>

<style>
  .gradient-bg {
    background: linear-gradient(to right, #1f4037, #99f2c8);
  }

  .card-gradient {
    background: linear-gradient(to bottom right, #1a202c, #2d3748);
    border: 1px solid rgba(72, 187, 120, 0.6);
  }

  .text-shadow {
    text-shadow: 0 2px 4px rgba(0,0,0,0.4);
  }
</style>

<script>
  const cards = [
    {
      title: "Fokus Pada Akar, Bukan Gejala",
      image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=150&fit=crop",
      alt: "Therapy session",
      text: "Kami akan diajak memahami apa yang terjadi di balik emosi kamu, mencintai bukan sekedar obrolan begini-begitu. Kita mengupas akarnya dari luka yang tersembunyi sampai pola yang berlanjut diam-diam."
    },
    {
      title: "Dirancang untuk Kamu yang Belum Punya Jawaban",
      image: "https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=200&h=150&fit=crop",
      alt: "Woman walking",
      text: "Kamu ngga harus datang dengan semua jawaban. Kalau kamu masih merasa bingung atau belum bisa memahami apa yang kamu butuhkan. Hidup mu ngis awal yang tepat. Kita mulai pelan pelan."
    },
    {
      title: "Belajar Tanpa Takut Dihukum",
      image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=150&fit=crop",
      alt: "Peaceful moment",
      text: "Ngga ada tekanan, ngga ada nilai. Kamu bisa belajar di waktu kamu sendiri, dengan tempo kamu sendiri. Relasi yang sehat butuh proses dan di sini proses diharap."
    }
  ];

  let autoHoverIndex = 0;

  function renderCards() {
    const container = document.getElementById("whyus-cards");
    container.innerHTML = "";

    cards.forEach((card, index) => {
      const isHovered = index === autoHoverIndex;

      const div = document.createElement("div");
      div.className = `card-gradient rounded-xl p-6 transform transition duration-300 ${isHovered ? 'scale-105 shadow-lg' : 'scale-100'}`;
      div.style.boxShadow = isHovered ? "0 0 30px rgba(0, 255, 0, 0.5)" : "0 0 20px rgba(0, 255, 0, 0.3)";

      div.innerHTML = `
        <h3 class="text-white text-xl font-bold mb-4 bg-green-800 bg-opacity-70 px-4 py-2 rounded-lg">
          ${card.title}
        </h3>
        <div class="flex flex-col md:flex-row gap-4">
          <img src="${card.image}" alt="${card.alt}" class="rounded-lg w-full md:w-32 h-24 object-cover" />
          <p class="text-green-200 text-sm leading-relaxed">
            ${card.text}
          </p>
        </div>
      `;

      container.appendChild(div);
    });
  }

  setInterval(() => {
    autoHoverIndex = (autoHoverIndex + 1) % cards.length;
    renderCards();
  }, 2000);

  document.addEventListener("DOMContentLoaded", renderCards);
</script>
  </div>

  <div>
        <style>
            /* CSS kartu dan styling */
body {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  color: #b2fba5;
  font-family: Arial, sans-serif;
}

h2.tahukah-kamu-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: white;
  text-align: center;
  margin-bottom: 3rem;
  text-shadow: 0 2px 6px rgba(0, 255, 0, 0.8);
}

.container {
  max-width: 900px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  margin: 0 auto;
}

.card {
  background: linear-gradient(145deg, #1e2f23, #27382c);
  border-radius: 1rem;
  padding: 1.5rem;
  display: flex;
  gap: 1.5rem;
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
  transform-origin: center;
  transition: 
    transform 0.3s ease,
    box-shadow 0.3s ease;
}

.card img {
  width: 180px;
  height: 120px;
  object-fit: cover;
  border-radius: 0.75rem;
  transition: transform 0.3s ease;
}

.card p {
  flex: 1;
  font-size: 1rem;
  line-height: 1.5;
}

/* Hover effect */
.card.hovered, .card.active {
  transform: scale(1.02);
  box-shadow: 0 0 25px rgba(0, 255, 0, 0.4);
}

.card.hovered img, .card.active img {
  transform: scale(1.05);
}

@media (max-width: 768px) {
  .card {
    flex-direction: column;
    align-items: center;
  }

  .card img {
    width: 100%;
    height: 180px;
  }
}

        </style>

        <section>
            <h2 class="tahukah-kamu-title">Tahukah Kamu?</h2>
<div class="container">
  <div class="card" data-index="0">
    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=200&fit=crop" alt="Fact 1" />
    <p>
      "Banyak pria sulit membuka diri bukan karena tidak peduli, tapi karena tidak pernah diajarkan cara mengekspresikan emosi dengan aman. Banyak laki-laki tumbuh dengan keyakinan bahwa menangis adalah kelemahan. Mereka akhirnya belajar menekan, bukan menyampaikan. Akibatnya? Dalam hubungan, mereka lebih sering diam saat justru dibutuhkan untuk hadir."
    </p>
  </div>

  <div class="card" data-index="1">
    <img src="https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=300&h=200&fit=crop" alt="Fact 2" />
    <p>
      "Banyak wanita merasa lelah dalam hubungan bukan karena terlalu sensitif, tapi karena terlalu sering memikul semuanya sendiri. Perempuan sering terbiasa jadi penyelamat: memahami, memaafkan, mengalah. Tapi dalam relasi yang tidak setara, empati bisa berubah jadi kelelahan yang tidak terlihat."
    </p>
  </div>

  <div class="card" data-index="2">
    <img src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=300&h=200&fit=crop" alt="Fact 3" />
    <p>
      "Hubungan gagal bukan selalu karena kurang cinta tapi karena dua orang saling mencintai dengan luka yang belum sembuh. Cinta butuh lebih dari sekedar perasaan. Ia butuh komunikasi, pemahaman, dan dua orang yang mau belajar bersama, bukan saling menuntut untuk jadi sempurna."
    </p>
  </div>
</div>
        </section>

        <script>
                const cards = document.querySelectorAll('.card');
let activeIndex = 0;
let autoInterval;

function setActiveCard(index) {
  cards.forEach((card, i) => {
    if (i === index) {
      card.classList.add('active');
    } else {
      card.classList.remove('active');
    }
  });
}

function startAutoHover() {
  autoInterval = setInterval(() => {
    activeIndex = (activeIndex + 1) % cards.length;
    setActiveCard(activeIndex);
  }, 2500);
}

setActiveCard(activeIndex);
startAutoHover();

// Mouse hover to override auto hover
cards.forEach((card, index) => {
  card.addEventListener('mouseenter', () => {
    clearInterval(autoInterval);
    setActiveCard(index);
  });
  card.addEventListener('mouseleave', () => {
    startAutoHover();
  });
});

        </script>
  </div>

  <div>
<section id="cta-section" class="min-h-screen w-full gradient-bg flex flex-col items-center justify-center px-4 py-16">
  <div class="max-w-4xl w-full text-center">
    <div class="flex items-center justify-center gap-4 mb-8 controls">
      <button class="icon-btn" id="btn-left" aria-label="Previous">
        &#9664;
      </button>

      <button class="cta-btn" id="btn-start" >
        MULAI PERJALANANMU SEKARANG
      </button>

      <button class="icon-btn" id="btn-right" aria-label="Next">
        &#9654; <!-- Right arrow -->
      </button>
    </div>

    <div class="card-gradient rounded-xl p-8 glow-effect mt-20 testimonial-card">
      <div class="flex flex-col md:flex-row items-center gap-6">
        <img
          src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face"
          alt="Alain de Botton"
          class="testimonial-img"
        />
        <div class="text-left flex-1">
          <p class="testimonial-text">
            "Kita tidak diajarkan bagaimana mencintai. Kita hanya diberi tahu bahwa cinta itu naluri. Padahal, cinta sejati adalah keterampilan dan sangat sekali dari kita yang terlahir dengan kemampuan itu. Itulah sebabnya hubungan dongeng seperti yang kita bayangkan tidak lebih mirip ruang kelas yang rumit, membingungkan, dan kadang menyakitkan."
          </p>
          <div class="testimonial-author">
            <p class="font-semibold">— Alain de Botton</p>
            <p class="italic">Penulis buku "The Course of Love"</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <script>
  // Add simple hover scale for buttons:
  document.querySelectorAll('.icon-btn, .cta-btn').forEach(btn => {
    btn.addEventListener('mouseenter', () => {
      btn.style.transform = 'scale(1.2)';
      btn.style.transition = 'transform 0.3s ease';
      if(btn.classList.contains('cta-btn')) {
        btn.style.boxShadow = '0 0 30px rgba(0, 255, 0, 0.6)';
      }
    });
    btn.addEventListener('mouseleave', () => {
      btn.style.transform = 'scale(1)';
      if(btn.classList.contains('cta-btn')) {
        btn.style.boxShadow = 'none';
      }
    });
    btn.addEventListener('mousedown', () => {
      btn.style.transform = 'scale(0.9)';
    });
    btn.addEventListener('mouseup', () => {
      btn.style.transform = 'scale(1.2)';
    });
  });
</script>

    <style>
        /* Reset margin/padding, flex layout */
.gradient-bg {
  background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
  color: #b2fba5;
  font-family: Arial, sans-serif;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 4rem 1rem;
  width: 100%;
}

#cta-section .max-w-4xl {
  max-width: 64rem; /* ~1024px */
  width: 100%;
  text-align: center;
}

.controls {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  margin-bottom: 2rem;
}

.icon-btn {
  font-size: 2rem;
  color: #34d399; /* green-400 */
  background: transparent;
  border: none;
  cursor: pointer;
  transition: color 0.3s ease;
}

.icon-btn:hover {
  color: #6ee7b7; /* green-300 */
}

.cta-btn {
  background-color: #16a34a; /* green-600 */
  color: white;
  padding: 0.75rem 2rem;
  border-radius: 9999px; /* full rounded */
  font-weight: 600;
  font-size: 1.125rem;
  display: inline-flex;
  align-items: center;
  gap: 0.75rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.cta-btn:hover {
  background-color: #22c55e; /* green-500 */
  box-shadow: 0 0 30px rgba(0, 255, 0, 0.6);
}

.card-gradient {
  background: linear-gradient(145deg, #1e2f23, #27382c);
  border-radius: 1rem;
  padding: 2rem;
  margin-top: 5rem;
  box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
  transition: transform 0.3s ease;
}

.card-gradient:hover {
  transform: scale(1.02);
}

.testimonial-card {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

@media(min-width: 768px) {
  .testimonial-card {
    flex-direction: row;
    align-items: center;
  }
}

.testimonial-img {
  width: 5rem;
  height: 5rem;
  border-radius: 9999px;
  object-fit: cover;
  transition: transform 0.3s ease;
  cursor: pointer;
}

.testimonial-img:hover {
  transform: scale(1.1);
}

.testimonial-text {
  color: #d9f99d; /* green-100 */
  font-size: 1.125rem;
  line-height: 1.6;
  margin-bottom: 1rem;
  text-align: left;
}

.testimonial-author {
  color: #86efac; /* green-300 */
  font-size: 0.875rem;
  text-align: left;
}

.font-semibold {
  font-weight: 600;
}

.italic {
  font-style: italic;
}

.flex-1 {
  flex: 1;
}

.flex {
  display: flex;
}

.flex-col {
  flex-direction: column;
}

.md\\:flex-row {
  /* For md and up */
  display: flex;
  flex-direction: row;
}

.items-center {
  align-items: center;
}

.gap-6 {
  gap: 1.5rem;
}

    </style>
  </div>

  <div>
        <section class="section-container">
    <div class="background-gradient"></div>

    <div class="container">
      <h1 class="main-title">Kamu Tipe Orang yang Mana?</h1>

      <div class="desktop-layout">
        <!-- Left Red Text -->
        <div class="left-text red-theme">
          <p>Menyimpan dendam, tapi nggak pernah benar-benar memproses luka</p>
          <p>Menyalahkan masa lalu, tapi enggan melihat ke dalam diri</p>
          <p>Menghindari hubungan sehat, karena "kayaknya terlalu asing"</p>
          <p>Bilangnya kuat, tapi di dalam hati masih ketakutan</p>
          <p>Nggak percaya bahwa cinta bisa sembuh, bisa jadi aman</p>
        </div>

        <!-- Center Images -->
        <div class="center-images">
          <div class="image-card red-border">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face" alt="Masih Terjebak dalam Pola Lama" />
            <div class="label red-label">
              <p>Masih Terjebak</p>
              <p>dalam Pola Lama</p>
            </div>
          </div>
          <div class="image-card green-border">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face" alt="Siap Menemukan Arah Baru" />
            <div class="label green-label">
              <p>Siap Menemukan</p>
              <p>Arah Baru</p>
            </div>
          </div>
        </div>

        <!-- Right Green Text -->
        <div class="right-text green-theme">
          <p>Belajar memaafkan, tanpa harus melupakan</p>
          <p>Mau melihat ulang pola yang menyakiti, dengan jujur</p>
          <p>Siap membangun relasi dengan fondasi yang sehat</p>
          <p>Berani mengakui kelemahan, bukan untuk dikasihani tapi untuk disembuhkan</p>
          <p>Tahu bahwa cinta itu mungkin... tapi dimulai dari dalam</p>
        </div>
      </div>

      <!-- Mobile layout could be added here -->
    </div>

    <!-- Decorative particles -->
    <div class="particle particle1"></div>
    <div class="particle particle2"></div>
  </section>

    <style>
            /* Reset & basics */
* {
  box-sizing: border-box;
}

body, html {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background-color: black;
  color: white;
  min-height: 100vh;
}

/* Container and layout */
.section-container {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.background-gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(to right, #7f1d1d, black 40%, black 60%, #064e3b);
  z-index: 0;
}

.container {
  position: relative;
  z-index: 10;
  padding: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.main-title {
  text-align: center;
  font-weight: bold;
  font-size: 3rem;
  margin-bottom: 3rem;
  line-height: 1.1;
}

/* Desktop layout */
.desktop-layout {
  display: flex;
  gap: 2rem;
  justify-content: center;
  align-items: flex-start;
}

/* Left text red theme */
.left-text {
  flex: 1;
  text-align: right;
}

.left-text p {
  color: #fca5a5; /* red-200 */
  margin-bottom: 1rem;
  line-height: 1.5;
}

/* Right text green theme */
.right-text {
  flex: 1;
  text-align: left;
}

.right-text p {
  color: #bbf7d0; /* green-200 */
  margin-bottom: 1rem;
  line-height: 1.5;
}

/* Center images */
.center-images {
  display: flex;
  gap: 1.5rem;
  justify-content: center;
}

.image-card {
  position: relative;
  width: 16rem; /* 256px */
  height: 20rem; /* 320px */
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0,0,0,0.7);
  border-width: 4px;
  border-style: solid;
}

.image-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.image-card:hover img {
  transform: scale(1.1);
}

/* Border colors */
.red-border {
  border-color: rgba(220, 38, 38, 0.5);
}

.green-border {
  border-color: rgba(34, 197, 94, 0.5);
}

/* Gradient overlays on images */
.image-card::before {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  border-radius: 1rem;
  background: linear-gradient(to top, rgba(0,0,0,0.8), transparent 60%);
  z-index: 1;
}

/* Bottom label */
.label {
  position: absolute;
  bottom: 1rem;
  left: 1rem;
  right: 1rem;
  z-index: 2;
  backdrop-filter: blur(6px);
  border-radius: 1rem;
  padding: 0.75rem 1rem;
  border: 1px solid transparent;
  text-align: center;
  font-weight: bold;
}

.red-label {
  background-color: rgba(127, 29, 29, 0.8);
  border-color: rgba(220, 38, 38, 0.5);
  color: #fca5a5;
}

.red-label p:last-child {
  font-weight: normal;
  color: #f87171;
  font-size: 0.875rem;
}

.green-label {
  background-color: rgba(6, 78, 59, 0.8);
  border-color: rgba(34, 197, 94, 0.5);
  color: #bbf7d0;
}

.green-label p:last-child {
  font-weight: normal;
  color: #86efac;
  font-size: 0.875rem;
}

/* Decorative particles */
.particle {
  position: absolute;
  border-radius: 50%;
  opacity: 0.5;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

.particle1 {
  top: 8rem;
  left: 5rem;
  width: 12px;
  height: 12px;
  background-color: #f87171;
  animation: pulseRotate 4s ease-in-out infinite;
}

.particle2 {
  top: 4rem;
  right: 8rem;
  width: 10px;
  height: 10px;
  background-color: #34d399;
  animation: pulseRotateReverse 3.5s ease-in-out infinite;
}

/* Animations */
@keyframes pulseRotate {
  0%, 100% {
    opacity: 0.3;
    transform: scale(1) rotate(0deg);
  }
  50% {
    opacity: 1;
    transform: scale(1.8) rotate(180deg);
  }
}

@keyframes pulseRotateReverse {
  0%, 100% {
    opacity: 0.3;
    transform: scale(1) rotate(360deg);
  }
  50% {
    opacity: 1;
    transform: scale(1.8) rotate(180deg);
  }
}

/* Responsive */
@media (max-width: 768px) {
  .desktop-layout {
    flex-direction: column;
    align-items: center;
  }
  .left-text,
  .right-text {
    text-align: center;
  }
  .center-images {
    margin: 2rem 0;
  }
}

    </style>

    <script>    
        // Simple JS to mimic image scaling or animation on hover could be done in CSS only.
// If you want to animate the particles more complexly or on scroll, here you can add code.

// Example: Simple flicker effect on particles
const particles = document.querySelectorAll('.particle');

setInterval(() => {
  particles.forEach(p => {
    const opacity = 0.3 + Math.random() * 0.7;
    p.style.opacity = opacity.toFixed(2);
  });
}, 1000);

    </script>
  </div>


  <div>
    <section class="pricing-section">
    <div class="pricing-container">
      <div class="pricing-header fade-in-down">
        <h2>Pricing</h2>
      </div>

      <div class="pricing-card scale-in">
        <div class="badge">DISKON 90%!</div>

        <div class="card-header">
          <div class="title-wrapper">
            <svg class="icon-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" aria-hidden="true"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8C305.4-5.9 270.6-5.9 259.3 17.8z"/></svg>
            <h3>Heart Horizon</h3>
          </div>
          <p>DAPATKAN AKSES LIFETIME<br/>HEART HORIZON HANYA</p>
          <div class="price">
            Rp<span class="price-highlight">97.000</span>
          </div>
        </div>

        <div class="benefits">
          <h4>BENEFIT</h4>
          <?php 
          $benefits = [
            "Akses video pembelajaran eksklusif berbasis psikologi relasi dan luka emosi",
            "Workbook dan latihan refleksi untuk memahami pola hubunganmu secara personal",
            "Penjelasan mendalam dengan bahasa yang mudah dipahami (tanpa istilah ribet)",
            "Komunitas privat Discord untuk sharing, diskusi, dan bertumbuh bersama",
            "Panduan mengenali pola trauma dalam relasi",
            "Belajar membedakan hubungan sehat dan ketergantungan emosional",
            "Materi tentang mengubah pola hubungan yang berulang jadi proses pertumbuhan",
            "Kesempatan untuk berdamai dengan masa lalu dan bangun relasi yang kamu pantes dapatkan"
          ];

          foreach ($benefits as $benefit) {
            echo '<div class="benefit-item fade-in-left">';
            echo '<svg class="icon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true"><path d="M173.9 439.4c-6.6 6.6-17.4 6.6-24 0L7 296.5c-9.4-9.4-9.4-24.6 0-33.9l35.9-35.9c9.4-9.4 24.6-9.4 33.9 0L192 334.1 435.1 91c9.4-9.4 24.6-9.4 33.9 0l35.9 35.9c9.4 9.4 9.4 24.6 0 33.9L197.9 439.4z"/></svg>';
            echo "<p>$benefit</p>";
            echo '</div>';
          }
          ?>
        </div>

        <button class="cta-button scale-hover">
          AKSES LIFETIME<br/>
          <span>Rp. 97.000</span>
        </button>
      </div>

      <div class="decorative-circle circle1"></div>
      <div class="decorative-circle circle2"></div>
    </div>

    <script src="pricing.js"></script>
  </section>
  <style>
    /* Reset */
* {
  box-sizing: border-box;
}
body, html {
  margin: 0; padding: 0;
  font-family: 'Arial', sans-serif;
  background: linear-gradient(to bottom, #111827, #000);
  color: white;
  min-height: 100vh;
}

.pricing-container {
  max-width: 480px;
  margin: 0 auto;
  padding: 2rem 1rem 4rem;
  position: relative;
}

/* Header */
.pricing-header {
  text-align: center;
  margin-bottom: 4rem;
}
.pricing-header h2 {
  font-size: 3rem;
  font-weight: 700;
  text-shadow: 0 0 8px rgba(0,255,0,0.7);
}

/* Card */
.pricing-card {
  position: relative;
  background: linear-gradient(to bottom, rgba(17, 24, 39, 0.8), rgba(0,0,0,0.6));
  border: 2px solid #22c55e;
  border-radius: 2rem;
  padding: 2rem 2rem 3rem;
  backdrop-filter: blur(10px);
  box-shadow: 0 0 25px rgba(34, 197, 94, 0.4);
}

/* Badge */
.badge {
  position: absolute;
  top: -1.5rem;
  left: 50%;
  transform: translateX(-50%);
  background-color: #dc2626;
  padding: 0.25rem 1.25rem;
  border-radius: 9999px;
  font-weight: 600;
  font-size: 0.875rem;
  color: white;
  box-shadow: 0 2px 10px rgba(220, 38, 38, 0.8);
}

/* Card header */
.card-header {
  text-align: center;
  padding-top: 1rem;
  margin-bottom: 1.5rem;
}
.title-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 0.5rem;
}
.title-wrapper h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: white;
}
.icon-star {
  width: 1.25rem;
  height: 1.25rem;
  color: #22c55e;
}

/* Price */
.price {
  font-size: 3rem;
  font-weight: 700;
  margin-top: 0.5rem;
  color: white;
}
.price-highlight {
  color: #22c55e;
}

/* Benefits */
.benefits {
  margin-bottom: 2rem;
}
.benefits h4 {
  color: #22c55e;
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 1rem;
}
.benefit-item {
  display: flex;
  align-items: flex-start;
  gap: 0.5rem;
  margin-bottom: 0.75rem;
}
.benefit-item p {
  color: #d1d5db;
  font-size: 0.875rem;
  line-height: 1.3;
  margin: 0;
}
.icon-check {
  width: 0.875rem;
  height: 0.875rem;
  color: #22c55e;
  flex-shrink: 0;
  margin-top: 0.25rem;
}

/* Button */
.cta-button {
  width: 100%;
  background-color: #22c55e;
  color: white;
  font-weight: 700;
  font-size: 1.125rem;
  padding: 1rem 1.5rem;
  border-radius: 1.25rem;
  border: none;
  cursor: pointer;
  box-shadow: 0 6px 15px rgba(34, 197, 94, 0.5);
  transition: transform 0.2s ease, box-shadow 0.3s ease;
  text-align: center;
  line-height: 1.3;
}
.cta-button span {
  font-weight: 400;
  font-size: 0.875rem;
}

/* Hover scale effect for button */
.cta-button.scale-hover:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(34, 197, 94, 0.8);
}
.cta-button.scale-hover:active {
  transform: scale(0.95);
}

/* Animations from framer-motion replacement */
@keyframes fadeInDown {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes scaleIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}
@keyframes fadeInLeft {
  from { opacity: 0; transform: translateX(-20px); }
  to { opacity: 1; transform: translateX(0); }
}

.fade-in-down {
  animation: fadeInDown 0.8s ease forwards;
}
.scale-in {
  animation: scaleIn 0.8s ease forwards;
  animation-delay: 0.2s;
}
.fade-in-left {
  animation: fadeInLeft 0.5s ease forwards;
}

/* Decorative circles */
.decorative-circle {
  position: absolute;
  border-radius: 9999px;
  border: 2px solid rgba(34, 197, 94, 0.15);
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-name: rotate360;
  animation-duration: 20s;
  top: 8rem;
  left: 2.5rem;
  width: 5rem;
  height: 5rem;
}
.decorative-circle.circle2 {
  top: auto;
  bottom: 5rem;
  right: 2.5rem;
  width: 4rem;
  height: 4rem;
  border-color: rgba(34, 197, 94, 0.1);
  animation-duration: 15s;
  animation-name: rotate360Reverse;
}

@keyframes rotate360 {
  0% { transform: rotate(0deg);}
  100% { transform: rotate(360deg);}
}
@keyframes rotate360Reverse {
  0% { transform: rotate(0deg);}
  100% { transform: rotate(-360deg);}
}

/* Responsive */
@media (max-width: 500px) {
  .container {
    max-width: 90vw;
  }
  .price {
    font-size: 2.5rem;
  }
  .pricing-header h2 {
    font-size: 2.5rem;
  }
}

  </style>
  </div>

  <div class="opacity-0 translate-y-6 transition-all duration-700 ease-out" id="fadeBox">
    <section class="faq-section">
  <div class="faq-container">
    <div class="faq-header">
      <h2>FAQ</h2>
    </div>

    <div class="faq-list" id="faq-list">
      <!-- FAQ items akan di-render oleh JavaScript -->
    </div>

    <!-- Decorative circles -->
    <div class="decorative-circle circle-top"></div>
    <div class="decorative-circle circle-bottom"></div>
  </div>
</section>

<style>
    /* FAQ Section Styles */
.faq-section {
  padding: 5rem 0 8rem;
  position: relative;
  overflow: hidden;
  background: linear-gradient(to bottom, #111827, #000);
  color: white;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.faq-container {
  max-width: 900px;
  margin: 0 auto;
  padding: 0 1rem;
  position: relative;
  z-index: 10;
}

.faq-header {
  text-align: center;
  margin-bottom: 4rem;
}

.faq-header h2 {
  font-size: 3rem;
  font-weight: 700;
  color: white;
  text-shadow: 0 0 8px rgba(0, 255, 0, 0.7);
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.faq-item {
  background: rgba(17, 24, 39, 0.8);
  border: 1px solid #2d3748;
  border-radius: 1rem;
  overflow: hidden;
  transition: background-color 0.3s ease;
}

.faq-item:hover {
  background-color: rgba(31, 41, 55, 0.6);
}

.faq-question {
  width: 100%;
  padding: 1.5rem;
  background: transparent;
  border: none;
  cursor: pointer;
  color: white;
  font-weight: 600;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 1.125rem;
  transition: background-color 0.3s ease;
}

.faq-question:hover {
  background-color: rgba(31, 41, 55, 0.5);
}

.faq-icon {
  font-size: 1.25rem;
  color: #22c55e; /* green-400 */
  transition: transform 0.3s ease;
  user-select: none;
}

.faq-answer {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, opacity 0.3s ease;
  padding: 0 1.5rem;
  font-weight: 400;
  color: #d1d5db; /* gray-300 */
  line-height: 1.6;
}

.faq-answer.open {
  max-height: 500px; /* enough for answer text */
  opacity: 1;
  padding-bottom: 1.5rem;
}

/* Decorative circles */
.decorative-circle {
  position: absolute;
  border-radius: 9999px;
  border: 2px solid rgba(34, 197, 94, 0.1);
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

.circle-top {
  top: 10rem;
  right: 5rem;
  width: 8rem;
  height: 8rem;
  animation-name: scalePulse1;
  animation-duration: 4s;
}

.circle-bottom {
  bottom: 10rem;
  left: 5rem;
  width: 6rem;
  height: 6rem;
  border-color: rgba(34, 197, 94, 0.2);
  animation-name: scalePulse2;
  animation-duration: 6s;
}

@keyframes scalePulse1 {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.1); }
}

@keyframes scalePulse2 {
  0%, 100% { transform: scale(1.1); }
  50% { transform: scale(1); }
}

</style>

<script>
    const faqs = [
  {
    question: "Apakah kelas ini cocok untuk aku yang masih punya pacar?",
    answer: "Ya, sangat cocok. Kelas ini dirancang untuk membantu kamu memahami dirimu sendiri dan pola hubunganmu baik kamu sedang sendiri, PDKT, pacaran, menikah, atau baru selesai dari hubungan yang rumit."
  },
  {
    question: "Aku pernah ikut kelas healing juga sebelumnya. Apa bedanya dengan kelas ini?",
    answer: "Kelas ini fokus spesifik pada pola hubungan dan trauma relasi, dengan pendekatan psikologi yang praktis dan mudah dipahami. Kami menyediakan workbook, komunitas support, dan materi yang dapat diakses seumur hidup."
  },
  {
    question: "Berapa lama durasi kelas ini? Bisa diakses selamanya?",
    answer: "Ya, ini adalah akses lifetime. Kamu bisa mengakses semua materi kapan saja, belajar dengan ritme sendiri, dan kembali mengulang materi ketika dibutuhkan."
  },
  {
    question: "Ada sesi live atau semuanya video rekaman?",
    answer: "Sebagian besar adalah video rekaman berkualitas tinggi yang bisa diakses kapan saja. Namun ada juga sesi live terbatas untuk Q&A dan diskusi komunitas."
  },
  {
    question: "Kalau aku merasai nggak relate atau nggak cocok, bisa refund?",
    answer: "Kami sangat percaya dengan kualitas program ini. Namun jika dalam 7 hari pertama kamu merasa tidak cocok, kami menyediakan garansi uang kembali 100%."
  },
  {
    question: "Boleh ikutan meski aku masih kuliah atau baru lulus?",
    answer: "Tentu saja! Program ini cocok untuk siapa saja yang ingin memahami pola hubungan mereka, tanpa batasan usia atau status. Justru semakin dini kamu memahami, semakin baik untuk perjalanan hidupmu."
  },
  {
    question: "Apakah ini terapi atau bisa menggantikan psikolog?",
    answer: "Ini adalah program pembelajaran dan refleksi diri, bukan terapi profesional. Jika kamu membutuhkan bantuan psikologis intensif, kami tetap menyarankan konsultasi dengan profesional."
  },
  {
    question: "Apa yang aku butuhkan untuk mengikuti kelas ini?",
    answer: "Kamu hanya butuh koneksi internet, perangkat untuk menonton video (HP/laptop/tablet), dan yang terpenting: niat untuk belajar dan berubah. Semua materi disediakan dalam platform yang mudah diakses."
  }
];

const faqListEl = document.getElementById('faq-list');
let openIndex = -1;

function createFaqItem(faq, index) {
  const faqItem = document.createElement('div');
  faqItem.className = 'faq-item';

  const questionBtn = document.createElement('button');
  questionBtn.className = 'faq-question';
  questionBtn.type = 'button';

  const questionSpan = document.createElement('span');
  questionSpan.textContent = faq.question;

  const iconSpan = document.createElement('span');
  iconSpan.className = 'faq-icon';
  iconSpan.textContent = '+';

  questionBtn.appendChild(questionSpan);
  questionBtn.appendChild(iconSpan);

  const answerDiv = document.createElement('div');
  answerDiv.className = 'faq-answer';
  answerDiv.innerHTML = `<p>${faq.answer}</p>`;

  questionBtn.addEventListener('click', () => {
    if (openIndex === index) {
      // close current
      answerDiv.classList.remove('open');
      iconSpan.textContent = '+';
      openIndex = -1;
    } else {
      // close previous if any
      if (openIndex !== -1) {
        const prevAnswer = faqListEl.children[openIndex].querySelector('.faq-answer');
        const prevIcon = faqListEl.children[openIndex].querySelector('.faq-icon');
        prevAnswer.classList.remove('open');
        prevIcon.textContent = '+';
      }
      // open current
      answerDiv.classList.add('open');
      iconSpan.textContent = '×';
      openIndex = index;
    }
  });

  faqItem.appendChild(questionBtn);
  faqItem.appendChild(answerDiv);

  return faqItem;
}

// Render all FAQs
faqs.forEach((faq, idx) => {
  faqListEl.appendChild(createFaqItem(faq, idx));
});


const fadeBox = document.getElementById("fadeBox");

  function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
  }

  function checkScroll() {
    if (isInViewport(fadeBox)) {
      fadeBox.classList.remove("opacity-0", "translate-y-6");
      fadeBox.classList.add("opacity-100", "translate-y-0");
    }
  }

  window.addEventListener("scroll", checkScroll);
  window.addEventListener("load", checkScroll);

</script>
  </div>

</body>

<footer class="bg-black border-t border-gray-800 py-8">
  <div class="container mx-auto px-4 text-center space-y-4">
    <p class="text-gray-400 text-sm">
      © 2025 The Heart Horizon. Seluruh materi dibuat dan dipresentasikan untuk tujuan edukasi.
    </p>
    <p class="text-gray-500 text-xs">
      Untuk penyegaran dan kerja sama, hubungi:<br />
      <span class="text-green-400">heart.horizon@email.com</span>
    </p>
    <div class="pt-4 border-t border-gray-800">
      <p class="text-gray-500 text-xs leading-relaxed italic">
        *Konten ini tidak mengandung bantuan profesional (psikolog/terapis) dan ditujukan sebagai media refleksi dan pembelajaran mandiri.*
      </p>
    </div>
  </div>

</footer>


</html>
