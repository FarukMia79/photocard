<template>
  <div class="min-h-screen bg-[#f8fafc] p-4 md:p-10 font-['Hind_Siliguri'] text-gray-800">
    <div class="max-w-6xl mx-auto">

      <!-- হেডার -->
      <div class="mb-8 border-b pb-4 flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-bold text-gray-900">Facebook News Photo Card Maker</h1>
          <p class="text-sm text-gray-500">ফেসবুকের জন্য প্রফেশনাল নিউজ কার্ড তৈরি করুন</p>
        </div>
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

            <!-- ইনপুট ফিল্ডস -->
            <div class="space-y-4">
              <div>
                <label class="text-[11px] font-bold text-red-500 uppercase">হেডলাইন (লাল লেখা)</label>
                <input v-model="cardData.redText" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition font-bold text-lg" />
              </div>

              <div>
                <label class="text-[11px] font-bold text-gray-600 uppercase">সাব-টাইটেল (কালো লেখা)</label>
                <input v-model="cardData.blackText" type="text"
                  class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-800 outline-none transition font-bold text-md" />
              </div>

              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">ফুটার বাম</label>
                  <input v-model="cardData.footerLeft" type="text"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm" />
                </div>
                <div>
                  <label class="text-[10px] font-bold text-gray-400 uppercase">তারিখ</label>
                  <input v-model="cardData.footerRight" type="text"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm" />
                </div>
              </div>
            </div>

            <!-- ডাউনলোড বাটন -->
            <button @click="downloadImage"
              class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-indigo-100 flex items-center justify-center gap-2 transition-all active:scale-95 mt-6">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
              </svg>
              Download PNG Image
            </button>
          </div>
        </div>

        <!-- ডান পাশ: লাইভ প্রিভিউ -->
        <div class="flex flex-col items-center">
          <div
            class="mb-4 inline-block px-4 py-1 bg-white border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            Live Preview (1:1 Ratio)
          </div>

          <!-- ডাউনলোড করার জন্য ref="captureArea" ব্যবহার করা হয়েছে -->
          <div ref="captureArea" id="news-card"
            class="w-[500px] h-[500px] bg-white shadow-[0_30px_60px_-15px_rgba(0,0,0,0.2)] relative overflow-hidden flex flex-col">
            
            <div class="items-center justify-center flex bg-[#A01616]">
              <div class="h-[270px] m-2 relative overflow-hidden rounded-2xl">
                <img :src="cardData.mainImage" class="w-full h-full object-cover" />
              </div>
            </div>

            <div class="absolute top-[230px] left-1/2 -translate-x-1/2 z-10">
              <div class="w-[100px] h-[100px] bg-white rounded-full p-1.5 border-[4px] border-[#a01616] shadow-xl">
                <img :src="cardData.logo" class="w-full h-full object-contain rounded-full" />
              </div>
            </div>

            <div class="flex-1 bg-white pt-16 px-6 text-center flex flex-col justify-start items-center">
              <h2 class="text-[#e21a1a] text-[36px] font-bold leading-tight tracking-tight">
                {{ cardData.redText }}
              </h2>
              <h3 class="text-gray-900 text-[28px] font-black leading-tight mt-2">
                {{ cardData.blackText }}
              </h3>
            </div>

            <div class="bg-[#a01616] text-white px-5 py-2.5 flex justify-between items-center text-[15px] font-medium italic">
              <span>{{ cardData.footerLeft }}</span>
              <span>{{ cardData.footerRight }}</span>
            </div>
          </div>
          <p class="mt-6 text-gray-400 text-xs italic">এটি ফেসবুকের জন্য আদর্শ ১:১ সাইজ</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import html2canvas from 'html2canvas';

export default {
  name: 'PhotoCardMaker',
  
  // ডেটা প্রপার্টি (Options API স্টাইল)
  data() {
    return {
      cardData: {
        mainImage: 'https://via.placeholder.com/1080x600',
        logo: 'https://via.placeholder.com/150',
        redText: 'শিরায় শিরায় রক্ত',
        blackText: 'আমি ইন্ট্রোডারের ভক্ত',
        footerLeft: 'বিস্তারিত কমেন্টে...',
        footerRight: '০৯ আগস্ট ২০২৪'
      }
    };
  },

  // ফাংশনসমূহ (Methods)
  methods: {
    // মূল ছবি আপলোড হ্যান্ডলার
    uploadImage(e) {
      const file = e.target.files[0];
      if (file) {
        this.cardData.mainImage = URL.createObjectURL(file);
      }
    },

    // লোগো আপলোড হ্যান্ডলার
    uploadLogo(e) {
      const file = e.target.files[0];
      if (file) {
        this.cardData.logo = URL.createObjectURL(file);
      }
    },

    // ইমেজ ডাউনলোড করার ফাংশন
    async downloadImage() {
      const area = this.$refs.captureArea; // Template এর ref="captureArea" ধরবে
      if (!area) return;

      try {
        const canvas = await html2canvas(area, { 
          scale: 2, 
          useCORS: true,
          logging: false 
        });
        
        const link = document.createElement('a');
        link.download = `news-card-${Date.now()}.png`;
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
@import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap');

#news-card {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>