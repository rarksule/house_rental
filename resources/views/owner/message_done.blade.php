<x-app-layout>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper pt-30 radius-20">
                    <nav class="navbar navbar-expand navbar-light bg-light">
                        <div class="user-scroll w-100 py-2 overflow-auto text-nowrap">
                            @for ($i = 0; $i <= 5; $i++)
                                <div class="user-item d-inline-block float-none text-center me-3 ms-1">
                                    <img src="https://placehold.co/60x60" class="rounded-circle" alt="User">
                                    <div class="small">User {{$i}}</div>
                                </div>
                            @endfor
                        </div>
                    </nav>

                    <div class="container-fluid vh-100 d-flex flex-column" style="max-height: calc(100vh - 120px);">
                        <div class="flex-grow-1 overflow-auto p-3">
                        @for($i = 0; $i < 1; $i++)
                            <div class="d-flex mb-3">
                                <img src="https://placehold.co/40x40" class="rounded-circle me-2" alt="User">
                                <div>
                                    <div class="bg-light p-3 rounded">
                                        <strong>User 1:</strong> Hello there!
                                    </div>
                                    <small class="text-muted">10:30 AM</small>
                                </div>
                            </div>

                            <div class="d-flex mb-3 justify-content-end">
                                <div class="text-end">
                                    <div class="bg-primary text-white p-3 rounded">
                                        <strong>You:</strong> Hi! How are you?
                                    </div>
                                    <small class="text-muted">10:32 AM</small>
                                </div>
                                <img src="https://placehold.co/40x40" class="rounded-circle ms-2" alt="You">
                            </div>
                            @endfor
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
    </div>
</x-app-layout>