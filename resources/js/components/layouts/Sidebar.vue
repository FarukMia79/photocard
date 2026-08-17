<template>
    <div>
        <div 
            v-if="isMobileOpen" 
            @click="closeMobileSidebar" 
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-30 md:hidden transition-opacity duration-300">
        </div>

        <!-- SIDEBAR CONTAINER -->
        <aside
            :class="[
                isMobileOpen ? 'translate-x-0 shadow-2xl' : '-translate-x-full md:translate-x-0',
                'fixed top-0 left-0 z-30 flex flex-col flex-shrink-0 w-64 h-full pt-16 bg-white border-r border-gray-100 transition-transform duration-300 ease-in-out font-[\'Hind_Siliguri\']'
            ]">
            
            <!-- MOBILE CLOSE BUTTON -->
            <div class="flex items-center justify-between px-4 pt-2 pb-2 md:hidden border-b border-gray-100">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Navigation</span>
                <button 
                    @click="closeMobileSidebar" 
                    class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col flex-1 pt-4 pb-6 overflow-y-auto custom-scrollbar">
                <div class="flex-1 px-3 space-y-6">

                    <!-- MAIN MENU -->
                    <div>
                        <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Menu</p>

                        <router-link :to="{ name: 'dashboard' }"
                            exact-active-class="bg-indigo-50 text-indigo-600 font-semibold"
                            @click="closeMobileSidebar"
                            class="flex items-center gap-3 px-3 py-2.5 text-gray-600 rounded-xl hover:bg-gray-50 hover:text-gray-900 group transition-all duration-150">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="text-sm font-medium">Feed</span>
                        </router-link>
                    </div>

                    <!-- CATEGORIES SECTION -->
                    <div>
                        <p class="px-3 text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-2">Categories</p>
                        
                        <div class="space-y-1">
                            <!-- Facebook Accordion Menu -->
                            <div>
                                <button 
                                    @click="isFacebookOpen = !isFacebookOpen"
                                    :class="{'bg-gray-50 text-gray-900 font-semibold': isFacebookOpen}"
                                    class="flex items-center justify-between w-full px-3 py-2.5 text-gray-600 rounded-xl hover:bg-gray-50 hover:text-gray-900 transition-all duration-150 group"
                                >
                                    <div class="flex items-center gap-3">
                                        <div class="w-5 h-5 rounded-md bg-blue-600 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                            f
                                        </div>
                                        <span class="text-sm font-medium">Facebook</span>
                                    </div>
                                    <svg :class="{'rotate-180 text-indigo-600': isFacebookOpen}" class="w-4 h-4 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <!-- Facebook Sub-menu -->
                                <div v-show="isFacebookOpen" class="mt-1 ml-4 pl-3 space-y-1 border-l-2 border-gray-100 transition-all">
                                    
                                    <!-- News Photo Card Nested Dropdown -->
                                    <div>
                                        <button 
                                            @click="isNewsCardOpen = !isNewsCardOpen"
                                            class="flex items-center justify-between w-full py-2 px-2.5 text-xs font-semibold text-gray-600 rounded-lg hover:bg-indigo-50/60 hover:text-indigo-600 transition"
                                        >
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                                </svg>
                                                <span>News Photo Card</span>
                                            </div>
                                            <svg :class="{'rotate-180': isNewsCardOpen}" class="w-3 h-3 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        <!-- Design List Tree -->
                                        <div v-show="isNewsCardOpen" class="mt-1 ml-3 pl-3 space-y-1 border-l border-indigo-100">
                                            <router-link :to="{ name: 'Design_1' }" 
                                                active-class="bg-indigo-50 text-indigo-600 font-bold"
                                                @click="closeMobileSidebar"
                                                class="flex items-center gap-2 py-1.5 px-2.5 text-[12px] text-gray-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-lg transition">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                                <span>Design 1</span>
                                            </router-link>

                                            <router-link :to="{ name: 'Design_2' }" 
                                                active-class="bg-indigo-50 text-indigo-600 font-bold"
                                                @click="closeMobileSidebar"
                                                class="flex items-center gap-2 py-1.5 px-2.5 text-[12px] text-gray-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-lg transition">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                                <span>Design 2</span>
                                            </router-link>

                                            <router-link :to="{ name: 'Design_3' }" 
                                                active-class="bg-indigo-50 text-indigo-600 font-bold"
                                                @click="closeMobileSidebar"
                                                class="flex items-center gap-2 py-1.5 px-2.5 text-[12px] text-gray-500 hover:text-indigo-600 hover:bg-indigo-50/50 rounded-lg transition">
                                                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                                <span>Design 3</span>
                                            </router-link>
                                        </div>
                                    </div>

                                    <!-- Facebook Other Links -->
                                    <router-link to="#" 
                                        active-class="bg-indigo-50 text-indigo-600 font-semibold"
                                        @click="closeMobileSidebar"
                                        class="flex items-center gap-2 py-2 px-2.5 text-xs text-gray-600 rounded-lg hover:bg-indigo-50/60 hover:text-indigo-600 transition">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Profile Cover</span>
                                    </router-link>

                                    <router-link to="#" 
                                        active-class="bg-indigo-50 text-indigo-600 font-semibold"
                                        @click="closeMobileSidebar"
                                        class="flex items-center gap-2 py-2 px-2.5 text-xs text-gray-600 rounded-lg hover:bg-indigo-50/60 hover:text-indigo-600 transition">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <span>Group Banner</span>
                                    </router-link>
                                </div>
                            </div>

                            <!-- Youtube Category -->
                            <router-link to="#" 
                                active-class="bg-indigo-50 text-indigo-600 font-semibold"
                                @click="closeMobileSidebar"
                                class="flex items-center justify-between px-3 py-2.5 text-gray-600 rounded-xl hover:bg-gray-50 hover:text-gray-900 transition-all duration-150 group">
                                <div class="flex items-center gap-3">
                                    <span class="text-indigo-500 font-bold text-sm">#</span>
                                    <span class="text-sm font-medium">Youtube</span>
                                </div>
                                <span class="text-[10px] bg-gray-100 text-gray-500 px-1.5 py-0.5 rounded-full font-bold">New</span>
                            </router-link>
                        </div>
                    </div>

                </div>
            </div>
        </aside>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            isFacebookOpen: true,
            isNewsCardOpen: true,
            isMobileOpen: false
        };
    },
    watch: {
        $route() {
            this.closeMobileSidebar();
        }
    },
    mounted() {
        window.addEventListener('toggle-mobile-sidebar', this.toggleSidebar);
    },
    beforeUnmount() {
        window.removeEventListener('toggle-mobile-sidebar', this.toggleSidebar);
    },
    methods: {
        toggleSidebar() {
            this.isMobileOpen = !this.isMobileOpen;
        },
        closeMobileSidebar() {
            this.isMobileOpen = false;
        }
    }
}
</script>

<style scoped>
.rotate-180 {
    transform: rotate(180deg);
}

.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #cbd5e1;
}
</style>