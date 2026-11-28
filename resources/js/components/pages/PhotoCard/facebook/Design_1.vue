<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">

      <!-- হেডার -->
      <div class="mb-8 border-b pb-4 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-sm text-gray-500">ফেসবুকের জন্য প্রফেশনাল নিউজ কার্ড তৈরি করুন</p>
        </div>
        <router-link :to="{ name: 'dashboard' }" class="text-xs font-bold text-[#C12684] hover:text-[#2B1B59] hover:underline flex items-center gap-1">
          ← ব্যাক টু ড্যাশবোর্ড
        </router-link>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <!-- বাম পাশ: কার্ড এডিটর -->
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 p-8 border border-gray-100">
          <div class="flex items-center gap-2 mb-6">
            <span class="w-1.5 h-6 bg-red-600 rounded-full"></span>
            <h2 class="text-lg font-bold">কার্ডের তথ্য পরিবর্তন করুন</h2>
          </div>

          <div class="space-y-5">
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

            <!-- ইনপুট ফিল্ডস -->
            <div class="space-y-4">
              <div>
                <label class="block text-[11px] font-bold text-red-500 uppercase">হেডলাইন (লাল লেখা - লাইন ১)</label>
                <input v-model="cardData.redText" type="text" maxlength="120"
                  @input="onRedTextInput"
                  :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isRedTextFull}"
                  placeholder="যেমন: শিরায় শিরায় রক্ত"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition text-sm text-gray-800" />
                <p v-if="isRedTextFull" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                  ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
                </p>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-gray-600 uppercase">সাব-টাইটেল (কালো লেখা - লাইন ২)</label>
                <input v-model="cardData.blackText" type="text" maxlength="120"
                  @input="onBlackTextInput"
                  :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isBlackTextFull}"
                  placeholder="যেমন: আমি ইন্ট্রোডারের ভক্ত"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition text-sm text-gray-800" />
                <p v-if="isBlackTextFull" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                  ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- ডান পাশ: লাইভ প্রিভিউ -->
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
              
              <!-- ডাউনলোড করার জন্য ref="captureArea" ব্যবহার করা হয়েছে -->
              <div ref="captureArea" id="news-card"
                class="w-[500px] h-[500px] bg-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] overflow-hidden flex flex-col"
                :style="cardTransformStyle">
                
                <div class="w-full bg-[#A01616] p-2.5">
                  <div class="w-full h-[270px] relative overflow-hidden rounded-2xl">
                    <img :src="cardData.mainImage" class="w-full h-full object-cover object-center" />
                  </div>
                </div>

                <div class="absolute top-[230px] left-1/2 -translate-x-1/2 z-10">
                  <div class="w-[100px] h-[100px] bg-white rounded-full p-1.5 border-[4px] border-[#a01616] shadow-xl">
                    <img :src="cardData.logo" class="w-full h-full object-contain rounded-full" />
                  </div>
                </div>

                <div class="flex-1 bg-white pt-12 px-6 text-center flex flex-col justify-start items-center overflow-hidden">
                  <h2 class="text-[#e21a1a] font-bold leading-tight tracking-normal whitespace-nowrap w-full max-w-full z-20"
                      :style="{ fontSize: redTextFontSize + 'px' }">
                    {{ cardData.redText }}
                  </h2>
                  <h3 class="text-gray-900 font-black leading-tight mt-1 tracking-normal whitespace-nowrap w-full max-w-full z-20"
                      :style="{ fontSize: blackTextFontSize + 'px' }">
                    {{ cardData.blackText }}
                  </h3>
                </div>

                <div class="bg-[#a01616] text-white px-5 py-2.5 flex justify-between items-center">
                  <span class="text-[14px] font-medium tracking-wide">{{ cardData.footerLeft }}</span>
                  <span class="text-[17px] font-bold tracking-wide">{{ cardData.footerRight }}</span>
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
            Download PNG Image
          </button>

          <p class="mt-3 text-gray-400 text-xs italic">এটি ফেসবুকের জন্য আদর্শ ১:১ সাইজ</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import html2canvas from 'html2canvas-pro';
import defaultLogo from '../../../../assets/logo.png';
import defaultPhoto from '../../../../assets/mir_asrafali.jpg';
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
  name: 'PhotoCardMaker',
  
  // ডেটা প্রপার্টি (Options API স্টাইল)
  data() {
    return {
      scale: 1,
      cardData: {
        mainImage: defaultPhoto,
        logo: defaultLogo,
        redText: 'শিরায় শিরায় রক্ত',
        blackText: 'আমি ইন্ট্রোডারের ভক্ত',
        footerLeft: 'বিস্তারিত কমেন্টে...',
        footerRight: getTodayBanglaDate()
      }
    };
  },

  computed: {
    redTextFontSize() {
      return calculateAutoFontSize(
        this.cardData.redText,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        36,
        450,
        18
      );
    },
    blackTextFontSize() {
      return calculateAutoFontSize(
        this.cardData.blackText,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        36,
        450,
        18
      );
    },
    isRedTextFull() {
      return isTextFullAtMinSize(
        this.cardData.redText,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        18,
        450
      );
    },
    isBlackTextFull() {
      return isTextFullAtMinSize(
        this.cardData.blackText,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        18,
        450
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
    this.cardData.footerRight = getTodayBanglaDate();
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

  // ফাংশনসমূহ (Methods)
  methods: {
    onRedTextInput() {
      this.cardData.redText = fitTextAtMinSize(
        this.cardData.redText,
        (sz) => `700 ${sz}px "Hind Siliguri", sans-serif`,
        18,
        450
      );
    },

    onBlackTextInput() {
      this.cardData.blackText = fitTextAtMinSize(
        this.cardData.blackText,
        (sz) => `900 ${sz}px "Hind Siliguri", sans-serif`,
        18,
        450
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

    // মূল ছবি আপলোড হ্যান্ডলার
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

    // লোগো আপলোড হ্যান্ডলার
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

    // ইমেজ ডাউনলোড করার ফাংশন
    async downloadImage() {
      const area = this.$refs.captureArea; // Template এর ref="captureArea" ধরবে
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
        link.download = `news-card-${Date.now()}.png`;
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
</style>