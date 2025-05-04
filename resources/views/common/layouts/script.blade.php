<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/libs/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->

<!-- JQuery UI -->
<script src="{{ asset('assets/libs/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Owl Carousel JavaScript -->
<script src="{{ asset('assets/libs/owl-carousel/owl.carousel.min.js') }}"></script>

<!--Venobox-->
<script src="{{ asset('assets/libs/venobox/venobox.min.js') }}"></script>

<!--Iconify Icon-->
<script src="{{ asset('assets/js/iconify.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

<!-- Dropzone js -->
<script src="{{ asset('/') }}assets/libs/dropzone/dropzone.js"></script>
<script src="{{ asset('/') }}assets/js/pages/form-file-upload.init.js"></script>

<script src="{{ asset('assets/sweetalert2/sweetalert2.all.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/common.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<input type="hidden" id="deleteTitle" value="{{__("Sure! You want to delete?")}}">
<input type="hidden" id="deleteText" value="{{__("You won't be able to revert this!")}}">
<input type="hidden" id="subscriptionCancelTitle" value="{{__("Sure! You want to cancel?")}}">
<input type="hidden" id="subscriptionCancelText" value="{{__("You won't be able to revert this!")}}">
<!-- Select2 -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#propertyContent',  // change this value according to your HTML
        plugins: ['advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'],
        toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        a_plugin_option: true,
        a_configuration_option: 400
    });
    // Initialize Dropzone
    Dropzone.autoDiscover = false;

    const myDropzone = new Dropzone("#myDropzone", {
        url: "/upload",
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
</script>
<script>
    "use strict";

    // select2 initial
    $('.select2').select2({
        dropdownParent: $("#addPackageModal")
    });

    var currencySymbol = "Birr";

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if (Session::has('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (@$errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".topBannerClose").on('click', function () {
        $(this).parent().remove();
    });
</script>