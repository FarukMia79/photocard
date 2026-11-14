<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">
      
      <!-- হেডার -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-xs text-gray-500">ডিজাইন ৪: প্রফেশনাল নিউজ ফটো কার্ড এডিটর (ওয়ার্ল্ড ম্যাপ ব্যাকগ্রাউন্ড ও সোশ্যাল ফুটারসহ)</p>
        </div>
        <router-link :to="{ name: 'dashboard' }" class="text-xs font-bold text-indigo-600 hover:underline flex items-center gap-1">
          ← ব্যাক টু ড্যাশবোর্ড
        </router-link>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- বাম পাশ: কন্ট্রোল প্যানেল / ফর্ম -->
        <div class="lg:col-span-5 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm space-y-6">
          <div class="border-b pb-4">
            <h2 class="text-lg font-bold text-gray-800">কার্ডের তথ্য পরিবর্তন করুন</h2>
            <p class="text-xs text-gray-400">আপনার পছন্দমতো টেক্সট, ছবি ও সোশ্যাল তথ্য লিখুন</p>
          </div>

          <div class="space-y-4">
            <!-- ফাইল আপলোড -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div class="space-y-1">
                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Main Photo</label>
                <input type="file" @change="uploadImage"
                  class="block w-full text-xs text-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer" />
              </div>
              <div class="space-y-1">
                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Logo Photo</label>
                <input type="file" @change="uploadLogo"
                  class="block w-full text-xs text-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 cursor-pointer" />
              </div>
            </div>

            <!-- হেডলাইন ইনপুট -->
            <div>
              <label class="text-[11px] font-bold text-red-600 uppercase">হেডলাইন (লাইন ১)</label>
              <input v-model="cardData.headline" type="text"
                placeholder="যেমন: আমার সোনার বাংলা"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition text-sm text-gray-800" />
            </div>

            <!-- সাব-টাইটেল ইনপুট -->
            <div>
              <label class="text-[11px] font-bold text-gray-600 uppercase">সাব-টাইটেল (লাইন ২)</label>
              <input v-model="cardData.subHeadline" type="text"
                placeholder="যেমন: আমি ইন্ট্রোডারকে ভালোবাসি"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition text-sm text-gray-800" />
            </div>

            <!-- সোশ্যাল মিডিয়া ও ওয়েবসাইট ইনপুট -->
            <div class="pt-2 border-t border-gray-100 space-y-3">
              <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">ফুটার ও সোশ্যাল তথ্য</h3>
              
              <div>
                <label class="text-[10px] font-bold text-gray-400 uppercase">ওয়েবসাইট</label>
                <div class="relative mt-1">
                  <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 text-xs">
                    ►
                  </span>
                  <input v-model="cardData.website" type="text"
                    placeholder="www.introder.com"
                    class="w-full pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 outline-none focus:ring-2 focus:ring-red-500" />
                </div>
              </div>

              <div>
                <label class="text-[10px] font-bold text-gray-400 uppercase">ফেসবুক পেজ / আইডি</label>
                <div class="relative mt-1">
                  <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-blue-600 font-bold text-xs">
                    f
                  </span>
                  <input v-model="cardData.facebook" type="text"
                    placeholder="introder - intro render"
                    class="w-full pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 outline-none focus:ring-2 focus:ring-red-500" />
                </div>
              </div>

              <div>
                <label class="text-[10px] font-bold text-gray-400 uppercase">ইউটিউব চ্যানেল</label>
                <div class="relative mt-1">
                  <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-600 text-xs">
                    ▶
                  </span>
                  <input v-model="cardData.youtube" type="text"
                    placeholder="introrender"
                    class="w-full pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 outline-none focus:ring-2 focus:ring-red-500" />
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- ডান পাশ: লাইভ প্রিভিউ -->
        <div class="lg:col-span-7 flex flex-col items-center w-full">
          <div
            class="mb-4 inline-block px-4 py-1 bg-white border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-widest shadow-sm">
            Live Preview (1:1 Ratio)
          </div>

          <!-- Preview Wrapper with responsive scale -->
          <div ref="previewWrapper" class="w-full max-w-[500px] flex justify-center items-center overflow-hidden">
            <div 
              class="transition-all duration-150"
              :style="scalerStyle">

              <!-- ফটো কার্ড (500x500px) -->
              <div ref="captureArea" id="news-card"
                class="w-[500px] h-[500px] bg-[#a9050d] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] overflow-hidden flex flex-col relative select-none"
                :style="cardTransformStyle">

                <!-- ওপরের মূল ছবি (চারপাশে লাল বর্ডারসহ) -->
                <div class="p-2.5 pb-0 h-[320px] w-full shrink-0">
                  <div class="w-full h-full overflow-hidden bg-[#111827]">
                    <img :src="cardData.mainImage" class="w-full h-full object-cover" />
                  </div>
                </div>

                <!-- মাঝের টেক্সট সেকশন (ওয়ার্ল্ড ম্যাপ ওয়াটারমার্কসহ) -->
                <div class="flex-1 bg-[#a9050d] relative flex flex-col justify-center items-center px-6 text-center overflow-hidden">
                  
                  <!-- ব্যাকগ্রাউন্ডে ডটেড ওয়ার্ল্ড ম্যাপ প্যাটার্ন -->
                  <div class="absolute inset-0 pointer-events-none opacity-20 flex items-center justify-center overflow-hidden">
                    <img :src="mapPng" class="w-full h-full object-cover scale-110" />
                  </div>

                  <!-- হেডলাইন ও সাব-টাইটেল -->
                  <div class="relative z-10 w-full flex flex-col items-center justify-center">
                    <h2 class="text-white text-[28px] font-bold leading-tight drop-shadow-[0_1px_2px_rgba(0,0,0,0.3)] font-['Noto_Serif_Bengali']">
                      {{ cardData.headline }}
                    </h2>
                    <h3 class="text-white text-[28px] font-bold leading-tight drop-shadow-[0_1px_2px_rgba(0,0,0,0.3)] font-['Noto_Serif_Bengali'] mt-1.5">
                      {{ cardData.subHeadline }}
                    </h3>
                  </div>
                </div>

                <!-- নিচের গাঢ় লাল ফুটার বার -->
                <div class="h-[42px] bg-[#720207] border-t border-[#8f0a10] px-3.5 flex items-center justify-between text-white z-20 shrink-0">
                  
                  <!-- বামে লোগো -->
                  <div class="flex items-center">
                    <img :src="cardData.logo" class="h-6 max-w-[130px] object-contain" />
                  </div>

                  <!-- ডানে ওয়েবসাইট ও সোশ্যাল আইকন -->
                  <div class="flex items-center gap-3 text-[10.5px] font-medium tracking-tight">
                    <!-- ওয়েবসাইট -->
                    <div class="flex items-center gap-1.5">
                      <span class="text-[9px] leading-none shrink-0">►</span>
                      <span class="font-sans">{{ cardData.website }}</span>
                    </div>

                    <!-- ফেসবুক -->
                    <div class="flex items-center gap-1">
                      <span class="w-3.5 h-3.5 bg-white text-[#720207] rounded-full flex items-center justify-center text-[9px] font-black font-sans shrink-0">
                        f
                      </span>
                      <span class="font-sans">{{ cardData.facebook }}</span>
                    </div>

                    <!-- ইউটিউব -->
                    <div class="flex items-center gap-1">
                      <span class="w-3.5 h-2.5 bg-white text-[#720207] rounded-[2px] flex items-center justify-center text-[7px] leading-none font-bold shrink-0">
                        ▶
                      </span>
                      <span class="font-sans">{{ cardData.youtube }}</span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

          <!-- প্রিভিউ এর নিচে ডাউনলোড বাটন -->
          <button @click="downloadImage" :disabled="isDownloading"
            class="w-full max-w-[500px] bg-indigo-600 hover:bg-indigo-700 disabled:bg-indigo-400 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 transition-all active:scale-95 mt-5 cursor-pointer">
            <svg v-if="isDownloading" class="animate-spin w-5 h-5 text-white" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            <span>{{ isDownloading ? 'ডাউনলোড হচ্ছে...' : 'Download PNG Image' }}</span>
          </button>

          <p class="mt-3 text-gray-400 text-xs italic">এটি ফেসবুকের জন্য আদর্শ ১:১ সাইজ</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import html2canvas from 'html2canvas-pro';
import defaultPhoto from '../../../../assets/paharpur.jpg';
import introderLogo from '../../../../assets/introder_logo.png';
import mapPng from '../../../../assets/world-dotted-map.png';

export default {
  name: 'PhotoCardDesign4',

  data() {
    return {
      scale: 1,
      mapPng,
      isDownloading: false,
      cardData: {
        mainImage: defaultPhoto,
        logo: introderLogo,
        headline: 'আমার সোনার বাংলা',
        subHeadline: 'আমি ইন্ট্রোডারকে ভালোবাসি',
        website: 'www.introder.com',
        facebook: 'introder - intro render',
        youtube: 'introrender'
      }
    };
  },

  computed: {
    scalerStyle() {
      return {
        width: `${500 * this.scale}px`,
        height: `${500 * this.scale}px`,
        position: 'relative',
      };
    },
    cardTransformStyle() {
      return {
        transform: `scale(${this.scale})`,
        transformOrigin: 'top left',
        position: 'absolute',
        top: '0',
        left: '0',
      };
    }
  },

  mounted() {
    this.updateScale();
    window.addEventListener('resize', this.updateScale);
    if (window.ResizeObserver && this.$refs.previewWrapper) {
      this.resizeObserver = new ResizeObserver(() => {
        this.updateScale();
      });
      this.resizeObserver.observe(this.$refs.previewWrapper);
    }
  },

  beforeUnmount() {
    window.removeEventListener('resize', this.updateScale);
    if (this.resizeObserver) {
      this.resizeObserver.disconnect();
    }
  },

  methods: {
    updateScale() {
      if (!this.$refs.previewWrapper) return;
      const availableWidth = this.$refs.previewWrapper.clientWidth;
      if (availableWidth > 0 && availableWidth < 500) {
        const newScale = Math.min(1, Math.max(0.3, availableWidth / 500));
        if (Math.abs(this.scale - newScale) > 0.005) {
          this.scale = newScale;
        }
      } else if (this.scale !== 1) {
        this.scale = 1;
      }
    },

    uploadImage(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (uploadEvent) => {
          this.cardData.mainImage = uploadEvent.target.result;
        };
        reader.readAsDataURL(file);
      }
    },

    uploadLogo(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (uploadEvent) => {
          this.cardData.logo = uploadEvent.target.result;
        };
        reader.readAsDataURL(file);
      }
    },

    async downloadImage() {
      if (this.isDownloading) return;
      this.isDownloading = true;
      const area = this.$refs.captureArea;
      if (!area) {
        this.isDownloading = false;
        return;
      }

      const prevTransform = area.style.transform;
      const prevPosition = area.style.position;
      const prevOrigin = area.style.transformOrigin;

      try {
        if (document.fonts && document.fonts.ready) {
          await document.fonts.ready;
        }

        area.style.transform = 'none';
        area.style.position = 'relative';

        const canvas = await html2canvas(area, { 
          scale: 2, 
          useCORS: true,
          allowTaint: true,
          logging: false,
          letterRendering: false,
          onclone: (clonedDoc) => {
            const clonedArea = clonedDoc.getElementById('news-card');
            if (clonedArea) {
              clonedArea.style.transform = 'none';
              clonedArea.style.position = 'relative';
              clonedArea.style.letterSpacing = 'normal';
            }
          }
        });
        
        const link = document.createElement('a');
        link.download = `photocard-design4-${Date.now()}.png`;
        link.href = canvas.toDataURL('image/png');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      } catch (error) {
        console.error("Download failed:", error);
        alert("ডাউনলোড করতে সমস্যা হয়েছে: " + error.message);
      } finally {
        area.style.transform = prevTransform;
        area.style.position = prevPosition;
        area.style.transformOrigin = prevOrigin;
        this.isDownloading = false;
      }
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Noto+Serif+Bengali:wght@400;700;900&display=swap');

#news-card {
  font-family: 'Hind Siliguri', sans-serif;
  letter-spacing: normal !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>

