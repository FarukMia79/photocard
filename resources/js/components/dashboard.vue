<template>
    <div class="min-h-screen bg-[#f8fafc] p-6 md:p-10 font-['Hind_Siliguri'] text-gray-800">
        <div class="max-w-7xl mx-auto space-y-8">

            <!-- 1. HERO WELCOME BANNER -->
            <div
                class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#2B1B59] via-indigo-900 to-indigo-800 p-8 md:p-10 text-white shadow-xl shadow-indigo-950/10">
                <div class="relative z-10 max-w-2xl space-y-3">
                    <span
                        class="inline-block px-3 py-1 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-xs font-bold text-yellow-300 uppercase tracking-widest">
                        PhotoCard Studio v2.0
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold leading-tight">
                        Welcome, Creator! <i class="fa-regular fa-hand"></i>
                    </h1>
                    <p class="text-indigo-200 text-sm md:text-base">
                        Want to design a Facebook News photo card or banner today? Choose a template of your choice and start editing now.
                    </p>
                    <div class="pt-2 flex flex-wrap gap-3">
                        <router-link :to="{ name: 'Design_2' }"
                            class="px-6 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all active:scale-95 flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Start new design
                        </router-link>
                        <a href="#templates"
                            class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl backdrop-blur-md border border-white/20 transition-all text-sm">
                            See all templates
                        </a>
                    </div>
                </div>

                <!-- Decorative background graphics -->
                <div
                    class="absolute -right-10 -bottom-10 w-72 h-72 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none">
                </div>
                <div class="absolute right-20 top-0 w-40 h-40 bg-pink-500/20 rounded-full blur-2xl pointer-events-none">
                </div>
            </div>

            <!-- 2. QUICK STATS CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Stat 1 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total cards created</p>
                        <h3 class="text-2xl font-black text-gray-900 mt-1">48</h3>
                        <span class="text-[11px] text-emerald-600 font-semibold flex items-center gap-1 mt-1">
                            ↑ 12% increase
                        </span>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total downloads</p>
                        <h3 class="text-2xl font-black text-gray-900 mt-1">162</h3>
                        <span class="text-[11px] text-emerald-600 font-semibold flex items-center gap-1 mt-1">
                            ↑ 25% this week
                        </span>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Facebook templates</p>
                        <h3 class="text-2xl font-black text-gray-900 mt-1">6</h3>
                        <span class="text-[11px] text-gray-400 font-medium mt-1 inline-block">
                            Ready to use
                        </span>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Popular design</p>
                        <h3 class="text-2xl font-black text-gray-900 mt-1">Design 2</h3>
                        <span class="text-[11px] text-indigo-600 font-semibold mt-1 inline-block">
                            Most popular
                        </span>
                    </div>
                    <div class="w-12 h-12 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- 3. FEATURED TEMPLATES GRID -->
            <div id="templates" class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Popular photo card templates</h2>
                        <p class="text-xs text-gray-500">Click on your favorite template to start editing instantly</p>
                    </div>
                    <span class="text-xs font-bold text-indigo-600 hover:underline cursor-pointer">See all (6) →</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    
                    <!-- Template Card 1 (Design 1 - Featured) -->
                    <div
                        class="bg-white rounded-2xl border-2 border-indigo-500/30 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between relative">
                        <span
                            class="absolute top-3 right-3 z-10 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-[10px] font-black px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                            Popular 🔥
                        </span>
                        <div>
                            <div
                                class="relative h-48 bg-gradient-to-br from-purple-50 to-indigo-50 overflow-hidden flex items-center justify-center p-4">
                                <!-- Tilted Frame Mini Representation -->
                                <div
                                    class="w-44 h-36 bg-[#2B1B59] shadow-lg text-white flex flex-col justify-between transform group-hover:scale-105 transition duration-300 relative">
                                    <img src="../../../public/uploads/image/cards/design-1.png" alt="Design 1" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-indigo-600 transition flex items-center gap-2">
                                    News Photo Card - Design 1
                                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Professional news photo card editor with tick and bordered image frame.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_1' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 1)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>
                    <!-- Template Card 2 (Design 2 - Featured) -->
                    <div
                        class="bg-white rounded-2xl border-2 border-indigo-500/30 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between relative">
                        <span
                            class="absolute top-3 right-3 z-10 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-[10px] font-black px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                            Popular 🔥
                        </span>
                        <div>
                            <div
                                class="relative h-48 bg-gradient-to-br from-purple-50 to-indigo-50 overflow-hidden flex items-center justify-center p-4">
                                <!-- Tilted Frame Mini Representation -->
                                <div
                                    class="w-44 h-36 bg-[#2B1B59] shadow-lg text-white flex flex-col justify-between transform group-hover:scale-105 transition duration-300 relative">
                                    <img src="../../../public/uploads/image/cards/design-2.png" alt="Design 2" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-indigo-600 transition flex items-center gap-2">
                                    News Photo Card - Design 2
                                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Professional news photo card editor with tick and bordered image frame.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_2' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 2)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>
                    <!-- Template Card 3 (Design 3 - Featured) -->
                    <div
                        class="bg-white rounded-2xl border-2 border-indigo-500/30 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between relative">
                        <span
                            class="absolute top-3 right-3 z-10 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-[10px] font-black px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                            Popular 🔥
                        </span>
                        <div>
                            <div
                                class="relative h-48 bg-gradient-to-br from-purple-50 to-indigo-50 overflow-hidden flex items-center justify-center p-4">
                                <!-- Tilted Frame Mini Representation -->
                                <div
                                    class="w-44 h-36 bg-[#2B1B59] shadow-lg text-white flex flex-col justify-between transform group-hover:scale-105 transition duration-300 relative">
                                    <img src="../../../public/uploads/image/cards/design-2.png" alt="Design 2" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-indigo-600 transition flex items-center gap-2">
                                    News Photo Card - Design 2
                                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Professional news photo card editor with tick and bordered image frame.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_2' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 2)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    

                </div>
            </div>

            <!-- 4. RECENT ACTIVITY TABLE -->
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Recently created cards</h2>
                        <p class="text-xs text-gray-500">Your recent download and edit card list</p>
                    </div>
                    <button class="text-xs font-bold text-gray-500 hover:text-indigo-600">Reload ↻</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-gray-100 text-[11px] font-bold text-gray-400 uppercase tracking-wider">
                                <th class="pb-3 pl-2">কার্ডের নাম</th>
                                <th class="pb-3">ক্যাটাগরি</th>
                                <th class="pb-3">তারিখ</th>
                                <th class="pb-3">স্ট্যাটাস</th>
                                <th class="pb-3 text-right pr-2">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm">
                            <tr class="hover:bg-gray-50/80 transition">
                                <td class="py-3.5 pl-2 font-bold text-gray-900 flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                        02
                                    </div>
                                    <span>তুমি কে আমি কে, ইন্ট্রোডার...</span>
                                </td>
                                <td class="py-3.5 text-xs text-gray-500">
                                    <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-md font-bold text-[11px]">
                                        News Card 2
                                    </span>
                                </td>
                                <td class="py-3.5 text-xs text-gray-500">০৯ আগস্ট ২০২৬</td>
                                <td class="py-3.5">
                                    <span
                                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full font-bold text-[10px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> ডাউনলোড সম্পন্ন
                                    </span>
                                </td>
                                <td class="py-3.5 text-right pr-2">
                                    <router-link :to="{ name: 'Design_2' }"
                                        class="text-xs font-bold text-indigo-600 hover:underline">
                                        পুনরায় এডিট
                                    </router-link>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50/80 transition">
                                <td class="py-3.5 pl-2 font-bold text-gray-900 flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs">
                                        01
                                    </div>
                                    <span>ব্রেকিং নিউজ আপডেট টেক্সট...</span>
                                </td>
                                <td class="py-3.5 text-xs text-gray-500">
                                    <span
                                        class="px-2.5 py-1 bg-purple-50 text-purple-600 rounded-md font-bold text-[11px]">
                                        News Card 1
                                    </span>
                                </td>
                                <td class="py-3.5 text-xs text-gray-500">০৮ আগস্ট ২০২৬</td>
                                <td class="py-3.5">
                                    <span
                                        class="inline-flex items-center gap-1 px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full font-bold text-[10px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> ডাউনলোড সম্পন্ন
                                    </span>
                                </td>
                                <td class="py-3.5 text-right pr-2">
                                    <router-link :to="{ name: 'Design_1' }"
                                        class="text-xs font-bold text-indigo-600 hover:underline">
                                        পুনরায় এডিট
                                    </router-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            // 
        }
    }
}
</script>

<style scoped>

</style>