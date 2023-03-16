<!-- laravel style -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- beautify ignore:end -->

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

<!-- Chamada de Alphine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>


<!-- chamar DELETE -->
<script src="{{ asset('js/delete-confirmation.js') }}"></script>

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
