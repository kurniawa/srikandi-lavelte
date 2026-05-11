<script>
    import { Link } from '@inertiajs/svelte';
    import { slide } from 'svelte/transition';

    let isOpen = false;

    // Terima data menu dan fungsi callback dari parent
    export let menuItems = [];
    export let onSelect = (menuItem) => {}; // Default fungsi kosong


    function toggleDropdown() {
        isOpen = !isOpen;
    }

    function selectMenuItem(menuItem) {
        isOpen = false;
        // Panggil fungsi yang dikirimkan dari parent secara langsung
        onSelect(menuItem);
    }
</script>

<div class="relative inline-block text-left">
    <!-- Tombol Trigger -->
    <button
        on:click={toggleDropdown}
        class="flex items-center justify-center px-2 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"
    >
        <!-- Ikon Panah -->
        <svg class="w-5 h-5 transition-transform {isOpen ? 'rotate-180' : ''}" xmlns="http://w3.org" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Konten Dropdown -->
    {#if isOpen}
        <div
        transition:slide={{ duration: 150 }}
        class="absolute right-0 z-10 origin-top-right bg-white rounded-md shadow-lg"
        >
            <div class="py-1">
                {#each menuItems as menuItem}
                {#if menuItem.type === 'link'}
                {#if menuItem.label === 'New Product'}
                    <Link
                        href={menuItem.link}
                        on:click={() => selectMenuItem(menuItem)}
                        class="block w-full px-4 py-2 text-sm text-left hover:bg-emerald-400 bg-emerald-300 font-bold text-white rounded whitespace-nowrap"
                    >
                        {menuItem.label}
                    </Link>
                {:else}
                    <Link
                        href={menuItem.link}
                        on:click={() => selectMenuItem(menuItem)}
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                    >
                        {menuItem.label}
                    </Link>
                {/if}
                {:else if menuItem.type === 'action'}
                    <button
                        on:click={() => selectMenuItem(menuItem)}
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                    >
                        {menuItem.label}
                    </button>
                {/if}
                {/each}
            </div>
        </div>
    {/if}
</div>
