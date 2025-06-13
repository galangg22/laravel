import { motion } from 'framer-motion';
import { FaPlay, FaChevronLeft, FaChevronRight } from 'react-icons/fa';

const CTASection = () => {
  return (
    <motion.section 
      className="min-h-screen w-full gradient-bg flex flex-col items-center justify-center px-4 py-16"
      initial={{ opacity: 0 }}
      whileInView={{ opacity: 1 }}
      transition={{ duration: 1 }}
      viewport={{ once: true }}
    >
      <div className="max-w-4xl w-full text-center">
        <motion.div
          className="flex items-center justify-center gap-4 mb-8"
          initial={{ scale: 0 }}
          whileInView={{ scale: 1 }}
          transition={{ duration: 0.8, delay: 0.2 }}
          viewport={{ once: true }}
        >
          <motion.button
            className="text-green-400 text-2xl hover:text-green-300 transition-colors"
            whileHover={{ scale: 1.2 }}
            whileTap={{ scale: 0.9 }}
          >
            <FaChevronLeft />
          </motion.button>
          
          <motion.button
            className="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-full flex items-center gap-3 text-lg font-semibold glow-effect transition-all duration-300"
            whileHover={{ 
              scale: 1.05, 
              boxShadow: "0 0 30px rgba(0, 255, 0, 0.6)" 
            }}
            whileTap={{ scale: 0.95 }}
            initial={{ y: 20, opacity: 0 }}
            whileInView={{ y: 0, opacity: 1 }}
            transition={{ duration: 0.6, delay: 0.4 }}
            viewport={{ once: true }}
          >
            <FaPlay className="text-sm" />
            MULAI PERJALANANMU SEKARANG
          </motion.button>
          
          <motion.button
            className="text-green-400 text-2xl hover:text-green-300 transition-colors"
            whileHover={{ scale: 1.2 }}
            whileTap={{ scale: 0.9 }}
          >
            <FaChevronRight />
          </motion.button>
        </motion.div>

        <motion.div
          className="card-gradient rounded-xl p-8 glow-effect mt-20"
          initial={{ y: 50, opacity: 0 }}
          whileInView={{ y: 0, opacity: 1 }}
          transition={{ duration: 0.8, delay: 0.6 }}
          viewport={{ once: true }}
          whileHover={{ scale: 1.02 }}
        >
          <div className="flex flex-col md:flex-row items-center gap-6">
            <motion.img
              src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face"
              alt="Alain de Botton"
              className="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover"
              whileHover={{ scale: 1.1 }}
              transition={{ duration: 0.3 }}
            />
            <div className="text-left flex-1">
              <motion.p 
                className="text-green-100 text-lg md:text-xl leading-relaxed mb-4"
                initial={{ opacity: 0 }}
                whileInView={{ opacity: 1 }}
                transition={{ duration: 1, delay: 0.8 }}
                viewport={{ once: true }}
              >
                "Kita tidak diajarkan bagaimana mencintai. Kita hanya diberi tahu 
                bahwa cinta itu naluri. Padahal, cinta sejati adalah keterampilan dan 
                sangat sekali dari kita yang terlahir dengan kemampuan itu. Itulah 
                sebabnya hubungan dongeng seperti yang kita bayangkan tidak lebih mirip 
                ruang kelas yang rumit, membingungkan, dan kadang menyakitkan."
              </motion.p>
              <motion.div
                className="text-green-300 text-sm"
                initial={{ opacity: 0 }}
                whileInView={{ opacity: 1 }}
                transition={{ duration: 0.8, delay: 1 }}
                viewport={{ once: true }}
              >
                <p className="font-semibold">— Alain de Botton</p>
                <p className="italic">Penulis buku "The Course of Love"</p>
              </motion.div>
            </div>
          </div>
        </motion.div>
      </div>
    </motion.section>
  );
};

export default CTASection;