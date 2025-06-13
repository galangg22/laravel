import { motion } from 'framer-motion';
import { useState, useEffect } from 'react';

const WhyUs = () => {
  const [autoHoverIndex, setAutoHoverIndex] = useState(0);

  useEffect(() => {

    const interval = setInterval(() => {
      setAutoHoverIndex((prev) => (prev + 1) % 3);
    }, 2000);

    return () => clearInterval(interval);
  }, []);

  const getCardScale = (index) => {

    return autoHoverIndex === index ? 1.05 : 1;
  };

  const getCardGlow = (index) => {

    return autoHoverIndex === index ? "0 0 30px rgba(0, 255, 0, 0.5)" : "0 0 20px rgba(0, 255, 0, 0.3)";
  };

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

  return (
    <motion.section
      className="min-h-screen w-full gradient-bg flex flex-col items-center justify-center px-4 py-8"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      transition={{ duration: 1 }}
    >
      <motion.h1
        className="text-2xl md:text-4xl lg:text-5xl font-bold text-white text-center mb-16 text-shadow"
        initial={{ y: -50, opacity: 0 }}
        animate={{ y: 0, opacity: 1 }}
        transition={{ duration: 1, delay: 0.5 }}
      >
        Kenapa Harus Pilih Kita?
      </motion.h1>

      <div className="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 max-w-7xl w-full">
        {cards.map((card, index) => (
          <motion.div
            key={index}
            className="card-gradient rounded-xl p-6"
            initial={{ x: index === 0 ? -100 : index === 1 ? 0 : 100, opacity: 0 }}
            animate={{
              x: 0,
              opacity: 1,
              scale: getCardScale(index),
              boxShadow: getCardGlow(index)
            }}
            transition={{
              duration: 0.8,
              delay: 0.8 + (index * 0.2),
              scale: { duration: 0.3 },
              boxShadow: { duration: 0.3 }
            }}
            style={{
              transformOrigin: "center"
            }}
          >
            <h3 className="text-white text-xl font-bold mb-4 bg-green-800 bg-opacity-70 px-4 py-2 rounded-lg">
              {card.title}
            </h3>
            <div className="flex flex-col md:flex-row gap-4">
              <img
                src={card.image}
                alt={card.alt}
                className="rounded-lg w-full md:w-32 h-24 object-cover"
              />
              <p className="text-green-200 text-sm leading-relaxed">
                {card.text}
              </p>
            </div>
          </motion.div>
        ))}
      </div>
    </motion.section>
  );
};

export default WhyUs;