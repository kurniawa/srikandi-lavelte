<script>
    import Autocomplete from "@/components/Autocomplete.svelte";
    import WeightPrice from "@/components/WeightPrice.svelte";
    import MainLayout from "@/layouts/MainLayout.svelte";
    import { useForm } from '@inertiajs/svelte';

    // 1. Tangkap props yang dikirim dari Laravel Controller via Inertia
    let { category = '', ornament_types = [], ornament_variants = [], gold_colors = [], trays = [], conditions = [], age_ranges = [], brands = [] } = $props();
    // 2. Definisikan state form utama
    let ornamentType = $state("");
    let goldColor = $state("");
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
    let plate = $state(0);
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
            <label for="category">Kategori</label>
            <input type="text" id="category" name="category" value={category} readonly class="p-1 border rounded" />
        </div> -->

        <!-- ORNAMENT TYPE -->
        <div class="grid gap-1">
            <label for="ornament_type">Tipe Ornament</label>
            <select id="ornament_type" bind:value={ornamentType} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Tipe Ornament</option>
                {#each ornament_types as type}
                    <option value="{type.slug}">{type.nama}</option>
                {/each}
            </select>
        </div>

        <!-- GOLD COLOR -->
        <div class="grid gap-1">
            <label for="gold_color">Warna Emas</label>
            <select id="gold_color" bind:value={goldColor} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Warna Emas</option>
                {#each gold_colors as color}
                    <option value="{color.slug}">{color.nama}</option>
                {/each}
            </select>
        </div>

        <Autocomplete
            label="Varian Ornament"
            placeholder={ornamentType ? "Ketik untuk mencari varian..." : "Pilih tipe ornament terlebih dahulu"}
            disabled={!ornamentType}
            options={baseVariants}
            parentTrigger={ornamentType}
            onChange={handleVariantChange}
        />

        <div class="grid gap-1">
            <label for="extras">Extras(opt.)</label>
            <input type="text" id="extras" name="extras" bind:value={extras} class="p-1 border rounded" />
        </div>

    </div>

    <WeightPrice bind:weight bind:weightPrice bind:totalPrice />

    <div class="grid gap-1 mt-2 border border-yellow-300 bg-yellow-100 p-1 rounded">
        <div class="grid gap-1">
            <label for="short_name">Nama Pendek</label>
            <input type="text" id="short_name" name="short_name" bind:value={shortname} class="p-1 border rounded" />
        </div>
        <div class="grid gap-1">
            <label for="long_name">Nama Panjang</label>
            <input type="text" id="long_name" name="long_name" bind:value={longname} class="p-1 border rounded" />
        </div>
    </div>

    <!-- ATTRIBUTES -->
    <div class="mt-4 rounded p-1 border border-sky-300 bg-sky-100 relative">
        <h6 class="absolute -top-2 left-2 bg-white font-bold text-sky-400 px-1">Attributes</h6>
        <div class="grid grid-cols-12 gap-1 mt-3">
            <div class="col-span-5 grid gap-1">
                <label for="age_range">Rentang Usia</label>
                <select id="age_range" bind:value={ageRange} class="border border-slate-300 rounded w-full p-1">
                    <option value="" disabled>Pilih Rentang Usia</option>
                    {#each age_ranges as range}
                        <option value="{range.slug}">{range.nama}</option>
                    {/each}
                </select>
            </div>

            <div class="col-span-4 grid gap-1">
                <label for="condition">Kondisi</label>
                <select id="condition" bind:value={condition} class="border border-slate-300 rounded w-full p-1">
                    <option value="" disabled>Pilih Kondisi</option>
                    {#each conditions as cond}
                        <option value="{cond.slug}">{cond.name}</option>
                    {/each}
                </select>
            </div>

            <div class="col-span-3 grid gap-1">
                <label for="size">Size (mm)</label>
                <input type="number" id="size" name="size" step="1" placeholder="Size (mm)" bind:value={size} class="p-1 border border-slate-300 rounded w-full" />
            </div>

            <div class="col-span-12 grid grid-cols-12 gap-1 mt-1">
                <div class="col-span-2 grid gap-1">
                    <label for="plate">Jml.Pelat</label>
                    <input type="number" id="plate" name="plate" step="1" placeholder="Jumlah Pelat" bind:value={plate} class="p-1 border border-slate-300 rounded w-full" />
                </div>
                <div class="col-span-5">
                    <Autocomplete
                        label="Merk"
                        placeholder="Ketik untuk mencari merk..."
                        options={brands}
                        onChange={(item) => brand = item.slug}
                    />
                </div>
                <div class="col-span-5">
                    <Autocomplete
                        label="Nampan"
                        placeholder="Ketik untuk mencari nampan..."
                        options={trays}
                        onChange={(item) => tray = item.slug}
                    />
                </div>
            </div>
        </div>
    </div>

    <!-- ACCESSORIES -->

    <div class="grid grid-cols-2 gap-1 mt-4 rounded p-1 border border-violet-300 bg-violet-100 relative">
        <h6 class="absolute -top-2 left-2 bg-white font-bold text-violet-400 px-1">Accessories</h6>

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
