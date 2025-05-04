<x-app-layout>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper pt-30 radius-20">
                    <div class="container-fluid px-4 py-3">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="page-title-box d-sm-flex align-items-center justify-content-between border-bottom mb-20">
                                    <div class="page-title-left">
                                        <h5 class="mb-sm-0 ms-1 fw-bold">{{ $pageTitle }}</h5>
                                    </div>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                                    title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
                                            <li class="breadcrumb-item">{{ __('Profile') }}</li>
                                            <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{route("owner.storeHouse")}}", method="post" >
                            <!-- Basic Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="mb-3 mt-3">
                                        <label for="propertyName" class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control form-control-lg" id="propertyName"
                                            placeholder="Title (Name)" required>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="shortDescription" class="form-label fw-bold">
                                            Property location
                                        </label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Property location" id="shortDescription">
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="propertyContent" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" id="propertyContent" rows="6"
                                            required></textarea>
                                    </div>
                                    <h5 class="mt-3 fw-bold">Upload Images</h5>
                                    <!-- Hidden Dropzone preview container -->
                                    <div id="hidden-preview-container" style="display: none;"></div>

                                    <!-- Drag and drop area -->
                                    <div class="dropzone border rounded p-4 text-center" id="myDropzone">
                                        <div class="dz-message needsclick">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                            <h5>Drop files here or click to upload</h5>
                                            <span class="text-muted">Upload up to 5 images (Max size: 2MB
                                                each)</span><br>
                                            <span>or</span><br>
                                            <button type="button" class="btn btn-primary mt-2">Select File</button>
                                        </div>
                                    </div>

                                    <!-- Image preview container -->
                                    <div class="mt-4" id="imagePreviewContainer" style="display: none;">
                                        <h6 class="mb-3">Preview:</h6>
                                        <div class="row flex-nowrap  overflow-md-visible" id="imagePreviews">
                                            <!-- Preview items will be added dynamically here -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Location Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="latitude" class="form-label fw-bold">Latitude</label>
                                            <input type="text" class="form-control" id="latitude"
                                                placeholder="Ex: 1.462260">
                                            <a href=""><small class="text-muted">Go here to get Latitude from
                                                    address</small></a>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label fw-bold">Longitude</label>
                                            <input type="text" class="form-control" id="longitude"
                                                placeholder="Ex: 103.812530">
                                            <a href=""><small class="text-muted">Go here to get Longitude from
                                                    address.</small></a>
                                        </div>
                                    </div>

                                    <h5 class="fw-bold mt-4 mb-3">Property Details</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="bedrooms" class="form-label fw-bold">Number rooms</label>
                                            <input type="number" class="form-control" id="bedrooms">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="square" class="form-label fw-bold">Square (m²)</label>
                                            <input type="number" class="form-control" id="square">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3 mt-3">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="wifi">
                                                <label class="form-check-label" for="wifi">Tap water available</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="parking">
                                                <label class="form-check-label" for="parking">Kitchen</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pool">
                                                <label class="form-check-label" for="pool">accept married couple</label>
                                            </div>
                                        </div>
                                        <!-- More features here -->
                                    </div>
                                    <div class="row g-3 mt-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="price" class="form-label fw-bold">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">Birr</span>
                                                <input type="number" class="form-control" id="price">
                                                <span class="input-group-text bg-light">/Month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="mb-3">
                                    <label for="privateNotes" class="form-label fw-bold">Private notes</label>
                                    <textarea class="form-control" id="privateNotes" rows="3"></textarea>
                                    <small class="text-muted">Private notes are only visible to owner. It won't be
                                        shown on the frontend.</small>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="renewAuto">
                                    <label class="form-check-label fw-bold h5" for="renewAuto">Rented</label>
                                </div>
                            </div>

                            <!-- Footer Buttons -->
                            <div class="d-flex justify-content-end mb-5">
                                <div>
                                    <button type="submit" class="btn btn-primary px-4 py-2 me-2">Save</button>
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Handle form submission to include the Dropzone file
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault();

            // If you want to process the Dropzone file with the form
            if (myDropzone.files.length > 0) {
                // Manually add the file to the form data
                const formData = new FormData(this);
                formData.append('file', myDropzone.files[0]);

                // Submit the form with AJAX or other method
                fetch(this.action, {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    // Handle response
                });
            } else {
                // Submit the form normally if no file
                this.submit();
            }
        });
    </script>
</x-app-layout>