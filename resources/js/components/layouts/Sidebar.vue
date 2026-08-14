<template>
    <aside
        class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 h-full pt-16 bg-white border-r border-gray-100 transition-all duration-300">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1">

                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Menu</p>

                <router-link to="/dashboard"
                    class="flex items-center p-3 text-gray-700 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 group transition">
                    <span class="ml-3 font-medium text-sm">Feed</span>
                </router-link>

                <div class="pt-4 mt-4 border-t border-gray-100">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Categories</p>
                    
                    <!-- facebook menu -->
                    <div>
                        <button 
                            @click="isFacebookOpen = !isFacebookOpen"
                            class="flex items-center justify-between w-full p-3 text-gray-600 rounded-xl hover:bg-gray-50 transition"
                        >
                            <span class="ml-3 font-medium text-sm">Facebook</span>
                            <svg :class="{'rotate-180': isFacebookOpen}" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <!-- facebook sub-menu -->
                        <div v-show="isFacebookOpen" class="mt-1 ml-4 space-y-1 border-l-2 border-gray-50">
                            
                            <!-- news photo card dropdown -->
                            <div>
                                <button 
                                    @click="isNewsCardOpen = !isNewsCardOpen"
                                    class="flex items-center justify-between w-full p-2 text-sm text-gray-500 rounded-lg hover:bg-indigo-50 transition"
                                >
                                    <span class="ml-2">• News Photo Card</span>
                                    <svg :class="{'rotate-180': isNewsCardOpen}" class="w-3 h-3 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>

                                <!-- design list -->
                                <div v-show="isNewsCardOpen" class="mt-1 ml-6 space-y-1 border-l border-gray-100">
                                    <router-link :to="{ name: 'Design_1' }" class="block p-2 text-[12px] text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition">
                                        —— Design 1
                                    </router-link>
                                    <router-link :to="{ name: 'Design_2' }" class="block p-2 text-[12px] text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition">
                                        —— Design 2
                                    </router-link>
                                    <router-link :to="{ name: 'Design_3' }" class="block p-2 text-[12px] text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition">
                                        —— Design 3
                                    </router-link>
                                </div>
                            </div>

                            <!-- facebook other menus -->
                            <router-link to="#" class="block p-2 text-sm text-gray-500 rounded-lg hover:bg-indigo-50 transition">
                                <span class="ml-2">• Profile Cover</span>
                            </router-link>
                            <router-link to="#" class="block p-2 text-sm text-gray-500 rounded-lg hover:bg-indigo-50 transition">
                                <span class="ml-2">• Group Banner</span>
                            </router-link>
                        </div>
                    </div>

                    <!-- other category -->
                    <router-link to="#" class="flex items-center p-3 text-gray-600 rounded-xl hover:bg-gray-50 transition">
                        <span class="ml-3 font-medium text-sm"># Anime</span>
                    </router-link>
                </div>

            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            isFacebookOpen: false,    // facebook section control
            isNewsCardOpen: false      // news card section control (Nested)
        };
    }
}
</script>

<style scoped>
.rotate-180 {
    transform: rotate(180deg);
}
/* if bengali font available, set font family here */
</style>