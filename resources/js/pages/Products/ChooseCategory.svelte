<script>
    import MainLayout from "@/layouts/MainLayout.svelte";
    import { Link } from "@inertiajs/svelte";
</script>
<MainLayout title="Choose Category">
    <div class="flex gap-1">
        <Link href="/products/create?category=gold-jewelry" class="bg-linear-to-tr from-yellow-400 via-yellow-200 to-yellow-400 text-yellow-600 font-bold px-4 py-2 rounded-md hover:bg-yellow-400">Perhiasan Emas</Link>
        <Link href="/products/create?category=silver-jewelry" class="bg-linear-to-tr from-gray-400 via-gray-300 to-gray-400 text-white font-bold px-4 py-2 rounded-md hover:bg-gray-500">Perhiasan Perak</Link>
        <Link href="/products/create?category=gold-bullion" class="bg-linear-to-tr from-yellow-400 via-yellow-200 to-yellow-400 text-yellow-600 font-bold px-4 py-2 rounded-md hover:bg-yellow-500">Gold Bullion</Link>
        <Link href="/products/create?category=silver-bullion" class="bg-linear-to-tr from-gray-400 via-gray-300 to-gray-400 text-white font-bold px-4 py-2 rounded-md hover:bg-gray-500">Silver Bullion</Link>
    </div>
</MainLayout>
