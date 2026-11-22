<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">

      <!-- header -->
      <div class="mb-8 border-b pb-4 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-sm text-gray-500">প্রফেশনাল এডিটর ও ডিজাইন ২ (পিওর কোড)</p>
        </div>
        <router-link :to="{ name: 'dashboard' }" class="text-xs font-bold text-[#C12684] hover:text-[#2B1B59] hover:underline flex items-center gap-1">
          ← ব্যাক টু ড্যাশবোর্ড
        </router-link>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <!-- left side: card editor -->
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
          <div class="flex items-center gap-2 mb-6">
            <span class="w-1.5 h-6 bg-red-600 rounded-full"></span>
            <h2 class="text-lg font-bold">কার্ডের তথ্য পরিবর্তন করুন</h2>
          </div>

          <div class="space-y-5">
            <!-- file upload -->
            <div class="space-y-1">
              <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Main Photo</label>
              <input type="file" @change="uploadImage"
                class="block w-full text-xs text-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer" />
            </div>

            <!-- inputs section -->
            <div class="space-y-4">
              <div>
                <label class="block text-[11px] font-bold text-red-500 uppercase">হেডলাইন (সাদা লেখা - লাইন ১)</label>
                <input v-model="cardData.headline" type="text" maxlength="120"
                  @input="onHeadlineInput"
                  :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isHeadlineFull}"
                  placeholder="যেমন: তুমি কে আমি কে, ইন্ট্রোডার ইন্ট্রোডার"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition text-sm text-gray-800" />
                <p v-if="isHeadlineFull" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                  ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
                </p>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-yellow-600 uppercase tracking-wider">সাব-টাইটেল (হলুদ লেখা - লাইন ২)</label>
                <input v-model="cardData.subHeadline" type="text" maxlength="120"
                  @input="onSubHeadlineInput"
                  :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isSubHeadlineFull}"
                  placeholder="যেমন: নিয়েছি তো ইন্ট্রো, আরও নেব আউটট্রো"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 outline-none transition text-sm text-gray-800" />
                <p v-if="isSubHeadlineFull" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                  ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
                </p>
              </div>

              <div class="grid grid-cols-2 gap-3">
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">ইউটিউব</label>
                  <input v-model="cardData.youtube" type="text"
                    placeholder="testo life tv"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-800" />
                </div>
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">ফেসবুক</label>
                  <input v-model="cardData.facebook" type="text"
                    placeholder="testo life tv"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-800" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- right side: live preview -->
        <div class="flex flex-col items-center w-full">
          <div
            class="mb-4 inline-block px-4 py-1 bg-white border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-widest shadow-sm">
            Live Preview (1:1 Ratio)
          </div>

          <!-- Preview Wrapper with responsive scale -->
          <div ref="previewWrapper" class="w-full max-w-[500px] flex justify-center items-center overflow-hidden">
            <div 
              class="transition-all duration-150"
              :style="scalerStyle">

              <div ref="captureArea" id="news-card"
                class="w-[500px] h-[500px] bg-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] overflow-hidden flex flex-col"
                :style="cardTransformStyle">
                
                <!-- top logo and date -->
                <div class="bg-white px-6 py-2 flex justify-between items-center h-[70px] z-20">
                  <img :src="cardData.logo" class="h-14 max-w-[60px] object-contain" />
                  <span class="text-gray-800 text-lg font-bold">{{ cardData.date }}</span>
                </div>

                <!-- tilt image frame -->
                <div class="relative h-[230px] w-full flex justify-center items-center bg-white z-30">
                   <!-- red shadow frame -->
                   <div class="absolute w-[440px] h-[240px] card-background-gradient rounded-[35px] rotate-[-4.5deg] shadow-lg translate-x-1 translate-y-1"></div>
                   <!-- white main frame -->
                   <div class="relative w-[410px] h-[245px] bg-white rounded-[32px] rotate-[3deg] overflow-hidden shadow-inner">
                      <!-- image rotation fixed to show straight -->
                      <img :src="cardData.mainImage" class="w-full h-full object-cover rotate-[3deg] scale-110" />
                   </div>
                </div>

                <!-- gradient bottom section -->
                <div class="flex-1 background-gradient relative flex flex-col items-center justify-start pt-8 px-8 text-center">
                  
                  <!-- headline and sub-headline -->
                  <h2 class="text-white font-bold leading-tight mb-1 drop-shadow-md whitespace-nowrap overflow-hidden text-ellipsis w-full max-w-full z-20"
                      :style="{ fontSize: headlineFontSize + 'px' }">
                    {{ cardData.headline }}
                  </h2>
                  <h3 class="text-yellow-400 font-black leading-tight drop-shadow-md whitespace-nowrap overflow-hidden text-ellipsis w-full max-w-full z-20"
                      :style="{ fontSize: subHeadlineFontSize + 'px' }">
                    {{ cardData.subHeadline }}
                  </h3>

                  <!-- comment button and dots -->
                  <div class="mt-4 flex items-center gap-3">
                    <div class="flex gap-1">
                      <div class="w-1.5 h-1.5 bg-red-800 rounded-full"></div>
                      <div class="w-2.5 h-2.5 bg-red-800 rounded-full"></div>
                      <div class="w-3.5 h-3.5 bg-red-800 rounded-full"></div>
                    </div>
                    <div class="bg-gradient-to-r from-red-500 to-red-700 text-white px-6 py-1 rounded-full text-xs font-bold shadow-md border border-red-400 uppercase">
                      বিস্তারিত কমেন্টে...
                    </div>
                    <div class="flex gap-1">
                      <div class="w-3.5 h-3.5 bg-red-800 rounded-full"></div>
                      <div class="w-2.5 h-2.5 bg-red-800 rounded-full"></div>
                      <div class="w-1.5 h-1.5 bg-red-800 rounded-full"></div>
                    </div>
                  </div>

                  <!-- footer -->
                  <div class="absolute bottom-0 w-full h-[32px] bg-[#AC2C31] flex justify-between items-center px-6 text-[10px] text-white/90">
                    
                    <div class="flex items-center gap-2 uppercase font-bold tracking-tighter">
                       <svg class="w-4 h-3 shrink-0" width="16" height="12" viewBox="0 0 24 24" fill="none">
                         <path fill="#FF0000" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                         <path fill="#FFFFFF" d="M9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                       </svg>
                       <span>{{ cardData.youtube || 'testo life tv' }}</span>
                    </div>
                    <div class="flex items-center gap-2 uppercase font-bold tracking-tighter">
                       <svg class="w-3.5 h-3.5 shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none">
                         <path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                         <path fill="#FFFFFF" d="M16.671 15.469l.532-3.47h-3.328v-2.25c0-.949.465-1.874 1.956-1.874h1.513V4.922s-1.374-.235-2.686-.235c-2.741 0-4.533 1.662-4.533 4.669v2.643H7.078v3.47h3.047v8.385a12.18 12.18 0 003.75 0v-8.385h2.796z"/>
                       </svg>
                       <span>{{ cardData.facebook || 'testo life tv' }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- প্রিভিউ এর নিচেও ডাউনলোড বাটন -->
          <button @click="downloadImage"
            class="w-full max-w-[500px] bg-gradient-to-r from-[#2B1B59] to-[#C12684] hover:opacity-95 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-pink-200 flex items-center justify-center gap-2 transition-all active:scale-95 mt-5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Download Design 2 Image
          </button>

          <p class="mt-3 text-gray-400 text-xs italic">ডিজাইন ২ - ১:১ সাইজ ফেসবুকের জন্য</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import html2canvas from 'html2canvas-pro';
import defaultLogo from '../../../../assets/logo.png';
import { calculateAutoFontSize, fitTextAtMinSize, isTextFullAtMinSize } from '../../../../utils/textLimiter.js';

function getTodayBanglaDate() {
  const today = new Date();
  const day = today.getDate();
  const monthIndex = today.getMonth();
  const year = today.getFullYear();
  const banglaDigits = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
  const banglaMonths = [
    'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল',
    'মে', 'জুন', 'জুলাই', 'আগস্ট',
    'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
  ];
  const toBn = (num) => String(num).padStart(2, '0').split('').map(d => banglaDigits[d] || d).join('');
  const toBnYear = (num) => String(num).split('').map(d => banglaDigits[d] || d).join('');
  return `${toBn(day)} ${banglaMonths[monthIndex]} ${toBnYear(year)}`;
}

export default {
  name: 'Design2Maker',
  
  data() {
    return {
      scale: 1,
      cardData: {
        mainImage: 'https://via.placeholder.com/1080x600',
        logo: defaultLogo,
        headline: 'তুমি কে আমি কে, ইন্ট্রোডার ইন্ট্রোডার',
        subHeadline: 'নিয়েছি তো ইন্ট্রো, আরও নেব আউটট্রো',
        youtube: 'testo life tv',
        facebook: 'testo life tv',
        date: getTodayBanglaDate()
      }
    };
  },

  computed: {
    headlineFontSize() {
      return calculateAutoFontSize(
        this.cardData.headline,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        28,
        436,
        16
      );
    },
    subHeadlineFontSize() {
      return calculateAutoFontSize(
        this.cardData.subHeadline,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        28,
        436,
        16
      );
    },
    isHeadlineFull() {
      return isTextFullAtMinSize(
        this.cardData.headline,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        16,
        436
      );
    },
    isSubHeadlineFull() {
      return isTextFullAtMinSize(
        this.cardData.subHeadline,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        16,
        436
      );
    },
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
    this.cardData.date = getTodayBanglaDate();
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
    onHeadlineInput() {
      this.cardData.headline = fitTextAtMinSize(
        this.cardData.headline,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        16,
        436
      );
    },

    onSubHeadlineInput() {
      this.cardData.subHeadline = fitTextAtMinSize(
        this.cardData.subHeadline,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        16,
        436
      );
    },

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
      if (file) this.cardData.mainImage = URL.createObjectURL(file);
    },

    uploadLogo(e) {
      const file = e.target.files[0];
      if (file) this.cardData.logo = URL.createObjectURL(file);
    },

    async downloadImage() {
      const area = this.$refs.captureArea;
      if (!area) return;

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
        link.download = `news-card-design2-${Date.now()}.png`;
        link.href = canvas.toDataURL('image/png');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      } catch (error) {
        console.error("Download failed:", error);
      } finally {
        area.style.transform = prevTransform;
        area.style.position = prevPosition;
        area.style.transformOrigin = prevOrigin;
      }
    }
  }
};
</script>

<style scoped>
#news-card {
  font-family: 'Hind Siliguri', sans-serif;
  letter-spacing: normal !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.background-gradient {
  background: #74353C;
  background: linear-gradient(360deg, rgba(116, 53, 60, 1) 58%, rgba(255, 255, 255, 1) 100%);
}

.card-background-gradient {
  background: #74353C;
  background: linear-gradient(360deg, rgba(116, 53, 60, 1) 36%, rgba(237, 50, 51, 1) 100%);
}
</style>