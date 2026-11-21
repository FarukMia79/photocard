<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">
      
      <!-- হেডার -->
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-xs text-gray-500">ডিজাইন ৫: স্পোর্টস ও ব্রেকিং নিউজ ফটো কার্ড (ফ্লোটিং রেড পিল বক্স ও গ্লোয়িং ফুটারসহ)</p>
        </div>
        <router-link :to="{ name: 'dashboard' }" class="text-xs font-bold text-[#C12684] hover:text-[#2B1B59] hover:underline flex items-center gap-1">
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
              <label class="block text-[11px] font-bold text-red-600 uppercase">টপিক / শিরোনাম (লাল বক্সের লেখা)</label>
              <input v-model="cardData.headline" type="text" maxlength="40"
                placeholder="যেমন: প্রেস ব্রিফিংয়ে লিটন:"
                @input="onHeadlineInput"
                :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isHeadlineFull}"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition text-sm text-gray-800" />
              <p v-if="isHeadlineFull" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
              </p>
            </div>

            <!-- মূল বিবরণী লাইন ১ -->
            <div>
              <label class="block text-[11px] font-bold text-gray-600 uppercase">মূল বিবরণী (বক্সের ভেতরের লেখা - লাইন ১)</label>
              <input v-model="cardData.bodyLine1" type="text" maxlength="70"
                placeholder="যেমন: টাইগারদের ব্যর্থতার পেছনে দায়ী লিটন"
                @input="onBodyLine1Input"
                :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isBodyLine1Full}"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition text-sm text-gray-800" />
              <p v-if="isBodyLine1Full" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
              </p>
            </div>

            <!-- মূল বিবরণী লাইন ২ -->
            <div>
              <label class="block text-[11px] font-bold text-gray-600 uppercase">মূল বিবরণী (বক্সের ভেতরের লেখা - লাইন ২)</label>
              <input v-model="cardData.bodyLine2" type="text" maxlength="70"
                placeholder="যেমন: চাইলেন কঠোর দৃষ্টান্তমূলক শাস্তি।"
                @input="onBodyLine2Input"
                :class="{'border-amber-500 bg-amber-50/40 ring-1 ring-amber-500': isBodyLine2Full}"
                class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition text-sm text-gray-800" />
              <p v-if="isBodyLine2Full" class="text-[11px] text-amber-600 font-medium mt-1 flex items-center gap-1">
                ⚠️ লাইনটি সম্পূর্ণ পূর্ণ হয়েছে! আর লেখা যাবে না।
              </p>
            </div>

            <!-- সোশ্যাল মিডিয়া -->
            <div class="pt-2 border-t border-gray-100 space-y-3">
              <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">সোশ্যাল মিডিয়া</h3>

              <div>
                <label class="text-[10px] font-bold text-gray-400 uppercase">ইউটিউব চ্যানেল</label>
                <div class="relative mt-1">
                  <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-600 text-xs">
                    ▶
                  </span>
                  <input v-model="cardData.youtube" type="text"
                    placeholder="testo life tv"
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
                    placeholder="testo life tv"
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
                    <span class="bg-[#d61b23] text-white font-bold text-[17px] px-6 py-1.5 rounded-lg shadow-md whitespace-nowrap overflow-hidden text-ellipsis max-w-[420px] font-['Hind_Siliguri'] inline-block tracking-wide">
                      {{ cardData.headline }}
                    </span>
                  </div>

                  <!-- ব্ল্যাক রাউন্ডেড বক্স (মূল টেক্সট) -->
                  <div class="bg-[#0c0c0c]/95 border border-[#d61b23] rounded-2xl pt-8 pb-4 px-6 shadow-2xl text-center backdrop-blur-sm overflow-hidden">
                    <p class="text-white text-[15px] leading-[1.5] font-medium font-['Hind_Siliguri'] whitespace-nowrap overflow-hidden text-ellipsis tracking-normal">
                      {{ cardData.bodyLine1 }}
                    </p>
                    <p class="text-white text-[15px] leading-[1.5] font-medium font-['Hind_Siliguri'] whitespace-nowrap overflow-hidden text-ellipsis tracking-normal mt-1">
                      {{ cardData.bodyLine2 }}
                    </p>
                  </div>

                </div>

                <!-- নিচের গ্লোয়িং রেড স্পটলাইট ফুটার বার -->
                <div class="h-[36px] bg-black flex items-center justify-center relative overflow-hidden shrink-0 z-20 border-t border-neutral-900">
                  <!-- রেড গ্লো স্পটলাইট -->
                  <div class="w-56 h-4 bg-gradient-to-r from-transparent via-[#d61b23] to-transparent opacity-90 blur-[3px] absolute pointer-events-none"></div>
                  
                  <!-- ইউটিউব ও ফেসবুক ইনফো -->
                  <div class="relative z-10 flex items-center justify-center gap-6 text-[11px] text-white tracking-tight font-medium font-sans">
                    <!-- ইউটিউব -->
                    <div class="flex items-center gap-1.5 uppercase font-bold tracking-tighter">
                      <svg class="w-4 h-3 shrink-0" width="16" height="12" viewBox="0 0 24 24" fill="none">
                        <path fill="#FF0000" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                        <path fill="#FFFFFF" d="M9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                      </svg>
                      <span>{{ cardData.youtube || 'testo life tv' }}</span>
                    </div>

                    <!-- ফেসবুক -->
                    <div class="flex items-center gap-1.5 uppercase font-bold tracking-tighter">
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

          <!-- প্রিভিউ এর নিচে ডাউনলোড বাটন -->
          <button @click="downloadImage" :disabled="isDownloading"
            class="w-full max-w-[500px] bg-gradient-to-r from-[#2B1B59] to-[#C12684] hover:opacity-95 disabled:opacity-50 text-white py-3.5 rounded-xl font-bold shadow-lg shadow-pink-200 flex items-center justify-center gap-2 transition-all active:scale-95 mt-5 cursor-pointer">
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
import { fitTextToWidth, isTextFull } from '../../../../utils/textLimiter.js';

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
        bodyLine1: 'টাইগারদের ব্যর্থতার পেছনে দায়ী লিটন',
        bodyLine2: 'চাইলেন কঠোর দৃষ্টান্তমূলক শাস্তি।',
        youtube: 'testo life tv',
        facebook: 'testo life tv'
      }
    };
  },

  computed: {
    isHeadlineFull() {
      return isTextFull(this.cardData.headline, '700 17px "Hind Siliguri", sans-serif', 380);
    },
    isBodyLine1Full() {
      return isTextFull(this.cardData.bodyLine1, '500 15px "Hind Siliguri", sans-serif', 405);
    },
    isBodyLine2Full() {
      return isTextFull(this.cardData.bodyLine2, '500 15px "Hind Siliguri", sans-serif', 405);
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
      this.cardData.headline = fitTextToWidth(this.cardData.headline, '700 17px "Hind Siliguri", sans-serif', 380);
    },

    onBodyLine1Input() {
      this.cardData.bodyLine1 = fitTextToWidth(this.cardData.bodyLine1, '500 15px "Hind Siliguri", sans-serif', 405);
    },

    onBodyLine2Input() {
      this.cardData.bodyLine2 = fitTextToWidth(this.cardData.bodyLine2, '500 15px "Hind Siliguri", sans-serif', 405);
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
#news-card {
  font-family: 'Hind Siliguri', sans-serif;
  letter-spacing: normal !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>

