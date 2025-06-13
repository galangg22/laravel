import { motion } from 'framer-motion';

const Navbar = () => {
  return (
    <motion.nav
      initial={{ opacity: 0, y: -20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.6 }}
      className="fixed top-0 left-0 right-0 z-[100] flex justify-between items-center px-8 py-6 bg-black/20 backdrop-blur-sm"
    >
      <div className="flex items-center space-x-2">
        <div className="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
          <span className="text-black font-bold text-sm">H</span>
        </div>
        <span className="text-white font-semibold">Heart Horizon</span>
      </div>

      <div className="flex space-x-6">
        <button className="text-white hover:text-green-400 transition-colors">
          Log In
        </button>
        <button className="text-white hover:text-green-400 transition-colors">
          Sign In
        </button>
      </div>
    </motion.nav>
  );
};

export default Navbar;