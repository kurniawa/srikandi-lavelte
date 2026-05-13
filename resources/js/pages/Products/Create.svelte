<script>
    import Autocomplete from "@/components/Autocomplete.svelte";
    import MainLayout from "@/layouts/MainLayout.svelte";

    // 1. Tangkap props yang dikirim dari Laravel Controller via Inertia
    let { category = '', ornament_types = [], ornament_variants = [] } = $props();
    // 2. Definisikan state form utama
    let ornamentType = $state("");
    let selectedVariant = $state(null);
    let extra = $state("");
    let weight = $state("");
    let weightPrice = $state("");
    let weightPriceR = $state("");
    let totalPrice = $state("");
    let totalPriceR = $state("");
    let shortname = $state("");
    let longname = $state("");
    let isError = $state(false);
    let errorMessageOnCalculating = $state("");

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
     * 6. Gunakan $effect untuk memantau berat, harga per gram, dan varian untuk menghitung harga total secara otomatis
     * Semua berat dibulatkan maksimal 2 angka di belakang koma.
     * Semua harga akan dibulatkan tanpa koma
    */
    $effect(() => {
        // tidak boleh mengetik weight, weightPrice dan totalPrice selain angka dan titik, koma dan lainnya akan dihapus secara otomatis
        if (weight) {
            weight = weight.toString().replace(/[^0-9.,]/g, "");
        }
        if (weightPrice) {
            weightPrice = weightPrice.toString().replace(/[^0-9.,]/g, "");
            // hilangkan semua titik dan koma dari input harga untuk memastikan hanya angka yang tersisa
            weightPriceR = parseFloat(weightPrice.toString().replace(/[\.,]/g, "")).toFixed(0);
        }
        if (totalPrice) {
            totalPrice = totalPrice.toString().replace(/[^0-9.,]/g, "");
        }
        // kalau weight dan weightPriceR tidak numerik atau kosong, totalPrice akan direset ke string kosong
        if (isNaN(weight) || isNaN(weightPriceR) || weight === "" || weightPriceR === "") {
            totalPriceR = "";
            totalPrice = "";
            return;
        }
        // kalau totalPriceR tidak numerik, maka isError akan true dan errorMessageOnCalculating akan diisi pesan error
        if (isNaN(totalPriceR)) {
            isError = true;
            errorMessageOnCalculating = "Kesalahan format harga total.";
            return;
        }
        if (weight && weightPriceR) {
            weight = parseFloat(weight).toFixed(2);
            totalPriceR = Math.round(weight * weightPriceR);
            totalPrice = totalPriceR.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            // reset error state jika perhitungan berhasil
            isError = false;
            errorMessageOnCalculating = "";
        } else {
            totalPriceR = "";
            totalPrice = "";
        }
    });
</script>
<MainLayout title="New {category}">
    <div class="grid grid-cols-2 gap-1">
        <!-- <div class="grid gap-1">
            <label for="category">Kategori :</label>
            <input type="text" id="category" name="category" value={category} readonly class="p-1 border rounded" />
        </div> -->
        <div class="grid gap-1">
            <label for="ornament_type">Tipe Ornament :</label>
            <select id="ornament_type" bind:value={ornamentType} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Tipe Ornament</option>
                {#each ornament_types as type}
                    <option value="{type.slug}">{type.nama}</option>
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
            <label for="extra">Extra(opt.) :</label>
            <input type="text" id="extra" name="extra" bind:value={extra} class="p-1 border rounded" />
        </div>

    </div>
    <div class="grid grid-cols-12 gap-1 mt-1">
        <div class="col-span-2 grid gap-1">
            <label for="weight">Berat :</label>
            <input type="number" id="weight" name="weight" bind:value={weight} step="0.01" class="p-1 border rounded w-full" />
        </div>
        <div class="col-span-4 grid gap-1">
            <label for="weight_price">Harga/g :</label>
            <input type="number" id="weight_price" name="weight_price" bind:value={weightPrice} step="10" class="p-1 border rounded w-full" />
        </div>
        <div class="col-span-6 grid gap-1">
            <label for="total_price">Harga Total :</label>
            <input type="number" id="total_price" name="total_price" bind:value={totalPrice} step="10" class="p-1 border rounded w-full" />
        </div>
    </div>
    {#if errorMessageOnCalculating}
        <div class="mt-1 p-2 bg-red-200 text-red-800 rounded">
            {errorMessageOnCalculating}
        </div>
    {/if}
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
