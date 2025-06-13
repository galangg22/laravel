import { motion } from 'framer-motion';
import { useState, useEffect } from 'react';

const DoYouKnow = () => {
  const [autoHoverIndex, setAutoHoverIndex] = useState(0);

  useEffect(() => {
  
    const interval = setInterval(() => {
      setAutoHoverIndex((prev) => (prev + 1) % 3);
    }, 2500); 

    return () => clearInterval(interval);
  }, []);

  const getCardScale = (index) => {
   
    return autoHoverIndex === index ? 1.02 : 1;
  };

  const getCardGlow = (index) => {
   
    return autoHoverIndex === index ? "0 0 25px rgba(0, 255, 0, 0.4)" : "0 0 20px rgba(0, 255, 0, 0.3)";
  };

  const facts = [
    {
      image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&h=200&fit=crop",
      text: "Banyak pria sulit membuka diri bukan karena tidak peduli, tapi karena tidak pernah diajarkan cara mengekspresikan emosi dengan aman. Banyak laki-laki tumbuh dengan keyakinan bahwa menangis adalah kelemahan. Mereka akhirnya belajar menekan, bukan menyampaikan. Akibatnya? Dalam hubungan, mereka lebih sering diam saat justru dibutuhkan untuk hadir."
    },
    {
      image: "https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=300&h=200&fit=crop",
      text: "Banyak wanita merasa lelah dalam hubungan bukan karena terlalu sensitif, tapi karena terlalu sering memikul semuanya sendiri. Perempuan sering terbiasa jadi penyelamat: memahami, memaafkan, mengalah. Tapi dalam relasi yang tidak setara, empati bisa berubah jadi kelelahan yang tidak terlihat."
    },
    {
      image: "https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=300&h=200&fit=crop",
      text: "Hubungan gagal bukan selalu karena kurang cinta tapi karena dua orang saling mencintai dengan luka yang belum sembuh. Cinta butuh lebih dari sekedar perasaan. Ia butuh komunikasi, pemahaman, dan dua orang yang mau belajar bersama, bukan saling menuntut untuk jadi sempurna."
    }
  ];

  return (
    <motion.section 
      className="min-h-screen w-full gradient-bg flex flex-col items-center justify-center px-4 py-16"
      initial={{ opacity: 0 }}
      whileInView={{ opacity: 1 }}
      transition={{ duration: 1 }}
      viewport={{ once: true }}
    >
      <motion.h2 
        className="text-3xl md:text-4xl lg:text-5xl font-bold text-white text-center mb-16 text-shadow"
        initial={{ y: 50, opacity: 0 }}
        whileInView={{ y: 0, opacity: 1 }}
        transition={{ duration: 0.8 }}
        viewport={{ once: true }}
      >
        Tahukah Kamu?
      </motion.h2>

      <div className="max-w-4xl w-full space-y-8">
        {facts.map((fact, index) => (
          <motion.div
            key={index}
            className="card-gradient rounded-xl p-6"
            initial={{ x: index % 2 === 0 ? -100 : 100, opacity: 0 }}
            whileInView={{ x: 0, opacity: 1 }}
            animate={{
              scale: getCardScale(index),
              boxShadow: getCardGlow(index)
            }}
            transition={{ 
              duration: 0.8, 
              delay: index * 0.2,
              scale: { duration: 0.3 },
              boxShadow: { duration: 0.3 }
            }}
            viewport={{ once: true }}
            style={{
              transformOrigin: "center"
            }}
          >
            <div className="flex flex-col md:flex-row gap-6 items-start">
              <motion.img
                src={fact.image}
                alt={`Fact ${index + 1}`}
                className="w-full md:w-48 h-32 object-cover rounded-lg"
                animate={{
                  scale:  autoHoverIndex === index ? 1.05 : 1
                }}
                transition={{ duration: 0.3 }}
              />
              <div className="flex-1">
                <p className="text-green-100 leading-relaxed text-sm md:text-base">
                  "{fact.text}"
                </p>
              </div>
            </div>
          </motion.div>
        ))}
      </div>
    </motion.section>
  );
};

export default DoYouKnow;