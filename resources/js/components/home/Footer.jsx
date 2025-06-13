import { motion } from 'framer-motion';

const Footer = () => {
  return (
    <footer className="relative py-12 bg-black border-t border-gray-800">
      <div className="container mx-auto px-4">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center space-y-4"
        >
          <p className="text-gray-400 text-sm">
            © 2025 The Heart Horizon. Seluruh materi dibuat dan dipresentasikan untuk tujuan edukasi.
          </p>
          <p className="text-gray-500 text-xs">
            Untuk penyegaran dan kerja sama, hubungi:<br/>
            <span className="text-green-400">heart.horizon@email.com</span>
          </p>
          <div className="pt-4 border-t border-gray-800">
            <p className="text-gray-500 text-xs leading-relaxed">
              *Konten ini tidak mengandung bantuan profesional (psikolog/terapis)<br/>
              dan ditujukan sebagai media refleksi dan pembelajaran mandiri.*
            </p>
          </div>
        </motion.div>
      </div>

      {/* Decorative elements */}
      <motion.div
        className="absolute top-4 left-10 w-1 h-1 bg-green-500 rounded-full"
        animate={{ opacity: [0.3, 1, 0.3] }}
        transition={{ duration: 2, repeat: Infinity }}
      />
      <motion.div
        className="absolute bottom-4 right-10 w-1 h-1 bg-green-400 rounded-full"
        animate={{ opacity: [0.5, 1, 0.5] }}
        transition={{ duration: 3, repeat: Infinity }}
      />
    </footer>
  );
};

export default Footer;