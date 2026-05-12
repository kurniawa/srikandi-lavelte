<script>
    import Autocomplete from "@/components/Autocomplete.svelte";
    import MainLayout from "@/layouts/MainLayout.svelte";

    // 1. Tangkap props yang dikirim dari Laravel Controller via Inertia
    let { category = '', ornament_types = [], ornament_variants = [] } = $props();
    // 2. Definisikan state form utama
    let ornamentType = $state("");
    let selectedVariant = $state(null);

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
</script>
<MainLayout title="New {category}">
    <div class="grid grid-cols-2 gap-1">
        <div class="grid gap-1">
            <label for="category">Category :</label>
            <input type="text" id="category" name="category" value={category} readonly class="p-1 border rounded" />
        </div>
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
