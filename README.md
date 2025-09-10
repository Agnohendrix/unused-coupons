# unused-coupons
A website that lists unused coupons for online shopping
<a href="https://agnohendrix.github.io/unused-coupons/" target="_blank">https://agnohendrix.github.io/unused-coupons/</a>

<!-- Barra di ricerca per filtrare i coupon -->
<input type="text" id="searchBar" placeholder="Cerca per descrizione..." style="width: 100%; padding: 8px; margin-bottom: 16px; font-size: 1em;">

<details>
<summary>Mostra i coupon nascosti</summary>

<div id="couponsList">
    <details>
        <summary><strong>COUPON10</strong></summary>
        <blockquote>
            <strong>Descrizione:</strong> Sconto del 10%<br>
            <strong>Scadenza:</strong> 31/12/2024
        </blockquote>
    </details>

    <details>
        <summary><strong>FREESHIP</strong></summary>
        <blockquote>
            <strong>Descrizione:</strong> Spedizione gratuita<br>
            <strong>Scadenza:</strong> 30/09/2024
        </blockquote>
    </details>

    <details>
        <summary><strong>WELCOME5</strong></summary>
        <blockquote>
            <strong>Descrizione:</strong> 5€ di sconto sul primo ordine<br>
            <strong>Scadenza:</strong> 31/08/2024
        </blockquote>
    </details>
</div>

</details>

<script>
document.getElementById('searchBar').addEventListener('input', function() {
    const filter = this.value.toLowerCase();
    const coupons = document.querySelectorAll('#couponsList details');
    coupons.forEach(coupon => {
        const description = coupon.querySelector('blockquote').innerText.toLowerCase();
        coupon.style.display = description.includes(filter) ? '' : 'none';
    });
});
</script>
