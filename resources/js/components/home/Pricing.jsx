import { motion } from 'framer-motion';
import { FaCheck, FaStar } from 'react-icons/fa';

const Pricing = () => {
  const benefits = [
    "Akses video pembelajaran eksklusif berbasis psikologi relasi dan luka emosi",
    "Workbook dan latihan refleksi untuk memahami pola hubunganmu secara personal",
    "Penjelasan mendalam dengan bahasa yang mudah dipahami (tanpa istilah ribet)",
    "Komunitas privat Discord untuk sharing, diskusi, dan bertumbuh bersama",
    "Panduan mengenali pola trauma dalam relasi",
    "Belajar membedakan hubungan sehat dan ketergantungan emosional",
    "Materi tentang mengubah pola hubungan yang berulang jadi proses pertumbuhan",
    "Kesempatan untuk berdamai dengan masa lalu dan bangun relasi yang kamu pantes dapatkan"
  ];

  return (
    <section className="relative py-20 gradient-bg">
      <div className="container mx-auto px-4">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <h2 className="text-4xl md:text-5xl font-bold text-white text-shadow mb-4">
            Pricing
          </h2>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, scale: 0.9 }}
          whileInView={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          viewport={{ once: true }}
          className="max-w-md mx-auto"
        >
          <div className="relative backdrop-blur-custom rounded-3xl p-8 border-2 border-green-500 bg-gradient-to-b from-gray-900/50 to-black/50">
            {/* Badge */}
            <div className="absolute -top-3 left-1/2 transform -translate-x-1/2">
              <div className="bg-red-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                DISKON 90%!
              </div>
            </div>

            {/* Header */}
            <div className="text-center mb-6 pt-4">
              <div className="flex items-center justify-center mb-2">
                <FaStar className="text-green-400 mr-2" />
                <h3 className="text-xl font-bold text-white">Heart Horizon</h3>
              </div>
              <p className="text-gray-300 text-sm mb-4">
                DAPATKAN AKSES LIFETIME<br/>
                HEART HORIZON HANYA
              </p>

              {/* Price */}
              <div className="mb-6">
                <div className="text-5xl font-bold text-white mb-2">
                  Rp<span className="text-green-400">97.000</span>
                </div>
              </div>
            </div>

            {/* Benefits */}
            <div className="space-y-3 mb-8">
              <h4 className="text-green-400 font-semibold text-sm mb-4">BENEFIT</h4>
              {benefits.map((benefit, index) => (
                <motion.div
                  key={index}
                  initial={{ opacity: 0, x: -20 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  transition={{ duration: 0.5, delay: index * 0.1 }}
                  viewport={{ once: true }}
                  className="flex items-start space-x-3"
                >
                  <FaCheck className="text-green-400 text-sm mt-1 flex-shrink-0" />
                  <p className="text-gray-300 text-sm leading-relaxed">{benefit}</p>
                </motion.div>
              ))}
            </div>

            {/* CTA Button */}
            <motion.button
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.95 }}
              className="w-full green-accent text-white font-bold py-4 px-6 rounded-xl text-lg shadow-lg hover:shadow-green-500/25 transition-all duration-300"
            >
              AKSES LIFETIME<br/>
              <span className="text-sm font-normal">Rp. 97.000</span>
            </motion.button>
          </div>
        </motion.div>

        {/* Decorative elements */}
        <motion.div
          className="absolute top-32 left-10 w-20 h-20 border border-green-500/20 rounded-full"
          animate={{ rotate: 360 }}
          transition={{ duration: 20, repeat: Infinity, ease: "linear" }}
        />
        <motion.div
          className="absolute bottom-20 right-10 w-16 h-16 border border-green-400/30 rounded-full"
          animate={{ rotate: -360 }}
          transition={{ duration: 15, repeat: Infinity, ease: "linear" }}
        />
      </div>
    </section>
  );
};

export default Pricing;