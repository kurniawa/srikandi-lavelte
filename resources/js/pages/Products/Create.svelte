<script>
    import MainLayout from "@/layouts/MainLayout.svelte";

    // Ambil data category dari controller melalui props
    export let category = '';
    export let ornament_types = [];
    export let ornament_variants = [];

    // State untuk menyimpan pilihan user
    let selectedType = "";

    // Reactive statement: Otomatis terupdate saat selectedType berubah
    $: filteredVariants = ornament_variants.filter(
        variant => variant.parent_slug === selectedType
    );

    // Reset pilihan varian jika tipe berubah
    let selectedVariant = "";
    $: if (selectedType) {
        selectedVariant = "";
        console.log('Tipe dipilih:', selectedType);
    }
</script>
<MainLayout title="New {category}">
    <div class="grid grid-cols-2 gap-3">
        <div class="grid gap-1">
            <label for="category">Category :</label>
            <input type="text" id="category" name="category" value={category} readonly class="p-1 border rounded" />
        </div>
        <div class="grid gap-1">
            <label for="ornament_type">Tipe Ornament :</label>
            <select id="ornament_type" bind:value={selectedType} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Tipe Ornament</option>
                {#each ornament_types as type}
                    <option value="{type.slug}">{type.nama}</option>
                {/each}
            </select>
        </div>
        <div class="grid gap-1">
            <label for="ornament_variant">Varian Ornament :</label>
            <select id="ornament_variant" bind:value={selectedVariant} class="border border-slate-300 rounded w-full p-1">
                <option value="" disabled>Pilih Varian Ornament</option>
                {#each filteredVariants as variant}
                    <option value="{variant.slug}">{variant.name}</option>
                {/each}
            </select>
        </div>
    </div>
</MainLayout>
