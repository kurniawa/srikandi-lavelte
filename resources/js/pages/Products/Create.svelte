<script>
    import Autocomplete from "@/components/Autocomplete.svelte";
    import WeightPrice from "@/components/WeightPrice.svelte";
    import MainLayout from "@/layouts/MainLayout.svelte";
    import { useForm } from '@inertiajs/svelte';

    // 1. Tangkap props yang dikirim dari Laravel Controller via Inertia
    let { category = '', ornament_types = [], ornament_variants = [], gold_colors = [], trays = [], conditions = [] } = $props();
    // 2. Definisikan state form utama
    let ornamentType = $state("");
    let selectedVariant = $state(null);
    let extras = $state("");
    let weight = $state("");
    let weightPrice = $state("");
    let totalPrice = $state("");
    let shortname = $state("");
    let longname = $state("");
    let condition = $state("");
    let mark = $state("");
    let ageRange = $state("");
    let tray = $state("");
    let size = $state("");
    let brand = $state("");
    let plate = $state("");
    let gemstone = $state([]);

    // 3. Gunakan $derived untuk memfilter varian dasar berdasarkan tipe yang dipilih
    let baseVariants = $derived(
        ornament_variants.filter(variant => variant.parent_slug === ornamentType)
    );

    // 4. Gunakan $effect untuk memantau jika Tipe berubah, maka reset data Varian di parent
    $effect(() => {
        if (ornamentType) {
            selectedVariant = null;
        }
    });

    // 5. Tangkap data dari Autocomplete
    function handleVariantChange(variant) {
        selectedVariant = variant;

        // Ganti console.log biasa dengan $state.snapshot() agar tidak memicu warning proxy
        console.log("Varian yang dipilih parent:", $state.snapshot(selectedVariant));
    }

    /**
     * SUBMIT
     * */

    const form = useForm({
        category: '',
        ornament_type: '',
        variant: '',
        extras: '',
        weight: '',
        weight_price: '',
        total_price: '',
        shortname: '',
        longname: '',
    });

    function submit() {
        form.category = category;
        form.ornament_type = ornamentType;
        form.variant = selectedVariant.slug;
        form.extras = extras;
        form.weight = parseIndonesiaNumber(weight);
        form.weight_price = parseIndonesiaNumber(weightPrice);
        form.total_price = parseIndonesiaNumber(totalPrice);
        form.shortname = shortname;
        form.longname = longname;

        form.post('/products');
    }

</script>
<MainLayout title="New {category}">
    <div class="grid grid-cols-2 gap-1">
        <!-- <div class="grid gap-1">
            <label for="category">Kategori :</label>
            <input type="text" id="category" name="category" value={category} readonly class="p-1 border rounded" />
        </div> -->

        <!-- ORNAMENT TYPE -->
        <div class="grid gap-1">
            <label for="ornament_type">Tipe Ornament :</label>
            <select id="ornament_type" bind:value={ornamentType} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Tipe Ornament</option>
                {#each ornament_types as type}
                    <option value="{type.slug}">{type.nama}</option>
                {/each}
            </select>
        </div>

        <!-- GOLD COLOR -->
        <div class="grid gap-1">
            <label for="gold_color">Warna Emas :</label>
            <select id="gold_color" bind:value={ornamentType} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Warna Emas</option>
                {#each gold_colors as color}
                    <option value="{color.slug}">{color.nama}</option>
                {/each}
            </select>
        </div>

        <Autocomplete
            label="Varian Ornament :"
            placeholder={ornamentType ? "Ketik untuk mencari varian..." : "Pilih tipe ornament terlebih dahulu"}
            disabled={!ornamentType}
            options={baseVariants}
            parentTrigger={ornamentType}
            onChange={handleVariantChange}
        />

        <div class="grid gap-1">
            <label for="extras">Extras(opt.) :</label>
            <input type="text" id="extras" name="extras" bind:value={extras} class="p-1 border rounded" />
        </div>

    </div>

    <WeightPrice bind:weight bind:weightPrice bind:totalPrice />

    <div class="grid gap-1 mt-1 bg-slate-200 p-1 rounded">
        <div class="grid gap-1">
            <label for="short_name">Nama Pendek :</label>
            <input type="text" id="short_name" name="short_name" bind:value={shortname} class="p-1 border rounded" />
        </div>
        <div class="grid gap-1">
            <label for="long_name">Nama Panjang :</label>
            <input type="text" id="long_name" name="long_name" bind:value={longname} class="p-1 border rounded" />
        </div>
    </div>
</MainLayout>

<!--

Ringkasan Aturan Baru Svelte 5 yang Kamu Pakai:
$props(): Menggantikan semua baris export let.
$state(): Menggantikan let namaVariabel biasa untuk data yang sifatnya interaktif (bisa berubah).
$derived(): Menggantikan $: nama = ... ketika kamu ingin membuat variabel baru yang nilainya otomatis menghitung dari variabel lain.
$effect(): Menggantikan $: if (kondisi) { ... } untuk menjalankan efek samping (seperti mereset data) ketika suatu state berubah.
$state.snapshot(): Membuka bungkus data Proxy saat kamu ingin melakukan inspeksi data asli di fungsi non-reaktif seperti console.log.

-->
