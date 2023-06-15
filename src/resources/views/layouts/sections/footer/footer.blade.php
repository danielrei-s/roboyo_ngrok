<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div
        class="{{ !empty($containerNav) ? $containerNav : 'container-fluid' }} d-flex flex-wrap justify-content-between py-2 flex-row-reverse">
        <div class="mb-2 mb-md-0 ">
            @if (session()->has('success'))
                {{-- Puxar msg de registerbasic.php para manter utilizador informado --}}
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"> {{-- Usa alpine.js para apanhar a mensagem anterior em 5segs. --}}

                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-primary" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Success!</div>
                                <small>{{ date('h:i A') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('failed'))
                <!-- Failed message section -->
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-danger" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Failed!</div>
                                <small>{{ date('h:i A') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                {{ session('failed') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('warning'))
                <!-- Warning message section -->
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 7500)" x-show="show">
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-warning" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Waning!</div>
                                <small>{{ date('h:i A') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                {{ session('warning') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
</footer>
<!--/ Footer-->
