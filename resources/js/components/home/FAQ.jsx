import { motion } from 'framer-motion';
import { useState } from 'react';
import { FaPlus, FaTimes } from 'react-icons/fa';

const FAQ = () => {
  const [openIndex, setOpenIndex] = useState(0);

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

  const toggleFAQ = (index) => {
    setOpenIndex(openIndex === index ? -1 : index);
  };

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
          <h2 className="text-4xl md:text-5xl font-bold text-white text-shadow">
            FAQ
          </h2>
        </motion.div>

        <div className="max-w-4xl mx-auto space-y-4">
          {faqs.map((faq, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              viewport={{ once: true }}
              className="backdrop-blur-custom rounded-xl border border-gray-800 overflow-hidden"
            >
              <button
                onClick={() => toggleFAQ(index)}
                className="w-full p-6 text-left flex items-center justify-between hover:bg-gray-800/50 transition-colors duration-300"
              >
                <span className="text-white font-medium pr-4">
                  {faq.question}
                </span>
                <motion.div
                  animate={{ rotate: openIndex === index ? 45 : 0 }}
                  transition={{ duration: 0.3 }}
                  className="flex-shrink-0"
                >
                  {openIndex === index ? (
                    <FaTimes className="text-green-400 text-xl" />
                  ) : (
                    <FaPlus className="text-green-400 text-xl" />
                  )}
                </motion.div>
              </button>

              <motion.div
                initial={false}
                animate={{
                  height: openIndex === index ? 'auto' : 0,
                  opacity: openIndex === index ? 1 : 0
                }}
                transition={{ duration: 0.3 }}
                className="overflow-hidden"
              >
                <div className="px-6 pb-6">
                  <p className="text-gray-300 leading-relaxed">
                    {faq.answer}
                  </p>
                </div>
              </motion.div>
            </motion.div>
          ))}
        </div>

        {/* Decorative background elements */}
        <motion.div
          className="absolute top-40 right-20 w-32 h-32 border border-green-500/10 rounded-full"
          animate={{ scale: [1, 1.1, 1] }}
          transition={{ duration: 4, repeat: Infinity }}
        />
        <motion.div
          className="absolute bottom-40 left-20 w-24 h-24 border border-green-400/20 rounded-full"
          animate={{ scale: [1.1, 1, 1.1] }}
          transition={{ duration: 6, repeat: Infinity }}
        />
      </div>
    </section>
  );
};

export default FAQ;