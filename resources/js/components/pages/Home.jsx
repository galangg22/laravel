

import { useEffect, useState } from "react";
import BackgroundEffects from "../home/BackgroundEffects";
import Navbar from "../home/Navbar";
import Hero from "../home/Hero";
import Features from "../home/Features";
import Steps from "../home/Steps";
import SecondSection from "../home/SecondSection";
import TypeOfPeople from "../home/TypeOfPeople";
import Pricing from "../home/Pricing";
import FAQ from "../home/FAQ";
import Footer from "../home/Footer";

export default function Home() {
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    const checkMobile = () => {
      setIsMobile(window.innerWidth < 768);
    };

    checkMobile();
    window.addEventListener("resize", checkMobile);

    return () => window.removeEventListener("resize", checkMobile);
  }, []);

  return (
    <div className="min-h-screen  relative">
      {!isMobile && <BackgroundEffects />}
      <div className="relative z-10">
        <Navbar />
        <Hero />
        <Features />
        <Steps />
      </div>
      <div className="relative ">
        <SecondSection />
      </div>
      <div className="relative">
        <TypeOfPeople />
        <Pricing />
        <FAQ />
        <Footer />
      </div>
    </div>
  );
}
