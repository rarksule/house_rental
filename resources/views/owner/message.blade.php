<x-app-layout>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper pt-30 radius-20">
                    <nav class="navbar navbar-expand navbar-light bg-light p-0 d-flex justify-content-center">
                        <div class="user-scroll w-auto py-2 overflow-auto text-nowrap">
                            <div class="d-inline-flex m-3">
                                @for ($i = 0; $i <= 5; $i++)
                                    <div class="user-item d-inline-block text-center mx-3">
                                        <img src="https://placehold.co/60x60" class="rounded-circle" alt="User">
                                        <div class="small mt-1">User {{$i}}</div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </nav>
                    <hr>
                    <div class="container-fluid vh-100 d-flex flex-column p-0" style="max-height: calc(100vh - 120px);">
                        <!-- Messages container with proper scrolling -->
                        <div class="flex-grow-1 overflow-auto p-3 d-flex flex-column">
                            <!-- This spacer pushes messages to bottom -->
                            <div class="mt-auto"></div>

                            <!-- Messages content (this will scroll) -->
                            <div>
                                @for($i = 0; $i < 1; $i++) <!-- Increased for demo -->
                                    <div class="d-flex mb-3">
                                        <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="User">
                                        <div>
                                            <div class="bg-light p-3 rounded">
                                                <strong>User 1:</strong> Message {{ $i + 1 }}
                                            </div>
                                            <small class="text-muted">10:30 AM</small>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-3 justify-content-end">
                                        <div class="text-end">
                                            <div class="bg-primary text-white p-3 rounded">
                                                <strong>You:</strong> Reply {{ $i + 1 }}
                                            </div>
                                            <small class="text-muted">10:32 AM</small>
                                        </div>
                                        <img src="https://placehold.co/40x40" class="rounded-circle ms-2" alt="You">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>



                    <div class="p-3 border-top">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message...">
                            <button class="btn btn-primary" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>