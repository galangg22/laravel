import { motion } from 'framer-motion';

const BackgroundEffects = () => {
  return (
    <div className="fixed inset-0 overflow-hidden pointer-events-none z-0">
      {/* Animated Green Circles */}
      <motion.div
        className="absolute w-96 h-96 bg-green-400/20 rounded-full blur-3xl"
        style={{ top: '10%', left: '5%' }}
        animate={{
          x: [0, 50, 0],
          y: [0, -30, 0],
          scale: [1, 1.2, 1],
        }}
        transition={{
          duration: 8,
          repeat: Infinity,
          ease: "easeInOut"
        }}
      />

      <motion.div
        className="absolute w-64 h-64 bg-green-500/15 rounded-full blur-2xl"
        style={{ top: '60%', right: '10%' }}
        animate={{
          x: [0, -40, 0],
          y: [0, 40, 0],
          scale: [1, 0.8, 1],
        }}
        transition={{
          duration: 10,
          repeat: Infinity,
          ease: "easeInOut",
          delay: 2
        }}
      />

      {/* Animated Red/Pink Circles */}
      <motion.div
        className="absolute w-80 h-80 bg-red-500/20 rounded-full blur-3xl"
        style={{ top: '30%', right: '5%' }}
        animate={{
          x: [0, -60, 0],
          y: [0, 50, 0],
          scale: [1, 1.3, 1],
        }}
        transition={{
          duration: 12,
          repeat: Infinity,
          ease: "easeInOut",
          delay: 1
        }}
      />

      <motion.div
        className="absolute w-72 h-72 bg-pink-500/15 rounded-full blur-2xl"
        style={{ bottom: '20%', left: '15%' }}
        animate={{
          x: [0, 30, 0],
          y: [0, -25, 0],
          scale: [1, 0.9, 1],
        }}
        transition={{
          duration: 9,
          repeat: Infinity,
          ease: "easeInOut",
          delay: 3
        }}
      />

      {/* Animated Triangles */}
      <motion.div
        className="absolute"
        style={{ top: '15%', left: '20%' }}
        animate={{
          rotate: [0, 360],
          x: [0, 20, 0],
          y: [0, -15, 0],
        }}
        transition={{
          duration: 15,
          repeat: Infinity,
          ease: "linear"
        }}
      >
        <div className="w-0 h-0 border-l-[30px] border-r-[30px] border-b-[50px] border-l-transparent border-r-transparent border-b-green-400/30"></div>
      </motion.div>

      <motion.div
        className="absolute"
        style={{ top: '70%', right: '25%' }}
        animate={{
          rotate: [360, 0],
          x: [0, -25, 0],
          y: [0, 20, 0],
        }}
        transition={{
          duration: 18,
          repeat: Infinity,
          ease: "linear",
          delay: 2
        }}
      >
        <div className="w-0 h-0 border-l-[25px] border-r-[25px] border-b-[40px] border-l-transparent border-r-transparent border-b-red-400/25"></div>
      </motion.div>

      <motion.div
        className="absolute"
        style={{ bottom: '30%', right: '10%' }}
        animate={{
          rotate: [0, -360],
          x: [0, 15, 0],
          y: [0, -30, 0],
        }}
        transition={{
          duration: 20,
          repeat: Infinity,
          ease: "linear",
          delay: 4
        }}
      >
        <div className="w-0 h-0 border-l-[20px] border-r-[20px] border-b-[35px] border-l-transparent border-r-transparent border-b-pink-400/20"></div>
      </motion.div>

      {/* Additional Floating Elements */}
      {/* <motion.div
        className="absolute w-4 h-4 bg-green-400/40 rounded-full"
        style={{ top: '25%', left: '70%' }}
        animate={{
          x: [0, 40, 0],
          y: [0, -20, 0],
          opacity: [0.4, 0.8, 0.4],
        }}
        transition={{
          duration: 6,
          repeat: Infinity,
          ease: "easeInOut"
        }}
      />

      <motion.div
        className="absolute w-6 h-6 bg-red-400/30 rounded-full"
        style={{ bottom: '40%', left: '5%' }}
        animate={{
          x: [0, -20, 0],
          y: [0, 25, 0],
          opacity: [0.3, 0.7, 0.3],
        }}
        transition={{
          duration: 8,
          repeat: Infinity,
          ease: "easeInOut",
          delay: 1
        }}
      />

      <motion.div
        className="absolute w-3 h-3 bg-green-500/50 rounded-full"
        style={{ top: '50%', left: '80%' }}
        animate={{
          x: [0, -30, 0],
          y: [0, 35, 0],
          opacity: [0.5, 1, 0.5],
        }}
        transition={{
          duration: 7,
          repeat: Infinity,
          ease: "easeInOut",
          delay: 2
        }}
      /> */}

      {/* Gradient Overlay */}
      <div className="absolute inset-0 bg-gradient-to-br from-black/60 via-transparent to-black/40"></div>
    </div>
  );
};

export default BackgroundEffects;