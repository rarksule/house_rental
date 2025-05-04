

tinymce.init({
    selector: 'textarea#description',  // change this value according to your HTML
    plugins: ['advlist', 'lists', 'charmap', 'anchor', 'searchreplace', 'fullscreen', 'insertdatetime', 'wordcount'],
    toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
    a_plugin_option: true,
    a_configuration_option: 400
});
// // Initialize Dropzone
Dropzone.autoDiscover = false;

const myDropzone = new Dropzone("#myDropzone", {
    url: "#",
    paramName: "file",
    maxFiles: 5,
    acceptedFiles: "image/*",
    autoProcessQueue: false,
    previewsContainer: "#hidden-preview-container",
    init: function () {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewsContainer = document.getElementById('imagePreviews');
        const filePreviewMap = new Map();

        this.on("addedfile", function (file) {
            if (this.files.length > 5) {
                this.removeFile(file);
                return;
            }
            // Create preview element
            const previewDiv = document.createElement('div');
            previewDiv.className = 'col-auto position-relative';

            const wrapperDiv = document.createElement('div');
            wrapperDiv.className = 'dropzone-img-wrap radius-4 position-relative';

            const img = document.createElement('img');
            img.className = 'img-fluid rounded img-thumbnail';
            img.style.width = '170px';
            img.style.height = '120px';
            img.style.objectFit = 'cover';

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0';
            removeBtn.innerHTML = '&times;';
            removeBtn.onclick = () => this.removeFile(file);

            // Generate image preview using FileReader
            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);

            wrapperDiv.appendChild(img);
            wrapperDiv.appendChild(removeBtn);
            previewDiv.appendChild(wrapperDiv);
            previewsContainer.appendChild(previewDiv);
            filePreviewMap.set(file, previewDiv);

            previewContainer.style.display = 'block';
        });

        this.on("removedfile", function (file) {
            const previewDiv = filePreviewMap.get(file);
            if (previewDiv) {
                previewDiv.remove();
                filePreviewMap.delete(file);
            }

            if (this.files.length === 0) {
                previewContainer.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('houseForm');
    const allFields = form.querySelectorAll('input, textarea, select');
    const dropzoneElement = document.getElementById('myDropzone');

    // Immediate validation as user types or leaves field
    allFields.forEach(field => {
        // Validate on blur (when leaving field)
        field.addEventListener('blur', function () {
            validateField(this);
        });

        // Clear validation errors when user starts typing (for text inputs)
        if (field.type !== 'checkbox' && field.type !== 'radio') {
            field.addEventListener('input', function () {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                }
            });
        }
    });

    myDropzone.on("removedfile", function (file) {
        validateDropzone();
    });

    myDropzone.on("addedfile", function (file) {
        validateDropzone();
    });
    

    // Form submission handler
    form.addEventListener('submit', function (event) {
        // Prevent native validation UI
        event.preventDefault();

        let isValid = true;
        let firstInvalidField = null;

        // Validate all fields
        allFields.forEach(field => {
            const fieldValid = validateField(field);
            if (!fieldValid && !firstInvalidField) {
                firstInvalidField = field;
            }
            isValid = isValid && fieldValid;
        });

        // Validate Dropzone
        const dropzoneValid = validateDropzone();
        if (!dropzoneValid && !firstInvalidField) {
            firstInvalidField = dropzoneElement;
        }
        isValid = isValid && dropzoneValid;

        if (isValid) {
            // If all valid, submit the form
            const formData = new FormData(form);

            // Append all Dropzone files to the FormData
            myDropzone.getAcceptedFiles().forEach((file, index) => {
                formData.append(`images[${index}]`, file);
            });

            // Submit the form with files via AJAX
            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle successful submission (redirect or show message)
                    window.location.href = data.redirect || '/';
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        } else {
            // Scroll to first error if form is invalid
            firstInvalidField.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            firstInvalidField.focus();
        }
    });

    function validateDropzone() {
        const files = myDropzone.getAcceptedFiles();
        const isValid = files.length > 0;

        if (isValid) {
            dropzoneElement.classList.remove('is-invalid');
        } else {
            dropzoneElement.classList.add('is-invalid');
        }

        return isValid;
    }

    // Field validation function
    function validateField(field) {
        // Skip validation for unchecked checkboxes/radios
        if ((field.type === 'checkbox' || field.type === 'radio') && !field.checked) {
            return true;
        }

        // Special validation for price field
        if (field.id === 'price' && field.value && parseFloat(field.value) <= 0) {
            field.classList.add('is-invalid');
            const feedback = field.closest('.input-group').nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = 'Price must be greater than 0.';
            }
            return false;
        }

        // Special validation for numeric fields
        if (field.type === 'number' && field.value && isNaN(field.value)) {
            field.classList.add('is-invalid');
            const feedback = field.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = 'Please enter a valid number.';
            }
            return false;
        }

        // Standard required field validation
        if (field.required && !field.value.trim()) {
            field.classList.add('is-invalid');
            return false;
        }

        // If field passes all validations
        field.classList.remove('is-invalid');
        return true;
    }

    // Show all errors immediately when user tries to submit invalid form
    form.addEventListener('invalid', function (event) {
        event.preventDefault();
    }, true);
});