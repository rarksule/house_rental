
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
<<<<<<< HEAD
                        <form action="{{ route('owner.storeHouse') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(isset($house) && $house->id)
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $house->id }}">
                            @endif

=======
                        <form action="{{route('owner.storeHouse')}}" method="post" id="houseForm" novalidate enctype="multipart/form-data">
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                            <!-- Basic Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="mb-3 mt-3">
<<<<<<< HEAD
                                        <label for="propertyName" class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                                            id="propertyName" name="title" placeholder="Title (Name)"
                                            value="{{ old('title', $house->title ?? '') }}" required>
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="shortDescription" class="form-label fw-bold">Property location</label>
                                        <input type="text" class="form-control form-control-lg @error('location') is-invalid @enderror"
                                            placeholder="Property location" id="shortDescription" name="location"
                                            value="{{ old('location', $house->location ?? '') }}">
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="propertyContent" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="propertyContent" name="description" rows="6" required>{{ old('description', $house->description ?? '') }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
=======
                                        <label for="name" class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control form-control-lg" id="name"
                                            name="name" placeholder="Title (Name)"
                                            value="{{ old('name', $house->name ?? '') }}" required>
                                        <div class="invalid-feedback">Please provide a title for the house.</div>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="address" class="form-label fw-bold">house
                                        address</label>
                                        <input type="text" class="form-control form-control-lg" name="address"
                                            placeholder="house address" id="address"
                                            value="{{ old('address', $house->location ?? '') }}"
                                            required>
                                        <div class="invalid-feedback">Please specify the house location.</div>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" id="description" name="description"
                                            rows="6"
                                            required>{{ old('description', $house->description ?? '') }}</textarea>
                                        <div class="invalid-feedback">Please provide a description of the house.
                                        </div>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                    </div>
                                    <h5 class="mt-3 fw-bold">Upload Images</h5>

                                    <!-- Hidden Dropzone preview container -->
                                    <div type="hidden" id="hidden-preview-container" name="images[]" style="display: none;" multiple></div>

                                    <!-- Drag and drop area -->
                                    <div class="dropzone border rounded p-4 text-center" id="myDropzone">
                                        <div class="dz-message needsclick">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                            <h5>Drop files here or click to upload</h5>
                                            <span class="text-muted">Upload up to 5 images (Max size: 2MB each)</span><br>
                                            <span>or</span><br>
                                            <input type="file" id="imageUpload" name="images[]" multiple accept="image/*" style="display: none;">
                                            <button type="button" class="btn btn-primary mt-2" onclick="document.getElementById('imageUpload').click()">Select File</button>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Please provide a images.
                                        </div>

                                    <!-- Display existing images for update -->
                                    @if(isset($house) && $house->images)
                                    <div class="mt-3">
                                        <h6>Current Images:</h6>
                                        <div class="row">
                                            @foreach(json_decode($house->images) as $image)
                                            <div class="col-md-2 mb-2">
                                                <img src="{{ asset('storage/'.$image) }}" class="img-thumbnail" width="100">
                                                <button type="button" class="btn btn-sm btn-danger mt-1 remove-image" data-image="{{ $image }}">Remove</button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Image preview container -->
                                    <div class="mt-4" id="imagePreviewContainer" style="display: none;">
<<<<<<< HEAD
                                        <h6 class="mb-3">New Images Preview:</h6>
                                        <div class="row flex-nowrap overflow-md-visible" id="imagePreviews"></div>
=======
                                        <h6 class="mb-3">Preview:</h6>
                                        <div class="row flex-nowrap overflow-md-visible" id="imagePreviews">
                                            <!-- Preview items will be added dynamically here -->
                                        </div>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                    </div>
                                    @error('images')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Location Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="latitude" class="form-label fw-bold">Latitude</label>
<<<<<<< HEAD
                                            <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                                id="latitude" name="latitude" placeholder="Ex: 1.462260"
                                                value="{{ old('latitude', $house->latitude ?? '') }}">
                                            @error('latitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="#"><small class="text-muted">Go here to get Latitude from address</small></a>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label fw-bold">Longitude</label>
                                            <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                                id="longitude" name="longitude" placeholder="Ex: 103.812530"
                                                value="{{ old('longitude', $house->longitude ?? '') }}">
                                            @error('longitude')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <a href="#"><small class="text-muted">Go here to get Longitude from address.</small></a>
=======
                                            <input type="text" class="form-control" id="latitude" name="latitude"
                                                placeholder="Ex: 1.462260"
                                                value="{{ old('latitude', $house->latitude ?? '') }}" required>
                                            <div class="invalid-feedback">Please provide the latitude coordinate.</div>
                                            <a href=""><small class="text-muted">Go here to get Latitude from
                                                    address</small></a>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude" class="form-label fw-bold">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude"
                                                placeholder="Ex: 103.812530"
                                                value="{{ old('longitude', $house->longitude ?? '') }}" required>
                                            <div class="invalid-feedback">Please provide the longitude coordinate.</div>
                                            <a href=""><small class="text-muted">Go here to get Longitude from
                                                    address.</small></a>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                        </div>
                                    </div>

                                    <h5 class="fw-bold mt-4 mb-3">house Details</h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
<<<<<<< HEAD
                                            <label for="bedrooms" class="form-label fw-bold">Number rooms</label>
                                            <input type="number" class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms" min="0"
                                                value="{{ old('bedrooms', $house->bedrooms ?? '') }}">
                                            @error('bedrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="square" class="form-label fw-bold">Square (m²)</label>
                                            <input type="number" class="form-control @error('square') is-invalid @enderror"
                                                id="square" name="square" min="0"
                                                value="{{ old('square', $house->square ?? '') }}">
                                            @error('square')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
=======
                                            <label for="rooms" class="form-label fw-bold">Number rooms</label>
                                            <input type="number" class="form-control" id="rooms" name="rooms"
                                                min="0" value="{{ old('rooms', $house->rooms ?? '') }}"
                                                required>
                                            <div class="invalid-feedback">Please specify the number of rooms.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="area" class="form-label fw-bold">area in (m²)</label>
                                            <input type="number" class="form-control" id="area" name="area" min="0"
                                                value="{{ old('area', $house->area ?? '') }}" required>
                                            <div class="invalid-feedback">Please specify the house area.</div>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3 mt-3">
                                        <div class="col-md-4">
                                            <div class="form-check">
<<<<<<< HEAD
                                                <input class="form-check-input" type="checkbox" id="water" name="water"
                                                    {{ old('water', $house->water ?? false) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="water">Tap water available</label>
=======
                                                <input class="form-check-input" type="checkbox" id="tapWater"
                                                    name="tapWater" {{ old('tapWater', isset($house->tapWater) ? 'checked' : '') }}>
                                                <label class="form-check-label" for="tapWater">Tap water
                                                    available</label>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
<<<<<<< HEAD
                                                <input class="form-check-input" type="checkbox" id="kitchen" name="kitchen"
                                                    {{ old('kitchen', $house->kitchen ?? false) ? 'checked' : '' }}>
=======
                                                <input class="form-check-input" type="checkbox" id="kitchen"
                                                    name="kitchen" {{ old('kitchen', isset($house->kitchen) ? 'checked' : '') }}>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                                <label class="form-check-label" for="kitchen">Kitchen</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
<<<<<<< HEAD
                                                <input class="form-check-input" type="checkbox" id="married" name="married"
                                                    {{ old('married', $house->married ?? false) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="married">accept married couple</label>
=======
                                                <input class="form-check-input" type="checkbox" id="acceptMarried"
                                                    name="acceptMarried" {{ old('acceptMarried', isset($house->acceptMarried) ? 'checked' : '') }}>
                                                <label class="form-check-label" for="acceptMarried">accept married
                                                    couple</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="hasDog"
                                                    name="hasDog" {{ old('hasDog', isset($house->hasDog) ? 'checked' : '') }}>
                                                <label class="form-check-label" for="hasDog">I have Dog</label>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 mt-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="price" class="form-label fw-bold">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">Birr</span>
<<<<<<< HEAD
                                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                    id="price" name="price" min="0"
                                                    value="{{ old('price', $house->price ?? '') }}">
                                                <span class="input-group-text bg-light">/Month</span>
                                                @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
=======
                                                <input type="number" class="form-control" id="price" name="price"
                                                    min="0" value="{{ old('price', $house->price ?? '') }}" required>
                                                <span class="input-group-text bg-light">/Month</span>
                                                <div class="invalid-feedback">Please specify the rental price.</div>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information Section -->
                            <div class="card mb-4 border-0 shadow-sm p-4">
                                <div class="mb-3">
                                    <label for="privateNotes" class="form-label fw-bold">Private notes</label>
<<<<<<< HEAD
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                        id="privateNotes" name="notes" rows="3">{{ old('notes', $house->notes ?? '') }}</textarea>
                                    @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Private notes are only visible to owner. It won't be shown on the frontend.</small>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="rented" name="rented"
                                        {{ old('rented', $house->rented ?? false) ? 'checked' : '' }}>
=======
                                    <textarea class="form-control" id="privateNotes" name="privateNotes"
                                        rows="3">{{ old('privateNotes', $house->privateNotes ?? '') }}</textarea>
                                    <small class="text-muted">Private notes are only visible to owner. It wont be shown
                                        on the frontend.</small>
                                </div>
                                <div class="row mb-3 justify-content-between">
                                <div class="form-check form-switch ">
                                    <input class="form-check-input" type="checkbox" id="rented" name="rented" value="{{ old('rented', isset($house->rented) ? 'checked' : '') }}">
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
                                    <label class="form-check-label fw-bold h5" for="rented">Rented</label>
                                </div>
                                @if(old('rented', isset($house->rented)))
                                <div class="mb-3 mt-3">
                                        <label for="address" class="form-label fw-bold">house
                                        address</label>
                                        <input type="date" class="form-control form-control-lg" name="payment_date"
                                            placeholder="payment_date" id="payment_date"
                                            value="{{ old('payment_date', $house->payment_date ?? '') }}"
                                            required>
                                        <div class="invalid-feedback">Please specify payment Date.</div>
                                    </div>
                                @endif
                                
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
<<<<<<< HEAD


    <script>
        // Image upload preview functionality
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            const previewsContainer = document.getElementById('imagePreviews');

            // Clear previous previews
            previewsContainer.innerHTML = '';

            if (this.files.length > 0) {
                previewContainer.style.display = 'block';

                // Limit to 5 images
                const files = Array.from(this.files).slice(0, 5);

                files.forEach(file => {
                    if (!file.type.match('image.*')) {
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.className = 'col-md-2 mb-2';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';
                        img.width = 100;

                        previewDiv.appendChild(img);
                        previewsContainer.appendChild(previewDiv);
                    }

                    reader.readAsDataURL(file);
                });
            } else {
                previewContainer.style.display = 'none';
            }
        });

        // Remove existing image
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                const image = this.getAttribute('data-image');
                if (confirm('Are you sure you want to remove this image?')) {
                    // Create hidden input to track removed images
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'removed_images[]';
                    input.value = image;
                    document.querySelector('form').appendChild(input);

                    // Remove the image element
                    this.parentElement.remove();
                }
            });
        });
    </script>
</x-app-layout>
<!-- <script>
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
    </script> -->
<!--  -->
=======
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{ asset('assets/js/house-form.js') }}"></script> 
    
</x-app-layout>
>>>>>>> 7faadffd94f8575971500d6ea936bd2dace4d55a
