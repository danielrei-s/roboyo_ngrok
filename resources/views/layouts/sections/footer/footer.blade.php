<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-row-reverse">
    <div class="mb-2 mb-md-0 ">
      @if (session()->has('success'))   {{--Puxar msg de registerbasic.php para manter utilizador informado --}}
      <div x-data="{show: true}"
          x-init="setTimeout(() => show = false, 5000)"  
          x-show="show">          {{-- Usa alpine.js para apanhar a mensagem anterior em 5segs.--}} 
          <div id="page-notifications-container" class="container-bottom-right" style="max-width: 360px;">
            <div class="page-notifications-body page-notifications-light page-notifications-success" notificationid="pn6" style="max-width: 360px; height: 67px; margin-top: 10px;">
              <div class="page-notifications-left">✓</div>
              <div class="page-notifications-right">
                <h1>Success</h1>
                <div class="page-notifications-close">×</div>
                <h2>{{ session('success') }}</h2>
                <div class="page-notifications-timer"></div>
                <h3>{{date('h:i A')}}</h3>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
        Roboyo

          <script>

            var notifications = new PageNotifications({width:360,position:'bottom-right'})

            function pushInfo() {
                notifications.push("Information notification","Longer information notification.</br> ... </br> ... </br> ...","info",7000);
            }
            function pushSuccess() {
                notifications.push("Success ","{{ session('success') }}","success",3000);
            }
            function pushWarning() {
                notifications.push("Warning notification","Warning","warning",5000);
            }
            function pushError() {
                notifications.push("Error notification","Error notification for showing for 3 seconds.","error",3000);
            }
            function closeAll() {
                notifications.closeAll();
            }
            // Get the close button element
            const closeButton = document.querySelector('.page-notifications-close');

            // Get the parent element of the notification
            const notificationContainer = document.querySelector('#page-notifications-container');

            // Add a click event listener to the close button
            closeButton.addEventListener('click', function() {
              // Remove the parent element of the notification from the DOM
              notificationContainer.remove();
            });

          </script>
  </div>
</footer>
<!--/ Footer-->

