<script>
    import { slide } from 'svelte/transition';

    // 1. Ambil props menggunakan rune $props()
    // Kita juga bisa mendefinisikan default value langsung di sini
    let {
        label = "",
        placeholder = "Ketik untuk mencari...",
        disabled = false,
        options = [],
        parentTrigger = "",
        onChange = () => {}
    } = $props();

    // 2. Buat state internal menggunakan rune $state()
    let searchQuery = $state("");
    let isDropdownOpen = $state(false);

    // 3. Gunakan $derived() untuk state yang bergantung pada state/props lain (pengganti $: filteredOptions)
    let filteredOptions = $derived(
        options.filter(item => item.name.toLowerCase().includes(searchQuery.toLowerCase()))
    );

    // 4. Gunakan $effect() untuk memantau perubahan (pengganti $: if (parentTrigger))
    $effect(() => {
        // Baris ini berjalan otomatis setiap kali parentTrigger berubah
        if (parentTrigger || parentTrigger === "") {
            searchQuery = "";
            isDropdownOpen = false;
        }
    });

    function selectOption(item) {
        searchQuery = item.name; // Isi text input dengan name yang dipilih
        isDropdownOpen = false;  // Tutup dropdown
        onChange(item);          // Kirim data objek utuh ke parent
    }
</script>
<!-- Varian Ornament (Autocomplete) -->
<div class="grid gap-1 relative">
    <label for="ornament_variant">{label}</label>

    <!-- Input Text untuk Cari Varian -->
    <input
        type="text"
        id="ornament_variant"
        placeholder={placeholder}
        disabled={disabled}
        bind:value={searchQuery}
        onfocus={() => isDropdownOpen = true}
        onblur={() => setTimeout(() => isDropdownOpen = false, 200)}
        class="p-1 border border-slate-300 rounded w-full disabled:bg-gray-100"
    />

    <!-- Daftar Pilihan / Box Suggestion Autocomplete -->
    {#if isDropdownOpen && !disabled}
        <div transition:slide={{ duration:100 }} class="absolute left-0 right-0 top-11 z-10 max-h-48 overflow-y-auto bg-white border border-gray-300 rounded shadow-lg">
        <!--
            // Membuat objek konfigurasi JavaScript biasa
            let konfigurasiTransisi = { duration: 100 };
            <div transition:slide={konfigurasiTransisi}>...</div>

            1. Arti Kurung Kurawal Pertama { ... } (Sintaks Svelte)
            Di dalam Svelte, kurung kurawal terluar digunakan untuk memberi tahu compiler bahwa kamu ingin memasukkan kode JavaScript ke dalam atribut HTML (bukan sekadar teks string biasa).
            Jika kamu menulis duration="100", Svelte membacanya sebagai teks string "100".
            Jika kamu menulis { ... }, Svelte bersiap membaca ekspresi JavaScript di dalamnya, seperti variabel, angka, fungsi, atau objek.

            2. Arti Kurung Kurawal Kedua { ... } (Objek JavaScript)
            Kurung kurawal yang ada di bagian dalam adalah simbol standar JavaScript untuk membuat sebuah Objek Literal { kunci: nilai }.
            Fungsi transisi seperti slide memerlukan konfigurasi berupa objek untuk menentukan bagaimana efek tersebut berjalan. Di dalam objek tersebut, kita mengirimkan properti duration dengan nilai 100 milidetik.

         -->
            {#if filteredOptions.length > 0}
                {#each filteredOptions as option}
                    <button
                        type="button"
                        onclick={() => selectOption(option)}
                        class="block w-full px-3 py-2 text-sm text-left hover:bg-gray-100 transition-colors"
                    >
                        {option.name}
                    </button>
                {/each}
            {:else}
                <div class="px-3 py-2 text-sm text-gray-500 italic">
                    Tidak ada pilihan yang cocok.
                </div>
            {/if}
        </div>
    {/if}
</div>
