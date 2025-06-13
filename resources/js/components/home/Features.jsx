import { motion } from 'framer-motion';
import { IoClose, IoCheckmark } from 'react-icons/io5';

const Features = () => {
  return (
    <section className=" py-20 px-8 relative">
      {/* <BackgroundEffects /> */}
      <div className="max-w-5xl mx-auto relative z-10">
        <motion.h2
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6 }}
          className="text-3xl font-bold text-center mb-12"
        >
          <span className="text-white">Ini </span>
          <span className="text-green-400">cocok</span>
          <span className="text-white"> untuk kamu yang ingin</span>
        </motion.h2>

        <div className="grid md:grid-cols-2 gap-6 lg:mx-10">
          {/* Menghindari Section */}
          <motion.div
            initial={{ opacity: 0, x: -50 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            className="bg-gray-900/60 backdrop-blur-sm rounded-2xl p-6 border border-red-500/30"
          >
            <h3 className="text-red-400 text-xl font-bold mb-6 flex items-center">
              <span>Menghindari</span>
              <IoClose className="ml-2 w-6 h-6 bg-red-500 text-white rounded-full p-1" />
            </h3>

            <div className="space-y-4">
              <div className="flex items-start space-x-3">
                <IoClose className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Terus cek hubungan dengan pasangan yang nggak jelas yang kamu suka salah, tapi salah kamu tanggugaan.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoClose className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Menyalahkan diri sendiri tapi kali hubungan gagal, seolah kamu selalu penyebabnya.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoClose className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Terjebak ketergantungan pada validasi pasangan, seolah harga diri kamu tergantung.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoClose className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Komunikasi onta dengan pola lama yang terus berulang, tapi nggak tahu gimana</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoClose className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Dan takut lagi tidak kamu sekali.</p>
              </div>
            </div>
          </motion.div>

          {/* Membangun Section */}
          <motion.div
            initial={{ opacity: 0, x: 50 }}
            whileInView={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="bg-gray-900/60 backdrop-blur-sm rounded-2xl p-6 border border-green-500/30"
          >
            <h3 className="text-green-400 text-xl font-bold mb-6 flex items-center">
              <span>Membangun</span>
              <IoCheckmark className="ml-2 w-6 h-6 bg-green-500 text-white rounded-full p-1" />
            </h3>

            <div className="space-y-4">
              <div className="flex items-start space-x-3">
                <IoCheckmark className="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Lebih sabar oleh rasa dan tulus emotional yang sekilar itu kesemuanya.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoCheckmark className="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Lebih tenang saat menghadap konflik, karena kamu tahu akar masalahnya.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoCheckmark className="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Hubungan dengan cara yang sehat.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoCheckmark className="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Lebih percaya diri dalam relasi, karena kamu tahu limitmu tapi juga kebutuhan yang sehat sebelumnya.</p>
              </div>
              <div className="flex items-start space-x-3">
                <IoCheckmark className="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" />
                <p className="text-gray-300 text-sm leading-relaxed">Siap memulai oh untuk hubungan yang sehat sebelumnya.</p>
              </div>
            </div>
          </motion.div>
        </div>
      </div>
    </section>
  );
};

export default Features;