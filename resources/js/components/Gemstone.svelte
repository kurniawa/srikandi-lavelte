<script>
    import Autocomplete from "./Autocomplete.svelte";

    // =========================
    // PROPS & STATE
    // =========================

    let {
        gemstones = [],
        gemOptions = []
    } = $props();
</script>
<div>
    {#each gemstones as gem}
        <Autocomplete
            label='Warna Mata'
            placeholder={`Ketik untuk mencari warna mata...`}
            options={gemOptions}
            onChange={(item) => {
                // Tangkap data yang dipilih dan lakukan sesuatu
                console.log(`Gemstone warna mata yang dipilih:`, item);
            }}
        />
    {/each}
</div>
