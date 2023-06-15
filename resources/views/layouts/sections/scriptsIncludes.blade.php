<!-- laravel style -->
<script src="{{ secure_asset('assets/vendor/js/helpers.js') }}"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ secure_asset('assets/js/config.js') }}"></script>

{{-- <!-- JSON 2 -->
<script src="{{ asset('assets/js/json2.js') }}"></script> --}}

<!-- beautify ignore:end -->

{{-- <script src="{{ asset('assets/vendor/js/jquery.tabledit.js') }}" async></script> --}}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');

</script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Table Edit -->
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

<!-- Chamada de Alphine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>

<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- <!-- Chamada de notifications.js -->
<script src="{{ asset('js/page-notifications.js') }}"></script>


<!-- chamar DELETE -->
<script src="{{ asset('js/delete-confirmation.js') }}"></script> --}}

<script>
  const deleteButtons = document.querySelectorAll('.delete-user');
  deleteButtons.forEach(button => {
    button.addEventListener('click', (event) => {
      if (!confirmDelete()) {
        event.preventDefault();
      }
    });
  });


</script>

<!-- Block Confirmation -->
<script>
  function confirmBlock() {
      if (confirm("Are you sure you want to block/unblock this user?")) {
          document.getElementById("block-form").submit();
      }
      return false;
  }
</script>

<!-- Force Password Confirmation -->
<script>
  function confirmpasswordReset(event) {
    if (!confirm('Are you sure you want to force a password reset for this user?')) {
        event.preventDefault(); // Prevent form submission if user cancels
    }
}

</script>

<!-- Script to order table alpha-->
<script>
  function sortTable(table, column) {
    let rows = Array.from(table.tBodies[0].rows);

    rows.sort((a, b) => {
      let aValue = a.cells[column].textContent.trim();
      let bValue = b.cells[column].textContent.trim();
      return aValue.localeCompare(bValue, undefined, { numeric: true, sensitivity: 'base' });
    });

    rows.forEach(row => table.tBodies[0].appendChild(row));
  }

  document.querySelectorAll('.sortable').forEach(header => {
    header.addEventListener('click', () => {
      let table = header.closest('table');
      let columnIndex = Array.from(header.parentNode.cells).indexOf(header);
      sortTable(table, columnIndex);
    });
  });
</script>




