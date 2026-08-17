<template>
    <nav class="bg-white border-b border-gray-100 fixed w-full z-40 top-0 shadow-sm font-['Hind_Siliguri']">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    
                    <!-- MOBILE HAMBURGER BUTTON -->
                    <button 
                        @click="toggleMobileSidebar" 
                        type="button"
                        class="p-2 mr-2 text-gray-500 rounded-xl md:hidden hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Logo -->
                    <router-link to="/" class="flex ml-1 md:ml-2 md:mr-24">
                        <span class="self-center text-2xl font-bold whitespace-nowrap text-indigo-600">
                            Photo<span class="text-gray-800">Card</span>
                        </span>
                    </router-link>

                    <!-- Search Bar (Desktop Only) -->
                    <div class="hidden md:flex items-center relative ml-10">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text"
                            class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-full focus:ring-indigo-500 focus:border-indigo-500 block w-80 pl-10 p-2 outline-none"
                            placeholder="Search photocards...">
                    </div>
                </div>

                <!-- Right Side Icons -->
                <div class="flex items-center gap-3 md:gap-4">
                    <button
                        class="bg-[#2B1B59] hover:bg-[#1a0f3d] text-white px-3.5 md:px-4 py-2 rounded-full text-xs md:text-sm font-medium transition shadow-md">
                        + Upload
                    </button>
                    <div class="flex items-center">
                        <img class="w-8 h-8 md:w-9 md:h-9 rounded-full border-2 border-indigo-100"
                            src="https://ui-avatars.com/api/?name=User" alt="user photo">
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar',
    methods: {
        toggleMobileSidebar() {
            window.dispatchEvent(new CustomEvent('toggle-mobile-sidebar'));
        }
    }
}
</script>