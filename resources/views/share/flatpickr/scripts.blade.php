<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- 日本語化のための追加スクリプト -->
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>

<script>
    flatpickr(document.getElementById('due_date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date(),
    })
</script>