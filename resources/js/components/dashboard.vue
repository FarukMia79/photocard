<template>
    <div class="min-h-screen bg-[#f8fafc] p-6 md:p-10 font-['Hind_Siliguri'] text-gray-800">
        <div class="max-w-7xl mx-auto space-y-8">

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
                                    <img src="../../../public/uploads/image/cards/design-2.png" alt="Design 3" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-indigo-600 transition flex items-center gap-2">
                                    News Photo Card - Design 3
                                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Professional news photo card editor with custom hex colors and calendar date.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_3' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 3)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    <!-- Template Card 4 (Design 4 - Red World Map & Social Footer) -->
                    <div
                        class="bg-white rounded-2xl border-2 border-indigo-500/30 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between relative">
                        <span
                            class="absolute top-3 right-3 z-10 bg-gradient-to-r from-red-500 to-rose-600 text-white text-[10px] font-black px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                            New ✨
                        </span>
                        <div>
                            <div
                                class="relative h-48 bg-gradient-to-br from-red-50 to-rose-50 overflow-hidden flex items-center justify-center p-4">
                                <div
                                    class="w-44 h-36 bg-[#a9050d] shadow-lg text-white flex flex-col justify-between transform group-hover:scale-105 transition duration-300 relative rounded-md overflow-hidden">
                                    <img src="../../../public/uploads/image/cards/design-4.png" alt="Design 4" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-red-600 transition flex items-center gap-2">
                                    News Photo Card - Design 4
                                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Professional news photo card with red world map texture and social channels footer.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_4' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 4)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    <!-- Template Card 5 (Design 5 - Breaking News / Floating Red Pill) -->
                    <div
                        class="bg-white rounded-2xl border-2 border-indigo-500/30 shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col justify-between relative">
                        <span
                            class="absolute top-3 right-3 z-10 bg-gradient-to-r from-red-600 to-rose-700 text-white text-[10px] font-black px-2.5 py-1 rounded-full shadow-md uppercase tracking-wider">
                            Trending 🔥
                        </span>
                        <div>
                            <div
                                class="relative h-48 bg-gradient-to-br from-neutral-900 to-black overflow-hidden flex items-center justify-center p-4">
                                <div
                                    class="w-44 h-36 bg-black shadow-lg text-white flex flex-col justify-between transform group-hover:scale-105 transition duration-300 relative rounded-md overflow-hidden">
                                    <img src="../../../public/uploads/image/cards/design-5.png" alt="Design 5" class="w-full h-full object-cover">
                                </div>
                                <span
                                    class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Facebook 1:1
                                </span>
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-base text-gray-900 group-hover:text-red-600 transition flex items-center gap-2">
                                    News Photo Card - Design 5
                                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Sports and breaking news card with red headline badge, rounded dark text card, and spotlight footer.
                                </p>
                            </div>
                        </div>
                        <div class="px-5 pb-5 pt-0">
                            <router-link :to="{ name: 'Design_5' }"
                                class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-2 shadow-md shadow-indigo-200 transition duration-200">
                                <span>Edit (Design 5)</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </router-link>
                        </div>
                    </div>

                    

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