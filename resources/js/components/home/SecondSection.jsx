import { motion } from "framer-motion";
import { useState, useEffect } from "react";
import WhyUs from "./WhyUs";
import DoYouKnow from "./DoYouKnow";
import CTASection from "./CTASection";

const SecondSection = () => {
  // const [mousePos, setMousePos] = useState({ x: 0, y: 0 });

  // useEffect(() => {
  //   const handleMouseMove = (e) => {
  //     setMousePos({
  //       x: (e.clientX / window.innerWidth) * 100,
  //       y: (e.clientY / window.innerHeight) * 100,
  //     });
  //   };

  //   window.addEventListener("mousemove", handleMouseMove);
  //   return () => window.removeEventListener("mousemove", handleMouseMove);
  // }, []);

  return (
    <motion.div
      className="min-h-screen w-full bg-black overflow-hidden relative"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      transition={{ duration: 0.8, ease: "easeOut" }}
    >

      {/* Main Content */}
      <div className="relative">
        <WhyUs />
        <DoYouKnow />
        <CTASection />
      </div>
    </motion.div>
  );
};

export default SecondSection;
