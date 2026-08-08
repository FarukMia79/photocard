<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">

      <!-- header -->
      <div class="mb-8 border-b pb-4 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-sm text-gray-500">প্রফেশনাল এডিটর ও ডিজাইন ২ (পিওর কোড)</p>
        </div>
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

            <!-- inputs section -->
            <div class="space-y-4">
              <div>
                <label class="text-[11px] font-bold text-red-500 uppercase">হেডলাইন (সাদা লেখা)</label>
                <input v-model="cardData.headline" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition font-bold text-lg" />
              </div>

              <div>
                <label class="text-[11px] font-bold text-yellow-600 uppercase tracking-wider">সাব-টাইটেল (হলুদ লেখা)</label>
                <input v-model="cardData.subHeadline" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 outline-none transition font-bold text-md" />
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">ওয়েবসাইট</label>
                  <input v-model="cardData.website" type="text"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm" />
                </div>
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">তারিখ</label>
                  <input v-model="cardData.date" type="text"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm" />
                </div>
              </div>
            </div>

            <!-- download button -->
            <button @click="downloadImage"
              class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 transition-all active:scale-95 mt-6">
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
            <div class="bg-white px-6 py-2 flex justify-between items-center h-[65px] z-20">
              <img :src="cardData.logo" class="h-10 object-contain" />
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
              <h2 class="text-white text-[28px] font-bold leading-tight mb-1 drop-shadow-md">
                {{ cardData.headline }}
              </h2>
              <h3 class="text-yellow-400 text-[24px] font-black leading-tight drop-shadow-md">
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
import html2canvas from 'html2canvas';

export default {
  name: 'Design2Maker',
  
  data() {
    return {
      cardData: {
        mainImage: 'https://via.placeholder.com/1080x600',
        logo: 'https://via.placeholder.com/150',
        headline: 'তুমি কে আমি কে, ইন্ট্রোডার ইন্ট্রোডার',
        subHeadline: 'নিয়েছি তো ইন্ট্রো, আরও নেব আউটট্রো',
        website: 'www.introder.com',
        date: '০৯ আগস্ট ২০২৪'
      }
    };
  },

  methods: {
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

      try {
        const canvas = await html2canvas(area, { 
          scale: 2, 
          useCORS: true,
          logging: false 
        });
        
        const link = document.createElement('a');
        link.download = `news-card-design2-${Date.now()}.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();
      } catch (error) {
        console.error("Download failed:", error);
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

.background-gradient {
  background: #74353C;
  background: linear-gradient(360deg, rgba(116, 53, 60, 1) 58%, rgba(255, 255, 255, 1) 100%);
}

.card-background-gradient {
  background: #74353C;
  background: linear-gradient(360deg, rgba(116, 53, 60, 1) 36%, rgba(237, 50, 51, 1) 100%);
}
</style>