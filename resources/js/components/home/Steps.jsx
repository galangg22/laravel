import { motion, useInView } from "framer-motion";
import { useRef } from "react";

const Steps = () => {
  const containerRef = useRef(null);
  const isInView = useInView(containerRef, { once: false, amount: 0.1 });

  const steps = [
    {
      number: "01",
      title: "Memahami Pola Lama yang Tak Disadari",
      description:
        "Banyak dari kita mengulang pola hubungan yang sama meskipun pasangan berbeda. Modul ini akan membantumu mengenali akar dari pola itu: dari pengalaman masa kecil, cara kita melihat cinta, hingga luka yang tak selesai. Kamu akan mulai menyadari bagaimana cara kamu memandang diri sendiri bisa menjadi awal dari sesuatu yang lebih dalam.",
    },
    {
      number: "02",
      title: "Membedakan Antara Cinta, Keterikatan, dan Perihan",
      description:
        "Tidak semua rasa sayang adalah cinta. Kadang kita terjebak dalam ketergantungan emosional atau perihan dari kesepian. Di bagian ini, kamu akan belajar mengenali perbedaan halus namun penting antara cinta yang sehat dan relasi yang dibangun karena rasa takut ditinggalkan.",
    },
    {
      number: "03",
      title: "Cara Komunikasi Sehat dalam Relasi Dewasa",
      description:
        "Bicara jujur tanpa menyakiti, mendengar tanpa menghakimi. Modul ini akan membekalimu dengan prinsip komunikasi dewasa termasuk cara menyampaikan kebutuhan, batasan, dan ketidaksetujuan tanpa drama atau memperengah yang tidak layak.",
    },
    {
      number: "04",
      title: "Mengakhiri Tanpa Menyalahkan Diri Sendiri",
      description:
        "Akhir dari sebuah hubungan bukan selalu kegagalan. Tapi seringkali, yang tersisa justru rasa bersalah dan harga diri yang runtuh. Di sini kamu akan belajar cara melihat akhir relasi sebagai perpindahan, belajar melepaskan tanpa merasa hancur, dan memahami bahwa kamu tetap layak dicintai meski pernah ditinggalkan.",
    },
  ];

  return (
    <section className="bg-gradient-to-b from-black via-gray-900 to-black py-20 px-8 relative overflow-hidden">
      {/* Background Effects */}
      <div className="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(34,197,94,0.1)_0%,transparent_50%)]"></div>
      <div className="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23065f46%22%20fill-opacity%3D%220.05%22%3E%3Ccircle%20cx%3D%2230%22%20cy%3D%2230%22%20r%3D%221%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>

      <div className="max-w-4xl mx-auto relative z-10" ref={containerRef}>
        <motion.h2
          initial={{ opacity: 0, x: 100 }}
          whileInView={{ opacity: 1, x: 0 }}
          transition={{ duration: 0.8 }}
          className="text-4xl md:text-5xl font-bold text-white text-center mb-20"
        >
          Disini kamu bakal belajar apa aja?
        </motion.h2>

        {/* Desktop Timeline Container */}
        <div className="relative hidden md:block">
          {/* Animated Central Line */}
          <div className="absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gray-700">
            <motion.div
              className="w-full bg-gradient-to-b from-green-400 via-green-500 to-green-400"
              initial={{ height: 0 }}
              animate={isInView ? { height: "100%" } : { height: 0 }}
              transition={{ duration: 2, ease: "easeInOut" }}
            />
          </div>

          {/* Steps */}
          <div className="space-y-24">
            {steps.map((step, index) => {
              const isLeft = index % 2 === 0;

              return (
                <motion.div
                  key={step.number}
                  initial={{ opacity: 0, x: 100 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  transition={{ duration: 0.8, delay: index * 0.2 }}
                  className="relative"
                >
                  {/* Step Content */}
                  <div
                    className={`flex items-center ${
                      isLeft ? "justify-start" : "justify-end"
                    }`}
                  >
                    <div
                      className={`w-full max-w-md ${isLeft ? "pr-8" : "pl-8"}`}
                    >
                      {/* Step Number and Title */}
                      <div
                        className={`mb-4 ${
                          isLeft ? "text-left" : "text-right"
                        }`}
                      >
                        <div className="inline-flex items-center gap-3 mb-2">
                          <motion.div
                            initial={{ scale: 0 }}
                            whileInView={{ scale: 1 }}
                            transition={{
                              duration: 0.5,
                              delay: index * 0.2 + 0.3,
                            }}
                            className="w-10 h-10 bg-green-400 rounded-full flex items-center justify-center font-bold text-black text-lg"
                          >
                            {step.number}
                          </motion.div>
                          <h3 className="text-white font-bold text-lg leading-tight">
                            {step.title}
                          </h3>
                        </div>
                      </div>

                      {/* Content Box */}
                      <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.6, delay: index * 0.2 + 0.4 }}
                        className="bg-gray-900/80 backdrop-blur-sm rounded-2xl p-6 border border-green-400/30 relative"
                      >
                        {/* Arrow pointing to center */}
                        <div
                          className={`absolute top-4 ${
                            isLeft
                              ? "right-0 translate-x-1/2"
                              : "left-0 -translate-x-1/2"
                          } w-0 h-0`}
                        >
                          <div
                            className={`border-8 ${
                              isLeft
                                ? "border-l-green-400/30 border-r-transparent"
                                : "border-r-green-400/30 border-l-transparent"
                            } border-t-transparent border-b-transparent`}
                          ></div>
                        </div>

                        <p className="text-gray-300 text-sm leading-relaxed">
                          {step.description}
                        </p>
                      </motion.div>

                      {/* Image Placeholder */}
                      <motion.div
                        initial={{ opacity: 0, scale: 0.8 }}
                        whileInView={{ opacity: 1, scale: 1 }}
                        transition={{ duration: 0.6, delay: index * 0.2 + 0.5 }}
                        className={`mt-4 w-32 h-20 bg-gray-800 rounded-xl border border-green-400/30 overflow-hidden ${
                          isLeft ? "" : "ml-auto"
                        }`}
                      >
                        <div className="w-full h-full bg-gradient-to-br from-green-400/20 to-green-600/10 flex items-center justify-center">
                          <div className="w-8 h-8 border-2 border-green-400/50 rounded"></div>
                        </div>
                      </motion.div>
                    </div>
                  </div>

                  {/* Central Circle */}
                  <motion.div
                    initial={{ scale: 0, opacity: 0 }}
                    whileInView={{ scale: 1, opacity: 1 }}
                    transition={{ duration: 0.5, delay: index * 0.2 + 0.6 }}
                    className="absolute left-1/2 top-0 transform -translate-x-1/2 w-4 h-4 bg-green-400 rounded-full border-4 border-gray-900 z-10"
                  />
                </motion.div>
              );
            })}
          </div>
        </div>

        {/* Mobile Timeline Container */}
        <div className="relative block md:hidden">
          {/* Mobile Vertical Line connecting numbers */}
          <div className="absolute left-5 top-0 w-0.5 h-full bg-gray-700">
            <motion.div
              className="w-full bg-gradient-to-b from-green-400 via-green-500 to-green-400"
              initial={{ height: 0 }}
              animate={isInView ? { height: "100%" } : { height: 0 }}
              transition={{ duration: 2, ease: "easeInOut" }}
            />
          </div>

          {/* Mobile Steps */}
          <div className="space-y-16">
            {steps.map((step, index) => (
              <motion.div
                key={step.number}
                initial={{ opacity: 0, x: 100 }}
                whileInView={{ opacity: 1, x: 0 }}
                transition={{ duration: 0.8, delay: index * 0.2 }}
                className="relative flex items-start"
              >
                {/* Step Number */}
                <motion.div
                  initial={{ scale: 0 }}
                  whileInView={{ scale: 1 }}
                  transition={{
                    duration: 0.5,
                    delay: index * 0.2 + 0.3,
                  }}
                  className="w-10 h-10 bg-green-400 rounded-full flex items-center justify-center font-bold text-black text-lg mr-6 relative z-10 flex-shrink-0"
                >
                  {step.number}
                </motion.div>

                {/* Step Content */}
                <div className="flex-1 pb-8">
                  {/* Title */}
                  <motion.h3
                    initial={{ opacity: 0, x: 100 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    transition={{ duration: 0.6, delay: index * 0.2 + 0.4 }}
                    className="text-white font-bold text-lg leading-tight mb-4"
                  >
                    {step.title}
                  </motion.h3>

                  {/* Content Box */}
                  <motion.div
                    initial={{ opacity: 0, x: 100 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    transition={{ duration: 0.6, delay: index * 0.2 + 0.5 }}
                    className="bg-gray-900/80 backdrop-blur-sm rounded-2xl p-6 border border-green-400/30 mb-4"
                  >
                    <p className="text-gray-300 text-sm leading-relaxed">
                      {step.description}
                    </p>
                  </motion.div>

                  {/* Image Placeholder */}
                  <motion.div
                    initial={{ opacity: 0, x: 100 }}
                    whileInView={{ opacity: 1, x: 0 }}
                    transition={{ duration: 0.6, delay: index * 0.2 + 0.6 }}
                    className="w-32 h-20 bg-gray-800 rounded-xl border border-green-400/30 overflow-hidden"
                  >
                    <div className="w-full h-full bg-gradient-to-br from-green-400/20 to-green-600/10 flex items-center justify-center">
                      <div className="w-8 h-8 border-2 border-green-400/50 rounded"></div>
                    </div>
                  </motion.div>
                </div>
              </motion.div>
            ))}
          </div>
        </div>

        {/* CTA Button */}
        <motion.div
          initial={{ opacity: 0, x: 100 }}
          whileInView={{ opacity: 1, x: 0 }}
          transition={{ duration: 0.8, delay: 1 }}
          className="text-center mt-20"
        >
          <motion.button
            whileHover={{
              scale: 1.05,
              boxShadow: "0 0 30px rgba(34,197,94,0.5)",
            }}
            whileTap={{ scale: 0.95 }}
            className="bg-green-400 text-black font-bold py-4 px-12 rounded-full text-lg hover:bg-green-300 transition-all duration-300 shadow-lg"
          >
            MULAI PERJALANANMU
            <br />
            SEKARANG
          </motion.button>
        </motion.div>
      </div>
    </section>
  );
};

export default Steps;
