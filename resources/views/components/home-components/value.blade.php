<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Our Values</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    .gradient-bg {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #334155 50%, #475569 75%, #64748b 100%);
    }

    .glass-effect {
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .fade-in-up {
      animation: fadeInUp 0.8s ease-out both;
    }

    .fade-in-left {
      animation: fadeInLeft 1s ease-out both;
    }

    .fade-in-right {
      animation: fadeInRight 1s ease-out both;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(40px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .value-card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      will-change: transform, opacity;
    }

    .value-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
      transition: left 0.5s;
    }

    .value-card:hover::before {
      left: 100%;
    }

    .value-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.25);
    }

    .number-badge {
      background: linear-gradient(135deg, #10b981, #059669);
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .section-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent, #10b981, transparent);
      margin: 3rem 0;
    }

    .floating-shapes {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      pointer-events: none;
    }

    .shape {
      position: absolute;
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
      will-change: transform;
    }

    .shape:nth-child(1) {
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .shape:nth-child(2) {
      top: 20%;
      right: 10%;
      animation-delay: 2s;
    }

    .shape:nth-child(3) {
      bottom: 20%;
      left: 15%;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    .animate-invisible {
      opacity: 0;
    }
  </style>
</head>

<body class="gradient-bg min-h-screen relative">
  <!-- Floating Background Shapes -->
  <div class="floating-shapes">
    <div class="shape w-32 h-32 bg-emerald-500 rounded-full"></div>
    <div class="shape w-24 h-24 bg-teal-400 rounded-full"></div>
    <div class="shape w-20 h-20 bg-green-400 rounded-full"></div>
  </div>

  <!-- Main Content Section -->
  <div class="pb-20 px-6">
    <div class="w-full">
      <div class="glass-effect rounded-3xl shadow-lg overflow-hidden">
        <div class="flex flex-col lg:flex-row min-h-[600px]">

          <!-- Left Visual Section -->
          <div class="lg:w-2/5 bg-gradient-to-br from-emerald-50 to-teal-50 flex items-center justify-center p-8 lg:p-12 animate-invisible" data-animate="fade-in-left">
            <div class="relative">
              <div class="w-80 h-80 relative">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-full shadow-2xl flex items-center justify-center">
                  <span class="text-white text-6xl font-bold">value</span>
                </div>

                <!-- Orbiting Elements -->
                <div class="absolute inset-0 animate-spin" style="animation-duration: 20s;">
                  <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-emerald-400 rounded-full shadow-lg"></div>
                  <div class="absolute top-1/2 -right-4 transform -translate-y-1/2 w-6 h-6 bg-teal-400 rounded-full shadow-lg"></div>
                  <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-green-400 rounded-full shadow-lg"></div>
                  <div class="absolute top-1/2 -left-4 transform -translate-y-1/2 w-7 h-7 bg-emerald-300 rounded-full shadow-lg"></div>
                </div>

                <div class="absolute -top-8 -left-8 w-16 h-16 bg-emerald-200 rounded-full opacity-60"></div>
                <div class="absolute -bottom-8 -right-8 w-20 h-20 bg-teal-200 rounded-full opacity-60"></div>
              </div>
            </div>
          </div>

          <!-- Right Content Section -->
          <div class="lg:w-3/5 p-8 lg:p-12 bg-white animate-invisible" data-animate="fade-in-right">
            <div class="space-y-8">
              <div class="mb-12">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">What We Stand For</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                  These core values form the foundation of our organization, guiding our actions and
                  defining our commitment to excellence.
                </p>
              </div>

              <!-- Value Items -->
              <div class="grid gap-6">
                <!-- Value Card -->
                <div class="value-card glass-effect p-6 rounded-2xl shadow-md animate-invisible" data-animate="fade-in-up">
                  <div class="flex items-start space-x-4">
                    <div class="number-badge w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-bold text-lg">01</span>
                    </div>
                    <div class="flex-1">
                      <h3 class="text-2xl font-bold text-gray-900 mb-3">Efficiency</h3>
                      <p class="text-gray-600 leading-relaxed">
                        We streamline processes and optimize resources to deliver exceptional
                        value faster and more cost-effectively.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="value-card glass-effect p-6 rounded-2xl shadow-md animate-invisible" data-animate="fade-in-up">
                  <div class="flex items-start space-x-4">
                    <div class="number-badge w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-bold text-lg">02</span>
                    </div>
                    <div class="flex-1">
                      <h3 class="text-2xl font-bold text-gray-900 mb-3">Quality</h3>
                      <p class="text-gray-600 leading-relaxed">
                        We maintain the highest standards in everything we deliver, building trust through consistent quality.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="value-card glass-effect p-6 rounded-2xl shadow-md animate-invisible" data-animate="fade-in-up">
                  <div class="flex items-start space-x-4">
                    <div class="number-badge w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-bold text-lg">03</span>
                    </div>
                    <div class="flex-1">
                      <h3 class="text-2xl font-bold text-gray-900 mb-3">Customer Focus</h3>
                      <p class="text-gray-600 leading-relaxed">
                        We listen, understand, and exceed expectations to create meaningful, lasting relationships.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="value-card glass-effect p-6 rounded-2xl shadow-md animate-invisible" data-animate="fade-in-up">
                  <div class="flex items-start space-x-4">
                    <div class="number-badge w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                      <span class="text-white font-bold text-lg">04</span>
                    </div>
                    <div class="flex-1">
                      <h3 class="text-2xl font-bold text-gray-900 mb-3">Innovation</h3>
                      <p class="text-gray-600 leading-relaxed">
                        We embrace change and continuously seek creative solutions to stay ahead.
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- End Right Section -->
        </div>
      </div>
    </div>
  </div>

  <!-- Lazy Animation Script -->
  <script>
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const animation = el.dataset.animate;
          el.classList.remove('animate-invisible');
          if (animation) el.classList.add(animation);
          observer.unobserve(el);
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));
  </script>
</body>

</html>
