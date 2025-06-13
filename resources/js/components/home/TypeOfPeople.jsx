import { motion } from "framer-motion";

const TypeOfPeople = () => {
  return (
    <section className="relative min-h-screen flex items-center justify-center overflow-hidden">
      {/* Dark gradient background */}
      <div className="absolute inset-0 bg-gradient-to-r from-red-900 via-black  to-green-900"></div>
      {/* Animated background overlay */}
      {/* <motion.div
        className="absolute inset-0"
        animate={{
          background: [
            'radial-gradient(circle at 30% 70%, rgba(220, 38, 38, 0.1) 0%, transparent 60%)',
            'radial-gradient(circle at 70% 30%, rgba(34, 197, 94, 0.1) 0%, transparent 60%)',
            'radial-gradient(circle at 50% 50%, rgba(120, 119, 198, 0.08) 0%, transparent 50%)',
          ]
        }}
        transition={{
          duration: 12,
          repeat: Infinity,
          repeatType: 'reverse'
        }}
      /> */}

      <div className="container mx-auto px-4 sm:px-6 py-8 sm:py-12 lg:py-20 relative z-10">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1 }}
          className="text-center max-w-7xl mx-auto"
        >
          {/* Main Title */}
          <motion.h1
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ delay: 0.3, duration: 0.8 }}
            className="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-8 sm:mb-12 lg:mb-16 text-white leading-tight"
          >
            Kamu Tipe Orang yang Mana?
          </motion.h1>

          {/* Main Content Layout - Desktop */}
          <div className="hidden lg:flex lg:flex-row gap-4 justify-center items-center max-w-6xl mx-auto">
            {/* Left Side Text - Red Theme */}
            <motion.div
              initial={{ opacity: 0, x: -100 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.6, duration: 0.8 }}
              className="flex-1 text-right pr-8"
            >
              <div className="space-y-4">
                <motion.p
                  initial={{ opacity: 0, x: -50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.8, duration: 0.6 }}
                  className="text-red-200 text-base leading-relaxed"
                >
                  Menyimpan dendam, tapi nggak pernah benar-benar memproses luka
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: -50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.9, duration: 0.6 }}
                  className="text-red-200 text-base leading-relaxed"
                >
                  Menyalahkan masa lalu, tapi enggan melihat ke dalam diri
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: -50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.0, duration: 0.6 }}
                  className="text-red-200 text-base leading-relaxed"
                >
                  Menghindari hubungan sehat, karena "kayaknya terlalu asing"
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: -50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.1, duration: 0.6 }}
                  className="text-red-200 text-base leading-relaxed"
                >
                  Bilangnya kuat, tapi di dalam hati masih ketakutan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: -50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.2, duration: 0.6 }}
                  className="text-red-200 text-base leading-relaxed"
                >
                  Nggak percaya bahwa cinta bisa sembuh, bisa jadi aman
                </motion.p>
              </div>
            </motion.div>

            {/* Center Images */}
            <div className="flex flex-row gap-6 justify-center">
              {/* Left Image Card - Red */}
              <motion.div
                initial={{ opacity: 0, y: 50, rotateY: 15 }}
                animate={{ opacity: 1, y: 0, rotateY: 0 }}
                transition={{ delay: 0.7, duration: 0.8 }}
                whileHover={{
                  scale: 1.05,
                  rotateY: -10,
                  transition: { duration: 0.3 },
                }}
                className="relative"
              >
                <div className="relative w-64 h-80 rounded-2xl overflow-hidden border-4 border-red-600/50 shadow-2xl">
                  <motion.img
                    whileHover={{ scale: 1.1 }}
                    transition={{ duration: 0.5 }}
                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face"
                    alt="Masih Terjebak dalam Pola Lama"
                    className="w-full h-full object-cover"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-900/30 to-transparent"></div>

                  {/* Bottom Label */}
                  <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 1.4, duration: 0.6 }}
                    className="absolute bottom-4 left-4 right-4 text-center"
                  >
                    <div className="bg-red-900/80 backdrop-blur-sm rounded-xl px-4 py-3 border border-red-600/50">
                      <p className="text-red-200 font-bold text-lg">
                        Masih Terjebak
                      </p>
                      <p className="text-red-300 text-sm">dalam Pola Lama</p>
                    </div>
                  </motion.div>
                </div>
              </motion.div>

              {/* Right Image Card - Green */}
              <motion.div
                initial={{ opacity: 0, y: 50, rotateY: -15 }}
                animate={{ opacity: 1, y: 0, rotateY: 0 }}
                transition={{ delay: 0.7, duration: 0.8 }}
                whileHover={{
                  scale: 1.05,
                  rotateY: 10,
                  transition: { duration: 0.3 },
                }}
                className="relative"
              >
                <div className="relative w-64 h-80 rounded-2xl overflow-hidden border-4 border-green-600/50 shadow-2xl">
                  <motion.img
                    whileHover={{ scale: 1.1 }}
                    transition={{ duration: 0.5 }}
                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face"
                    alt="Siap Menemukan Arah Baru"
                    className="w-full h-full object-cover"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-green-900/90 via-green-900/30 to-transparent"></div>

                  {/* Bottom Label */}
                  <motion.div
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 1.4, duration: 0.6 }}
                    className="absolute bottom-4 left-4 right-4 text-center"
                  >
                    <div className="bg-green-900/80 backdrop-blur-sm rounded-xl px-4 py-3 border border-green-600/50">
                      <p className="text-green-200 font-bold text-lg">
                        Siap Menemukan
                      </p>
                      <p className="text-green-300 text-sm">Arah Baru</p>
                    </div>
                  </motion.div>
                </div>
              </motion.div>
            </div>

            {/* Right Side Text - Green Theme */}
            <motion.div
              initial={{ opacity: 0, x: 100 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.6, duration: 0.8 }}
              className="flex-1 text-left pl-8"
            >
              <div className="space-y-4">
                <motion.p
                  initial={{ opacity: 0, x: 50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.8, duration: 0.6 }}
                  className="text-green-200 text-base leading-relaxed"
                >
                  Belajar memaafkan, tanpa harus melupakan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: 50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 0.9, duration: 0.6 }}
                  className="text-green-200 text-base leading-relaxed"
                >
                  Mau melihat ulang pola yang menyakiti, dengan jujur
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: 50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.0, duration: 0.6 }}
                  className="text-green-200 text-base leading-relaxed"
                >
                  Siap membangun relasi dengan fondasi yang sehat
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: 50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.1, duration: 0.6 }}
                  className="text-green-200 text-base leading-relaxed"
                >
                  Berani mengakui kelemahan, bukan untuk dikasihani tapi untuk
                  disembuhkan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0, x: 50 }}
                  animate={{ opacity: 1, x: 0 }}
                  transition={{ delay: 1.2, duration: 0.6 }}
                  className="text-green-200 text-base leading-relaxed"
                >
                  Tahu bahwa cinta itu mungkin... tapi dimulai dari dalam
                </motion.p>
              </div>
            </motion.div>
          </div>

          {/* Mobile & Tablet Layout */}
          <div className="lg:hidden space-y-8 max-w-lg mx-auto">
            {/* Gambar 1 - Red */}
            <motion.div
              initial={{ opacity: 0, y: 50 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.7, duration: 0.8 }}
              className="flex justify-center"
            >
              <div className="relative w-48 h-60 sm:w-56 sm:h-72 rounded-xl overflow-hidden border-3 border-red-600/50 shadow-2xl">
                <motion.img
                  whileHover={{ scale: 1.05 }}
                  transition={{ duration: 0.5 }}
                  src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop&crop=face"
                  alt="Masih Terjebak dalam Pola Lama"
                  className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-900/30 to-transparent"></div>

                {/* Bottom Label */}
                <motion.div
                  initial={{ opacity: 0, y: 20 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ delay: 1.4, duration: 0.6 }}
                  className="absolute bottom-3 left-3 right-3 text-center"
                >
                  <div className="bg-red-900/80 backdrop-blur-sm rounded-lg px-3 py-2.5 border border-red-600/50">
                    <p className="text-red-200 font-bold text-sm">
                      Masih Terjebak
                    </p>
                    <p className="text-red-300 text-xs">dalam Pola Lama</p>
                  </div>
                </motion.div>
              </div>
            </motion.div>

            {/* Paragraph 1 - Red */}
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.8, duration: 0.8 }}
              className="text-center px-4"
            >
              <div className="space-y-3">
                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.0, duration: 0.6 }}
                  className="text-red-200 text-sm leading-relaxed"
                >
                  Menyimpan dendam, tapi nggak pernah benar-benar memproses luka
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.1, duration: 0.6 }}
                  className="text-red-200 text-sm leading-relaxed"
                >
                  Menyalahkan masa lalu, tapi enggan melihat ke dalam diri
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.2, duration: 0.6 }}
                  className="text-red-200 text-sm leading-relaxed"
                >
                  Menghindari hubungan sehat, karena "kayaknya terlalu asing"
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.3, duration: 0.6 }}
                  className="text-red-200 text-sm leading-relaxed"
                >
                  Bilangnya kuat, tapi di dalam hati masih ketakutan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.4, duration: 0.6 }}
                  className="text-red-200 text-sm leading-relaxed"
                >
                  Nggak percaya bahwa cinta bisa sembuh, bisa jadi aman
                </motion.p>
              </div>
            </motion.div>

            {/* Gambar 2 - Green */}
            <motion.div
              initial={{ opacity: 0, y: 50 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 1.5, duration: 0.8 }}
              className="flex justify-center"
            >
              <div className="relative w-48 h-60 sm:w-56 sm:h-72 rounded-xl overflow-hidden border-3 border-green-600/50 shadow-2xl">
                <motion.img
                  whileHover={{ scale: 1.05 }}
                  transition={{ duration: 0.5 }}
                  src="https://images.unsplash.com/photo-1494790108755-2616c7e8d7e3?w=400&h=500&fit=crop&crop=face"
                  alt="Siap Menemukan Arah Baru"
                  className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-green-900/90 via-green-900/30 to-transparent"></div>

                {/* Bottom Label */}
                <motion.div
                  initial={{ opacity: 0, y: 20 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ delay: 2.2, duration: 0.6 }}
                  className="absolute bottom-3 left-3 right-3 text-center"
                >
                  <div className="bg-green-900/80 backdrop-blur-sm rounded-lg px-3 py-2.5 border border-green-600/50">
                    <p className="text-green-200 font-bold text-sm">
                      Siap Menemukan
                    </p>
                    <p className="text-green-300 text-xs">Arah Baru</p>
                  </div>
                </motion.div>
              </div>
            </motion.div>

            {/* Paragraph 2 - Green */}
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 1.6, duration: 0.8 }}
              className="text-center px-4"
            >
              <div className="space-y-3">
                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.8, duration: 0.6 }}
                  className="text-green-200 text-sm leading-relaxed"
                >
                  Belajar memaafkan, tanpa harus melupakan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 1.9, duration: 0.6 }}
                  className="text-green-200 text-sm leading-relaxed"
                >
                  Mau melihat ulang pola yang menyakiti, dengan jujur
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 2.0, duration: 0.6 }}
                  className="text-green-200 text-sm leading-relaxed"
                >
                  Siap membangun relasi dengan fondasi yang sehat
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 2.1, duration: 0.6 }}
                  className="text-green-200 text-sm leading-relaxed"
                >
                  Berani mengakui kelemahan, bukan untuk dikasihani tapi untuk
                  disembuhkan
                </motion.p>

                <motion.p
                  initial={{ opacity: 0 }}
                  animate={{ opacity: 1 }}
                  transition={{ delay: 2.2, duration: 0.6 }}
                  className="text-green-200 text-sm leading-relaxed"
                >
                  Tahu bahwa cinta itu mungkin... tapi dimulai dari dalam
                </motion.p>
              </div>
            </motion.div>
          </div>
        </motion.div>
      </div>

      {/* Decorative animated particles - Hidden on small screens */}
      <motion.div
        className="absolute top-32 left-20 w-3 h-3 bg-red-400 rounded-full hidden lg:block"
        animate={{
          opacity: [0.3, 1, 0.3],
          scale: [1, 1.8, 1],
          rotate: [0, 180, 360],
        }}
        transition={{ duration: 4, repeat: Infinity }}
      />
      <motion.div
        className="absolute top-48 right-32 w-4 h-4 bg-green-400 rounded-full hidden lg:block"
        animate={{
          opacity: [0.5, 1, 0.5],
          y: [0, -15, 0],
          rotate: [0, -180, 0],
        }}
        transition={{ duration: 5, repeat: Infinity }}
      />
      <motion.div
        className="absolute bottom-32 left-32 w-2 h-2 bg-yellow-400 rounded-full hidden md:block"
        animate={{
          opacity: [0.4, 1, 0.4],
          x: [0, 20, 0],
          scale: [1, 1.5, 1],
        }}
        transition={{ duration: 6, repeat: Infinity }}
      />
      <motion.div
        className="absolute bottom-48 right-20 w-2 h-2 bg-blue-400 rounded-full hidden md:block"
        animate={{
          opacity: [0.2, 0.8, 0.2],
          rotate: [0, 360, 0],
        }}
        transition={{ duration: 3, repeat: Infinity }}
      />
      <motion.div
        className="absolute top-1/2 left-16 w-1 h-1 bg-purple-400 rounded-full hidden lg:block"
        animate={{
          opacity: [0.3, 1, 0.3],
          scale: [1, 2, 1],
        }}
        transition={{ duration: 3.5, repeat: Infinity }}
      />
    </section>
  );
};

export default TypeOfPeople;
