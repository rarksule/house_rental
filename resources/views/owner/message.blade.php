<x-app-layout>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="page-content-wrapper pt-30 radius-20">
                    <div class="container-fluid px-4 py-3">
                        <div class="mb-4">
                            <h2 class="fw-bold mb-3">Add a property</h2>
                        </div>

                        <form class="needs-validation" novalidate>
                            <!-- Basic Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="propertyName" class="form-label fw-bold">Unique Title</label>
                                        <input type="text" class="form-control form-control-lg" id="propertyName"
                                            required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="shortDescription" class="form-label fw-bold">
                                            Neighborhood
                                        </label>
                                        <input type="text" class="form-control form-control-lg" id="shortDescription">
                                    </div>

                                    <div class="mb-3">
                                        <label for="propertyContent" class="form-label fw-bold">description</label>
                                        <textarea class="form-control" id="propertyContent" rows="6"
                                            required></textarea>
                                    </div>

                                </div>
                            </div>
                            <!-- Media Upload Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">Property Images</h5>
                                    <div id="my-dropzone"
                                        class="border-dashed p-5 text-center bg-light bg-opacity-50 rounded-3 ">
                                        <i class="bi bi-cloud-arrow-up fs-1 text-muted"></i>
                                        <p class="mt-2 mb-0 text-muted dropzone">Drop files here or click to upload.</p>
                                        <input type="file" id="fileInput" multiple style="display: none;">
                                        <div id="previewContainer" class="mt-3 d-flex flex-wrap gap-2"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Location Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold mt-4 mb-3">Property location</h5>
                                    <input type="text" class="form-control form-control-lg mb-3"
                                        placeholder="Property location">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="latitude" class="form-label fw-bold">Latitude</label>
                                            <input type="text" class="form-control" id="latitude"
                                                placeholder="Ex: 1.462260">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html" ><small class="text-muted">Go here to get Latitude from address</small></a>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label fw-bold">Longitude</label>
                                            <input type="text" class="form-control" id="longitude"
                                                placeholder="Ex: 103.812530">
                                                <a href="https://www.latlong.net/convert-address-to-lat-long.html" ><small class="text-muted">Go here to get Latitude from address</small></a>
                                        </div>
                                    </div>

                                    <h5 class="fw-bold mt-4 mb-3">Property Details</h5>
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label for="bedrooms" class="form-label fw-bold">Number bedrooms</label>
                                            <input type="number" class="form-control" id="bedrooms">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bathrooms" class="form-label fw-bold">Number bathrooms</label>
                                            <input type="number" class="form-control" id="bathrooms">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="floors" class="form-label fw-bold">Number floors</label>
                                            <input type="number" class="form-control" id="floors">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="square" class="form-label fw-bold">Square (m²)</label>
                                            <input type="number" class="form-control" id="square">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">Pricing</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="price" class="form-label fw-bold">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">$</span>
                                                <input type="number" class="form-control" id="price">
                                                <span class="input-group-text bg-light">Birr</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">Features</h5>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="wifi">
                                                <label class="form-check-label" for="wifi">Wifi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="parking">
                                                <label class="form-check-label" for="parking">Parking</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pool">
                                                <label class="form-check-label" for="pool">Swimming pool</label>
                                            </div>
                                        </div>
                                        <!-- More features here -->
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">Youtube Video Thumbnail</h5>
                                    <div class="mb-3">
                                        <button class="btn btn-outline-secondary">Choose image</button>
                                    </div>

                                    <div class="mb-3">
                                        <label for="youtubeUrl" class="form-label fw-bold">Youtube Video URL</label>
                                        <input type="url" class="form-control" id="youtubeUrl"
                                            placeholder="https://www.youtube.com/watch?v=FN7ALfpGxil">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Categories</label>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="apartment">
                                                    <label class="form-check-label" for="apartment">Apartment</label>
                                                </div>
                                            </div>
                                            <!-- More categories here -->
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="privateNotes" class="form-label fw-bold">Private notes</label>
                                        <textarea class="form-control" id="privateNotes" rows="3"></textarea>
                                        <small class="text-muted">Private notes are only visible to owner. It won't be
                                            shown on the frontend.</small>
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="renewAuto">
                                        <label class="form-check-label" for="renewAuto">Renew automatically (you will be
                                            charged again in 45 days)?</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Buttons -->
                            <div class="d-flex justify-content-between mb-5">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="saveDraft">
                                    <label class="form-check-label" for="saveDraft">Save as draft</label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary px-4 py-2 me-2">Save & Exit</button>
                                    <button type="button" class="btn btn-outline-secondary px-4 py-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#propertyContent',  // change this value according to your HTML
            plugins: ['advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'],
            toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            a_plugin_option: true,
            a_configuration_option: 400
        });
    </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
</x-app-layout>