@props(['produk', 'produkLainnya' => [], 'kontak' => null])

<section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-lime-500 rounded-full blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
  </div>
  
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Article-style Layout -->
    <div class="max-w-4xl mx-auto space-y-12">
      
      <!-- Header Section -->
      <div class="text-center space-y-6">
        <div class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-medium">
          <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          Layanan Profesional
        </div>
        
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
          {{ $produk->title }}
        </h1>
        
        <div class="flex items-center justify-center space-x-2">
          <div class="h-1 w-24 bg-gradient-to-r from-green-500 to-lime-400 rounded-full"></div>
          <div class="h-1 w-8 bg-gradient-to-r from-lime-400 to-yellow-400 rounded-full"></div>
          <div class="h-1 w-4 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full"></div>
        </div>
      </div>
      
      <!-- Featured Image -->
      <div class="relative group">
        <div class="absolute -inset-4 bg-gradient-to-r from-green-500 to-lime-400 rounded-2xl blur opacity-20 group-hover:opacity-30 transition duration-300"></div>
        <div class="relative bg-white rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
          <div class="aspect-w-16 aspect-h-10 bg-gray-100">
            <img src="{{ asset('storage/' . $produk->image) }}" 
                 alt="{{ $produk->title }}" 
                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
          </div>
          <!-- Overlay gradient -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
        </div>
      </div>
      
      <!-- Content Section -->
      <div class="space-y-8">
        <!-- Description Content -->
        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-gray-100 shadow-lg">
          <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
            <div class="ck-content">
              {!! $produk->description !!}
            </div>
          </div>
        </div>
        
        <!-- Key Features Section - Card Layout -->
        <div class="space-y-6">
          <div class="text-center">
            <div class="flex items-center justify-center space-x-2 mb-6">
              <div class="h-1 w-24 bg-gradient-to-r from-green-500 to-lime-400 rounded-full"></div>
              <div class="h-1 w-8 bg-gradient-to-r from-lime-400 to-yellow-400 rounded-full"></div>
              <div class="h-1 w-4 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full"></div>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Keunggulan Layanan</h3>
            <p class="text-gray-600">Mengapa memilih layanan kami?</p>
          </div>
          
          <div class="keunggulan-cards-container" id="keunggulan-features">
            <!-- Cards will be dynamically generated -->
          </div>
        </div>
        
        <!-- CTA Section -->
        <div class="text-center pt-8">
          <a href="https://wa.me/{{ $kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890' }}?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*{{ urlencode($produk->title) }}*%20yang%20ada%20di%20website%20Anda."
             target="_blank" 
             class="group relative inline-flex items-center">
            
            <!-- Button Background -->
            <div class="absolute -inset-2 bg-gradient-to-r from-green-600 to-green-500 rounded-xl blur opacity-60 group-hover:opacity-100 transition duration-300"></div>
            
            <!-- Button Content -->
            <button class="relative px-8 py-4 bg-gradient-to-r from-green-600 to-green-500 text-white font-bold rounded-xl shadow-xl hover:shadow-green-500/30 transform hover:-translate-y-1 transition duration-300 flex items-center space-x-3">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
              </svg>
              <span>Hubungi Kami via WhatsApp</span>
              <svg class="w-4 h-4 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </button>
          </a>
          
          <!-- Additional Info -->
          <p class="text-sm text-gray-600 mt-4 flex items-center justify-center">
            <svg class="w-4 h-4 mr-1 text-green-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            Respons cepat dalam 5 menit
          </p>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- Additional CSS for CKEditor Content -->
<style>
.ck-content {
  line-height: 1.8;
}

.ck-content p {
  margin-bottom: 1rem;
  color: #374151;
}

.ck-content h1, .ck-content h2, .ck-content h3, .ck-content h4, .ck-content h5, .ck-content h6 {
  font-weight: 600;
  margin-top: 1.5rem;
  margin-bottom: 1rem;
  color: #1f2937;
}

.ck-content ul, .ck-content ol {
  margin-left: 1.5rem;
  margin-bottom: 1rem;
}

.ck-content li {
  margin-bottom: 0.5rem;
  position: relative;
}

.ck-content ul li::before {
  content: "•";
  color: #10b981;
  font-weight: bold;
  position: absolute;
  left: -1rem;
}

.ck-content strong {
  color: #1f2937;
  font-weight: 600;
}

.ck-content blockquote {
  border-left: 4px solid #10b981;
  padding-left: 1rem;
  margin: 1rem 0;
  font-style: italic;
  color: #6b7280;
}

.ck-content a {
  color: #10b981;
  text-decoration: underline;
}

.ck-content a:hover {
  color: #059669;
}

.ck-content table {
  width: 100%;
  border-collapse: collapse;
  margin: 1rem 0;
}

.ck-content th, .ck-content td {
  border: 1px solid #e5e7eb;
  padding: 0.75rem;
  text-align: left;
}

.ck-content th {
  background-color: #f3f4f6;
  font-weight: 600;
}

.ck-content img {
  max-width: 100%;
  height: auto;
  border-radius: 0.5rem;
  margin: 1rem 0;
}

.ck-content .image {
  text-align: center;
  margin: 1.5rem 0;
}

.ck-content .image img {
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.ck-content .image figcaption {
  color: #6b7280;
  font-size: 0.875rem;
  margin-top: 0.5rem;
  font-style: italic;
}

/* Card-based Keunggulan Styling */
.keunggulan-cards-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}

.keunggulan-card {
  background: white;
  border-radius: 1rem;
  padding: 1.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  border: 1px solid #e5e7eb;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.keunggulan-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  border-color: #10b981;
}

.keunggulan-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #10b981, #34d399);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.keunggulan-card:hover::before {
  transform: scaleX(1);
}

.keunggulan-card-icon {
  width: 48px;
  height: 48px;
  background: linear-gradient(135deg, #10b981, #34d399);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 1rem;
  transition: transform 0.3s ease;
}

.keunggulan-card:hover .keunggulan-card-icon {
  transform: scale(1.1);
}

.keunggulan-card-icon svg {
  width: 24px;
  height: 24px;
  color: white;
}

.keunggulan-card-title {
  font-size: 1.125rem;
  font-weight: 600;
  color: #1f2937;
  margin-bottom: 0.5rem;
  line-height: 1.4;
}

.keunggulan-card-description {
  font-size: 0.875rem;
  color: #6b7280;
  line-height: 1.6;
}

/* Default icons for different card types */
.keunggulan-card-icon.professional {
  background: linear-gradient(135deg, #3b82f6, #60a5fa);
}

.keunggulan-card-icon.quality {
  background: linear-gradient(135deg, #f59e0b, #fbbf24);
}

.keunggulan-card-icon.price {
  background: linear-gradient(135deg, #10b981, #34d399);
}

.keunggulan-card-icon.speed {
  background: linear-gradient(135deg, #ef4444, #f87171);
}

.keunggulan-card-icon.support {
  background: linear-gradient(135deg, #8b5cf6, #a78bfa);
}

.keunggulan-card-icon.security {
  background: linear-gradient(135deg, #06b6d4, #38bdf8);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .ck-content {
    font-size: 0.875rem;
  }
  
  .ck-content h1, .ck-content h2, .ck-content h3 {
    font-size: 1.25rem;
  }
  
  .keunggulan-cards-container {
    grid-template-columns: 1fr;
    gap: 1rem;
  }
  
  .keunggulan-card {
    padding: 1.25rem;
  }
}

@media (max-width: 640px) {
  .keunggulan-cards-container {
    margin-top: 1.5rem;
  }
  
  .keunggulan-card-icon {
    width: 40px;
    height: 40px;
  }
  
  .keunggulan-card-icon svg {
    width: 20px;
    height: 20px;
  }
}
</style>

<!-- JavaScript to Extract Features and Create Cards -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const ckContent = document.querySelector('.ck-content');
  const keunggulanContainer = document.getElementById('keunggulan-features');
  
  // Icon mapping for different types of features
  const iconMap = {
    'profesional': { icon: 'user-tie', class: 'professional' },
    'kualitas': { icon: 'award', class: 'quality' },
    'harga': { icon: 'dollar-sign', class: 'price' },
    'cepat': { icon: 'zap', class: 'speed' },
    'respons': { icon: 'zap', class: 'speed' },
    'support': { icon: 'headphones', class: 'support' },
    'dukungan': { icon: 'headphones', class: 'support' },
    'keamanan': { icon: 'shield', class: 'security' },
    'aman': { icon: 'shield', class: 'security' },
    'terpercaya': { icon: 'shield', class: 'security' },
    'berpengalaman': { icon: 'star', class: 'quality' },
    'pengalaman': { icon: 'star', class: 'quality' }
  };
  
  // Default icons
  const defaultIcons = [
    { icon: 'check-circle', class: 'professional' },
    { icon: 'star', class: 'quality' },
    { icon: 'zap', class: 'speed' },
    { icon: 'shield', class: 'security' },
    { icon: 'award', class: 'quality' },
    { icon: 'headphones', class: 'support' }
  ];
  
  function getIconSVG(iconName) {
    const icons = {
      'check-circle': '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
      'star': '<path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>',
      'zap': '<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>',
      'shield': '<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>',
      'award': '<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>',
      'headphones': '<path d="M20 12v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a8 8 0 1116 0z"></path><path d="M8 18v-4a4 4 0 118 0v4"></path>',
      'user-tie': '<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>',
      'dollar-sign': '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"></path>'
    };
    
    return icons[iconName] || icons['check-circle'];
  }
  
  function getIconClass(text) {
    const lowerText = text.toLowerCase();
    for (const [key, value] of Object.entries(iconMap)) {
      if (lowerText.includes(key)) {
        return value;
      }
    }
    return defaultIcons[Math.floor(Math.random() * defaultIcons.length)];
  }
  
  function createFeatureCard(text, index) {
    const iconInfo = getIconClass(text);
    const iconSVG = getIconSVG(iconInfo.icon);
    
    return `
      <div class="keunggulan-card">
        <div class="keunggulan-card-icon ${iconInfo.class}">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            ${iconSVG}
          </svg>
        </div>
        <h4 class="keunggulan-card-title">${text}</h4>
        <p class="keunggulan-card-description">Layanan berkualitas tinggi dengan standar profesional terbaik</p>
      </div>
    `;
  }
  
  if (ckContent && keunggulanContainer) {
    // Extract list items from CKEditor content
    const listItems = ckContent.querySelectorAll('ul li, ol li');
    
    if (listItems.length > 0) {
      // Clear container first
      keunggulanContainer.innerHTML = '';
      
      // Process each list item
      listItems.forEach(function(item, index) {
        // Skip if too many items (max 6 for better layout)
        if (index >= 6) return;
        
        const text = item.textContent.trim();
        if (text.length > 0) {
          keunggulanContainer.innerHTML += createFeatureCard(text, index);
        }
      });
    } else {
      // If no list items found, try to extract from strong/bold text
      const strongElements = ckContent.querySelectorAll('strong, b');
      
      if (strongElements.length > 0) {
        keunggulanContainer.innerHTML = '';
        
        strongElements.forEach(function(element, index) {
          if (index >= 6) return; // Max 6 items
          
          const text = element.textContent.trim();
          if (text.length > 0 && text.length < 100) { // Reasonable length for features
            keunggulanContainer.innerHTML += createFeatureCard(text, index);
          }
        });
      } else {
        // Fallback to default features if no extractable content
        const defaultFeatures = [
          'Pelayanan Profesional',
          'Kualitas Terjamin',
          'Harga Kompetitif',
          'Respons Cepat',
          'Dukungan 24/7',
          'Keamanan Terjamin'
        ];
        
        keunggulanContainer.innerHTML = '';
        
        defaultFeatures.forEach(function(feature, index) {
          keunggulanContainer.innerHTML += createFeatureCard(feature, index);
        });
      }
    }
  }
});
</script>