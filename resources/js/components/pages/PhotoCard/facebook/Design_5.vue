<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">
      
      <!-- হেডার -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-xs text-gray-500">ডিজাইন ৫: স্পোর্টস ও ব্রেকিং নিউজ ফটো কার্ড (ফ্লোটিং রেড পিল বক্স ও গ্লোয়িং ফুটারসহ)</p>
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
            <p class="text-xs text-gray-400">আপনার পছন্দমতো টেক্সট, মূল ছবি ও লোগো যুক্ত করুন</p>
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

            <!-- হেডলাইন (লাল পিল বক্স) -->
            <div>
              <label class="text-[11px] font-bold text-red-600 uppercase">টপিক / শিরোনাম (লাল বক্সের লেখা)</label>
              <input v-model="cardData.headline" type="text"
                placeholder="যেমন: প্রেস ব্রিফিংয়ে লিটন:"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition text-sm text-gray-800" />
            </div>

            <!-- মূল বিবরণী (বক্সের ভেতরের লেখা) -->
            <div>
              <label class="text-[11px] font-bold text-gray-600 uppercase">মূল বিবরণী (বক্সের ভেতরের টেক্সট)</label>
              <textarea v-model="cardData.bodyText" rows="4"
                placeholder="খবরের বিস্তারিত বিবরণ এখানে লিখুন..."
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition text-sm text-gray-800 resize-none"></textarea>
              <p class="text-[11px] text-gray-400 mt-1">পরামর্শ: নতুন লাইনে যেতে Enter বাটন চাপুন</p>
            </div>

            <!-- ফুটার ওয়েবসাইট -->
            <div class="pt-2 border-t border-gray-100">
              <label class="text-[10px] font-bold text-gray-400 uppercase">ফুটার ওয়েবসাইট</label>
              <div class="relative mt-1">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-500 text-xs">
                  🌐
                </span>
                <input v-model="cardData.website" type="text"
                  placeholder="www.introder.com"
                  class="w-full pl-8 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 outline-none focus:ring-2 focus:ring-red-500" />
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
                class="w-[500px] h-[500px] bg-black shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] overflow-hidden flex flex-col justify-between relative select-none"
                :style="cardTransformStyle">

                <!-- মূল ছবি ব্যাকগ্রাউন্ড -->
                <img :src="cardData.mainImage" class="absolute inset-0 w-full h-[375px] object-cover object-top z-0" />

                <!-- নিচে স্মুথ ব্ল্যাক গ্রেডিয়েন্ট ফেইড -->
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/40 via-50% to-black to-75% z-10 pointer-events-none"></div>

                <!-- টপ-লেফট লোগো ব্যাজ -->
                <div class="absolute top-4 left-4 z-20">
                  <div class="bg-white/95 rounded-full px-1.5 py-3 shadow-lg border border-[#d61b23] flex items-center justify-center backdrop-blur-sm">
                    <img :src="cardData.logo" class="h-12 max-w-[60px] object-contain" />
                  </div>
                </div>

                <!-- ফ্লোটিং হেডলাইন ও ডেসক্রিপশন বক্স -->
                <div class="relative z-20 mx-auto w-[92%] mt-auto mb-3.5">
                  
                  <!-- ফ্লোটিং রেড পিল (হেডলাইন) -->
                  <div class="absolute -top-4 left-1/2 -translate-x-1/2 z-30">
                    <span class="bg-[#d61b23] text-white font-bold text-[17px] px-6 py-1.5 rounded-lg shadow-md whitespace-nowrap font-['Hind_Siliguri'] inline-block tracking-wide">
                      {{ cardData.headline }}
                    </span>
                  </div>

                  <!-- ব্ল্যাক রাউন্ডেড বক্স (মূল টেক্সট) -->
                  <div class="bg-[#0c0c0c]/95 border border-[#d61b23] rounded-2xl pt-6 pb-4 px-6 shadow-2xl text-center backdrop-blur-sm">
                    <p class="text-white text-[15px] leading-[1.6] font-medium font-['Hind_Siliguri'] whitespace-pre-line tracking-normal">
                      {{ cardData.bodyText }}
                    </p>
                  </div>

                </div>

                <!-- নিচের গ্লোয়িং রেড স্পটলাইট ফুটার বার -->
                <div class="h-[36px] bg-black flex items-center justify-center relative overflow-hidden shrink-0 z-20 border-t border-neutral-900">
                  <!-- রেড গ্লো স্পটলাইট -->
                  <div class="w-56 h-4 bg-gradient-to-r from-transparent via-[#d61b23] to-transparent opacity-90 blur-[3px] absolute pointer-events-none"></div>
                  <!-- ওয়েবসাইট টেক্সট -->
                  <span class="relative z-10 text-white font-medium text-[11px] tracking-widest font-sans">
                    {{ cardData.website }}
                  </span>
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
import cricketSample from '../../../../assets/cricket.jpg';
import defaultLogo from '../../../../assets/logo.png';

export default {
  name: 'PhotoCardDesign5',

  data() {
    return {
      scale: 1,
      isDownloading: false,
      cardData: {
        mainImage: cricketSample,
        logo: defaultLogo,
        headline: 'প্রেস ব্রিফিংয়ে লিটন:',
        bodyText: 'টাইগার দল বিড়াল হওয়ার পেছনে ইন্ট্রোডারকে\nদায়ী করলে ক্যাপ্টেন লিটন কুমার দাস।\nচাইলে দৃষ্টান্তমূলক শাস্তি।',
        website: 'www.introder.com'
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
        link.download = `photocard-design5-${Date.now()}.png`;
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
@import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap');

#news-card {
  font-family: 'Hind Siliguri', sans-serif;
  letter-spacing: normal !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>

