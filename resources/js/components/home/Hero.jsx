import { motion } from "framer-motion";
import { FaPlay } from "react-icons/fa";

const Hero = () => {
  return (
    <section className="min-h-screen mt-10 bg-gradient-to-br from-black via-gray-900 to-green-900 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 relative overflow-hidden">
      <div className="absolute inset-0 bg-[url('/img/img.png')] bg-cover bg-center opacity-5"></div>

      {/* Main Content Container */}
      <div className="w-full max-w-7xl mx-auto flex flex-col  items-center text-center justify-center   z-10 mt-10">
        {/* Left Side - Main Content */}
        <motion.div
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          className="text-center  flex-1 max-w-4xl"
        >
          <h1 className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6 leading-tight">
            Temukan Arah Baru untuk Hati
            <br />
            <span className="text-green-400">yang Pernah Tersesat.</span>
          </h1>

          <p className="text-gray-300 text-base sm:text-lg md:text-xl mb-6 lg:mb-10">
            Heart Horizon akan membantu memahami kembali luka, koneksi, dan
            cinta dengan cara yang tepat melalui dewasa dan sehat.
          </p>

          {/* Video Player - Mobile/Tablet */}
          <motion.div
            whileHover={{ scale: 1.05 }}
            className="relative mb-8 lg:hidden"
          >
            <div className="w-full max-w-sm h-40 sm:h-48 mx-auto bg-gray-800 rounded-2xl border-4 border-green-400 flex items-center justify-center cursor-pointer group">
              <div className="w-12 h-12 sm:w-16 sm:h-16 bg-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                <FaPlay className="text-gray-800 text-lg sm:text-xl ml-1" />
              </div>
            </div>
          </motion.div>
        </motion.div>

        {/* Right Side - Video Player (Desktop) & Quote Box */}
        <motion.div
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          className="flex-1 max-w-lg lg:max-w-xl w-full"
        >
          {/* Video Player - Desktop Only */}
          <motion.div
            whileHover={{ scale: 1.05 }}
            className="relative mb-8 hidden lg:block"
          >
            <div className="w-full h-56 xl:h-64 bg-gray-800 rounded-2xl border-4 border-green-400 flex items-center justify-center cursor-pointer group">
              <div className="w-16 h-16 xl:w-20 xl:h-20 bg-white rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                <FaPlay className="text-gray-800 text-xl xl:text-2xl ml-1" />
              </div>
            </div>
          </motion.div>

          <motion.button
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            className="bg-green-400 text-black font-bold py-3 sm:py-4 px-8 sm:px-12 rounded-full text-base sm:text-lg hover:bg-green-300 transition-colors mb-8 lg:mb-12"
          >
            MULAI PERJALANANMU
            <br />
            SEKARANG
          </motion.button>

          {/* Quote Box - Responsive with Long Text */}
          <motion.div
            initial={{ opacity: 0, x: 50 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.8, delay: 0.6 }}
            className="w-full mb-10"
          >
            <div className="bg-black/80 backdrop-blur-sm rounded-2xl p-4 sm:p-6 lg:p-8 border border-green-400/50 shadow-2xl max-h-96 lg:max-h-[500px] overflow-y-auto">
              <div className="space-y-4 text-white text-xs sm:text-sm lg:text-base leading-relaxed">
                <p>
                  <span className="text-green-400 font-semibold">
                    Kamu pernah ngerasa capek banget
                  </span>
                  , bukan karena hubunganmu berakhir, tapi karena kamu nggak
                  ngerti kenapa semuanya selalu berulang?
                </p>

                <p>
                  Mungkin kamu sering milih pasangan yang salah, tapi nggak tahu
                  kenapa kamu terus jadi orang yang kamu anggep sebagai "yang
                  salah" itu.
                </p>

                <p>
                  Atau kamu takut dekat sama orang, takut ditinggalin, tapi
                  lebih takut lagi jadi gak penting sama sekali.
                </p>

                <p>
                  Bisa juga kamu kelihatan kuat, cuek, mandiri padahal dalam
                  hati kamu cuma pengen diperlakukan kayak anak-anak.
                </p>

                <p>
                  Kamu tumbuh bawa cerita. Dari orang tua. Dari mantan. Dari
                  luka kecil yang waktu itu kamu anggap sepele.
                </p>

                <p>
                  Kamu belum nemuin cara yang tepat ngelindungin diri tanpa
                  akhirnya nyakitin orang lain.
                </p>

                <p>
                  Dan ketika hubunganmu gagal, kamu nyalahin diri sendiri:{" "}
                  <em>
                    "Mungkin aku terlalu lebay. Mungkin aku emang nggak pantas
                    dicintai. Mungkin aku harus belajar lebih banyak lagi."
                  </em>
                </p>

                <p>
                  Kalau itu semua terdengar familiar, berarti kamu ada di tempat
                  yang tepat. Aku bakal kasih tahu kenapa bisa ngeyakin sendiri
                  kamu gak pernah cukup.
                </p>

                <p className="text-green-300 font-medium">
                  Tapi buat kamu yang ngerti... Kenapa kamu merasa kayak gitu.
                </p>

                <p>
                  Kenapa kamu susah percaya orang (atau malah terlalu gampang
                  percaya). Kenapa kamu bisa kebiasaan diri sendiri tapi nggak
                  bisa ngomong.
                </p>

                <p>
                  Dan gimana caranya mulai bangun relasi yang sehat—bukan cuma
                  sama orang lain, tapi juga sama dirimu sendiri.
                </p>

                <p className="text-green-400 font-semibold">
                  The Heart Horizon aku rancang pelan-pelan, dengan hati. Bukan
                  kelas instan yang janji "move on dalam seminggu".
                </p>

                <p>
                  Tapi ruang yang aman, tempat kamu bisa belajar pelan-pelan
                  nempegang tanganmu sendiri... sebelum kamu siap memegang
                  tangan orang lain.
                </p>

                <p>
                  Dan ngelus luka ngerasa sendirian dalam luka itu, kamu nggak
                  sendiri.
                </p>

                <p className="text-green-300">
                  Kamu cuma belum tahu harus mulai dari mana.
                </p>

                <p className="text-green-400 font-medium">
                  Dan mungkin... ini adalah awalnya.
                </p>
              </div>

              {/* Scroll indicator */}
              <div className="flex justify-center mt-4 lg:hidden">
                <div className="flex space-x-1">
                  <div className="w-1 h-1 bg-green-400 rounded-full animate-pulse"></div>
                  <div className="w-1 h-1 bg-green-400/50 rounded-full animate-pulse delay-100"></div>
                  <div className="w-1 h-1 bg-green-400/30 rounded-full animate-pulse delay-200"></div>
                </div>
              </div>
            </div>
          </motion.div>
        </motion.div>
      </div>

      {/* Decorative elements */}
      <div className="absolute top-20 left-10 w-2 h-2 bg-green-400 rounded-full animate-pulse opacity-60"></div>
      <div className="absolute bottom-32 right-16 w-3 h-3 bg-green-400 rounded-full animate-pulse opacity-40"></div>
      <div className="absolute top-1/3 right-8 w-1 h-1 bg-white rounded-full animate-pulse opacity-50"></div>
    </section>
  );
};

export default Hero;
