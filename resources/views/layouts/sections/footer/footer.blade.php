<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      @if (session()->has('success'))   {{--Puxar msg de registerbasic.php para manter utilizador informado --}}
        <div x-data="{show: true}"
             x-init="setTimeout(() => show = false, 5000)"  
             x-show="show">          {{--   Usa alpine.js para apanhar a mensagem anterior em 5segs. --}}
          <p>{{ session('success') }}</p>
          </div>
      @endif
      Roboyo <script>
        document.write(new Date().getFullYear())
      </script>
    </div>
  </div>
</footer>
<!--/ Footer-->
