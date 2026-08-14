<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">

      <!-- header -->
      <div class="mb-8 border-b pb-4 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold uppercase text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-sm text-gray-500">প্রফেশনাল এডিটর (ক্যালেন্ডার ও HEX কালার অপশন সহ)</p>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        <!-- left side: card editor -->
        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 p-8 border border-[#DB1C84]/10">
          <div class="flex items-center gap-2 mb-6">
            <span class="w-1.5 h-6 bg-[#DB1C84] rounded-full"></span>
            <h2 class="text-lg font-bold">কার্ডের তথ্য ও কালার পরিবর্তন করুন</h2>
          </div>

          <div class="space-y-5">
            <!-- file upload -->
            <div class="grid grid-cols-2 gap-4">
              <div class="space-y-1">
                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Main Photo</label>
                <input type="file" @change="uploadImage"
                  class="block w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 cursor-pointer" />
              </div>
              <div class="space-y-1">
                <label class="text-[11px] font-bold text-gray-400 uppercase tracking-wider">Your Logo</label>
                <input type="file" @change="uploadLogo"
                  class="block w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 cursor-pointer" />
              </div>
            </div>

            <!-- text inputs section -->
            <div class="space-y-4">
              <div>
                <label class="text-[11px] font-bold text-gray-700 uppercase">হেডলাইন</label>
                <input v-model="cardData.headline" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition font-bold text-lg" />
              </div>

              <div>
                <label class="text-[11px] font-bold text-gray-700 uppercase tracking-wider">সাব-টাইটেল</label>
                <input v-model="cardData.subHeadline" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 outline-none transition font-bold text-md" />
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">ওয়েবসাইট</label>
                  <input v-model="cardData.website" type="text"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">তারিখ (ক্যালেন্ডার)</label>
                  <input v-model="rawDate" type="date"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm cursor-pointer outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
              </div>
            </div>

            <!-- COLOR CUSTOMIZATION SECTION (WITH HEX INPUTS) -->
            <div class="pt-4 border-t border-gray-100">
              <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">কালার কাস্টমাইজেশন (HEX)</h3>
              
              <div class="grid grid-cols-2 gap-3">
                <!-- Headline Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">হেডলাইন</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.headline" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.headline" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>

                <!-- Subheadline Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">সাব-টাইটেল</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.subHeadline" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.subHeadline" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>

                <!-- Card Main Bg Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">ব্যাকগ্রাউন্ড</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.cardBg" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.cardBg" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>

                <!-- Accent/Theme Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">থিম / অ্যাকসেন্ট</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.accent" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.accent" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>

                <!-- Top Bar Bg Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">টপ ব্যাকগ্রাউন্ড</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.topBarBg" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.topBarBg" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>

                <!-- Top Bar Date Color -->
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg border border-gray-100">
                  <span class="text-xs font-semibold text-gray-600">তারিখের রঙ</span>
                  <div class="flex items-center gap-1.5">
                    <input v-model="cardData.colors.topBarText" type="text" class="w-16 px-1.5 py-0.5 text-[11px] font-mono uppercase bg-white border rounded text-gray-700 text-center outline-none focus:border-indigo-500" />
                    <input v-model="cardData.colors.topBarText" type="color" class="w-7 h-7 rounded border-0 cursor-pointer bg-transparent p-0" />
                  </div>
                </div>
              </div>
            </div>

            <!-- download button -->
            <button @click="downloadImage"
              class="w-full bg-[#2B1B59] hover:bg-[#1a0f3d] text-white py-4 rounded-xl font-bold shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 transition-all active:scale-95 mt-6 cursor-pointer">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
              </svg>
              Download Design 2 Image
            </button>
          </div>
        </div>

        <!-- right side: live preview -->
        <div class="flex flex-col items-center">
          <div
            class="mb-4 inline-block px-4 py-1 bg-white border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            Live Preview (1:1 Ratio)
          </div>

          <div ref="captureArea" id="news-card"
            class="w-[500px] h-[500px] bg-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] relative overflow-hidden flex flex-col">
            
            <!-- top logo and date -->
            <div class="px-6 py-2 flex justify-between items-center h-[65px] z-20"
                 :style="{ backgroundColor: cardData.colors.topBarBg }">
              <img :src="cardData.logo" class="h-10 object-contain" />
              <span class="text-lg font-bold" :style="{ color: cardData.colors.topBarText }">{{ formattedBanglaDate }}</span>
            </div>

            <!-- tilt image frame -->
            <div class="relative h-[230px] w-full flex justify-center items-center z-30">
               <!-- red/accent shadow frame -->
               <div class="absolute w-[440px] h-[240px] rounded-[35px] rotate-[-4.5deg] shadow-lg translate-x-1 translate-y-1"
                    :style="{ background: `linear-gradient(360deg, ${cardData.colors.cardBg} 58%, ${cardData.colors.accent} 100%)` }"></div>
               <!-- white main frame -->
               <div class="relative w-[410px] h-[245px] bg-white rounded-[32px] rotate-[3deg] overflow-hidden shadow-inner">
                  <!-- image rotation fixed to show straight -->
                  <img :src="cardData.mainImage" class="w-full h-full object-cover rotate-[3deg] scale-110" />
               </div>
            </div>

            <!-- gradient bottom section -->
            <div class="flex-1 relative flex flex-col items-center justify-start pt-30 px-8 -mt-20 text-center"
                 :style="{ background: `linear-gradient(180deg, ${cardData.colors.topBarBg} 0%, ${cardData.colors.cardBg} 65%, ${cardData.colors.cardBg} 100%)` }">
              
              <!-- headline and sub-headline -->
              <h2 class="text-[28px] font-bold leading-tight mb-1 drop-shadow-md"
                  :style="{ color: cardData.colors.headline }">
                {{ cardData.headline }}
              </h2>
              <h3 class="text-[24px] font-black leading-tight drop-shadow-md"
                  :style="{ color: cardData.colors.subHeadline }">
                {{ cardData.subHeadline }}
              </h3>

              <!-- comment button and dots -->
              <div class="mt-4 flex items-center gap-3">
                <div class="flex gap-1">
                  <div class="w-1.5 h-1.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                  <div class="w-2.5 h-2.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                  <div class="w-3.5 h-3.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                </div>
                <div class="text-white px-6 py-1 rounded-full text-xs font-bold shadow-md uppercase"
                     :style="{ backgroundColor: cardData.colors.accent, borderColor: cardData.colors.accent }">
                  বিস্তারিত কমেন্টে...
                </div>
                <div class="flex gap-1">
                  <div class="w-3.5 h-3.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                  <div class="w-2.5 h-2.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                  <div class="w-1.5 h-1.5 rounded-full" :style="{ backgroundColor: cardData.colors.accent }"></div>
                </div>
              </div>

              <!-- footer -->
              <div class="absolute bottom-0 w-full h-[32px] flex justify-between items-center px-6 text-[10px] text-white/90"
                   :style="{ backgroundColor: cardData.colors.accent }">
                <span>{{ cardData.website }}</span>
                <div class="flex items-center gap-2 uppercase font-bold tracking-tighter">
                   <span class="bg-blue-600 text-white px-1 rounded-sm text-[9px]">f</span>
                   Facebook • CONNECT US
                </div>
              </div>
            </div>
          </div>
          <p class="mt-6 text-gray-400 text-xs italic">ডিজাইন ২ - ১:১ সাইজ ফেসবুকের জন্য</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import html2canvas from 'html2canvas-pro';

export default {
  name: 'Design2Maker',
  
  data() {
    return {
      rawDate: '2026-08-09',
      cardData: {
        mainImage: 'https://via.placeholder.com/1080x600',
        logo: 'https://via.placeholder.com/150',
        headline: 'তুমি কে আমি কে, ইন্ট্রোডার ইন্ট্রোডার',
        subHeadline: 'নিয়েছি তো ইন্ট্রো, আরও নেব আউটট্রো',
        website: 'www.introder.com',
        colors: {
          headline: '#FFFFFF',
          subHeadline: '#FACC15',
          cardBg: '#2B1B59',
          accent: '#DB1C84',
          topBarBg: '#FFFFFF',
          topBarText: '#2B1B59'
        }
      }
    };
  },

  computed: {
    formattedBanglaDate() {
      if (!this.rawDate) return '';
      
      const [year, month, day] = this.rawDate.split('-');
      const banglaDigits = {'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
      const banglaMonths = {
        '01': 'জানুয়ারি', '02': 'ফেব্রুয়ারি', '03': 'মার্চ', '04': 'এপ্রিল',
        '05': 'মে', '06': 'জুন', '07': 'জুলাই', '08': 'আগস্ট',
        '09': 'সেপ্টেম্বর', '10': 'অক্টোবর', '11': 'নভেম্বর', '12': 'ডিসেম্বর'
      };

      const toBnNum = (str) => str.split('').map(d => banglaDigits[d] || d).join('');

      return `${toBnNum(day)} ${banglaMonths[month] || ''} ${toBnNum(year)}`;
    }
  },

  methods: {
    uploadImage(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
          this.cardData.mainImage = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },

    uploadLogo(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
          this.cardData.logo = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },

    async downloadImage() {
      const area = this.$refs.captureArea;
      if (!area) return;

      try {
        if (document.fonts) {
          await document.fonts.ready;
        }

        const canvas = await html2canvas(area, { 
          scale: 2, 
          useCORS: true,
          allowTaint: true,
          logging: false,
          backgroundColor: '#ffffff'
        });
        
        // Export image
        const dataUrl = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.download = `news-card-${Date.now()}.png`;
        link.href = dataUrl;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

      } catch (error) {
        console.error("Download error:", error);
      }
    }
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700;900&display=swap');

#news-card {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>