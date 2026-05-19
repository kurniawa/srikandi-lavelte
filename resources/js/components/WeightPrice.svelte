<script>
    /**PERHITUNGAN BERAT, HARGA, DAN TOTAL */
    let { weight = '', weightPrice = '', totalPrice = '' } = $props();

    let lastEdited = $state(null);

    // =========================
    // FORMATTER
    // =========================

    function formatIndonesia(value, decimals = null) {
        if (value === '' || value === null || value === undefined) {
            return '';
        }

        const number =
            typeof value === 'number'
                ? value
                : parseIndonesiaNumber(value);

        if (isNaN(number)) return '';

        const options = {};

        if (decimals !== null) {
            options.minimumFractionDigits = decimals;
            options.maximumFractionDigits = decimals;
        }

        return new Intl.NumberFormat('id-ID', options).format(number);
    }

    function parseIndonesiaNumber(value) {
        if (!value) return 0;

        // hapus semua selain angka , .
        value = value.replace(/[^\d.,]/g, '');

        // hapus titik ribuan
        value = value.replace(/\./g, '');

        // ubah koma menjadi titik desimal
        value = value.replace(',', '.');

        return parseFloat(value) || 0;
    }

    // =========================
    // CURSOR SAFE FORMATTER
    // =========================

    function handleFormattedInput(event, decimals, callback) {
        const input = event.target;

        const selectionStart = input.selectionStart ?? 0;

        // simpan jumlah digit sebelum cursor
        // const rawBeforeCursor = input.value
        //     .slice(0, selectionStart)
        //     .replace(/[^\d]/g, '').length;

        // hanya angka koma titik
        let clean = input.value.replace(/[^\d.,]/g, '');

        // hanya 1 koma
        const commaParts = clean.split(',');

        if (commaParts.length > 2) {
            clean =
                commaParts[0] +
                ',' +
                commaParts.slice(1).join('');
        }

        // limit desimal
        if (clean.includes(',')) {
            const [intPart, decPart] = clean.split(',');

            clean =
                intPart +
                ',' +
                (decPart ?? '').slice(0, decimals);
        }

        // const numericValue = parseIndonesiaNumber(clean);

        let formatted = clean;

        if (clean !== '' && clean !== ',') {
            const hasComma = clean.includes(',');
            const [intPart, decPart = ''] = clean.split(',');

            formatted = formatIndonesia(
                parseIndonesiaNumber(intPart),
                null
            );

            if (hasComma) {
                formatted += ',' + decPart;
            }
        }

        // restore cursor
        const originalValue = input.value;

        input.value = formatted;

        requestAnimationFrame(() => {
            const beforeCursor = originalValue.slice(0, selectionStart);

            // hitung digit + koma sebelum cursor
            const normalizedBeforeCursor = beforeCursor.replace(/[^\d,]/g, '');

            let normalizedFormatted = '';
            let cursorPos = formatted.length;

            for (let i = 0; i < formatted.length; i++) {
                const char = formatted[i];

                if (/[\d,]/.test(char)) {
                    normalizedFormatted += char;
                }

                if (normalizedFormatted === normalizedBeforeCursor) {
                    cursorPos = i + 1;
                    break;
                }
            }

            input.setSelectionRange(cursorPos, cursorPos);
        });

        callback?.();
    }

    // =========================
    // CALCULATION
    // =========================

    function recalculateFromWeightPrice() {
        const w = parseIndonesiaNumber(weight);
        const wp = parseIndonesiaNumber(weightPrice);

        const total = Math.round(w * wp);

        totalPrice = total
            ? formatIndonesia(total, 0)
            : '';
    }

    function recalculateFromTotalPrice() {
        const w = parseIndonesiaNumber(weight);
        const total = parseIndonesiaNumber(totalPrice);

        if (!w || w <= 0) {
            weightPrice = '';
            return;
        }

        const wp = Math.round(total / w);

        weightPrice = wp
            ? formatIndonesia(wp, 0)
            : '';
    }

    // =========================
    // INPUT HANDLERS
    // =========================

    function onWeightInput(event) {
        handleFormattedInput(event, 2, () => {
            weight = event.target.value;

            if (lastEdited === 'total_price') {
                recalculateFromTotalPrice();
            } else {
                recalculateFromWeightPrice();
            }
        });
    }

    function onWeightPriceInput(event) {
        lastEdited = 'weight_price';

        handleFormattedInput(event, 0, () => {
            weightPrice = event.target.value;

            recalculateFromWeightPrice();
        });
    }

    function onTotalPriceInput(event) {
        lastEdited = 'total_price';

        handleFormattedInput(event, 0, () => {
            totalPrice = event.target.value;

            recalculateFromTotalPrice();
        });
    }
</script>

<div class="grid grid-cols-12 gap-1 mt-1">
    <div class="col-span-2 grid gap-1">
        <label for="weight">Berat :</label>
        <input
            type="text"
            id="weight"
            name="weight"
            bind:value={weight}
            oninput={onWeightInput}
            inputmode="decimal"
            class="p-1 border rounded w-full"
        />
    </div>
    <div class="col-span-4 grid gap-1">
        <label for="weight_price">Harga/g :</label>
        <input
            type="text"
            id="weight_price"
            name="weight_price"
            bind:value={weightPrice}
            oninput={onWeightPriceInput}
            inputmode="numeric"
            class="p-1 border rounded w-full"
        />
    </div>
    <div class="col-span-6 grid gap-1">
        <label for="total_price">Harga Total :</label>
        <input
            type="text"
            id="total_price"
            name="total_price"
            bind:value={totalPrice}
            oninput={onTotalPriceInput}
            inputmode="numeric"
            class="p-1 border rounded w-full"
        />
    </div>
    </div>
