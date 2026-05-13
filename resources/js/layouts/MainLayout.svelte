<script>
    import DropdownMenu from '@/components/DropdownMenu.svelte';
    import { Link, router } from '@inertiajs/svelte';

    // Terima data title dari parent jika diperlukan
    export let title = '';

    // ambil gambar ring-300x300.jpg dari public/images/icons
    const ringIcon = '/images/icons/ring-300x300.jpg';

    // Data menu dinamis
    const userMenus = [
        { type: 'link', label: 'New Product', link: '/products/choose_category' },
        { type: 'link', label: 'Pengaturan', link: '/settings' },
        { type: 'action', label: 'Keluar', action: 'logout' }
    ];

    function handleMenuClick(item) {
        console.log('Menu dipilih:', item.label);
        // Logika Inertia kamu di sini...
        if (item.action === 'logout') {
            router.post('/logout');
        } else if (item.link) {
            router.visit(item.link);
        }
    }
</script>

<div class="min-h-screen bg-gray-100 text-xs">
    <!-- Navigation Bar -->
    <nav class="flex justify-between items-center bg-white border-b border-gray-200 shadow-sm">
        <!-- Logo / Brand -->
        <!-- <div class="shrink-0 flex items-center">
        <Link href="/" class="text-xl font-bold text-indigo-600">
            MyApps
        </Link>
        </div> -->

        <!-- Menu Kanan (Desktop) -->
        <!-- <div class="flex items-center gap-4">
        <Link href="/dashboard" class="text-gray-600 hover:text-gray-900 px-3 py-2 text-sm font-medium">
            Dashboard
        </Link> -->

        <div class="ml-2">
            <Link href="/" class="">
                <img src={ringIcon} alt="Ring Icon" class="w-8 h-8 rounded-full object-cover">
            </Link>
        </div>
        <div></div>
        <!-- Memanggil Komponen Dropdown -->
        <DropdownMenu menuItems={userMenus} onSelect={handleMenuClick}/>
        <!-- </div> -->
    </nav>

    <!-- Page Content -->
    <main class="mt-1 bg-white w-full p-1">
        <!-- Tampilkan title jika ada  -->
        {#if title}
            <h1 class="text-lg text-yellow-600 font-bold mb-4 py-1 px-2 rounded shadow drop-shadow inline-block">{title}</h1>
        {/if}
        <!-- Slot ini akan diisi oleh konten dari halaman masing-masing -->
        <slot />
    </main>
</div>
