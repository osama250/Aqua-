{{-- @isset($role)
@method('PUT')
@endisset --}}
@csrf
<div class="card-body border-top p-9">
    {{-- @isset($role)
    <input type="hidden" value="{{ $role->id }}" name='id'>
    @endisset --}}
   <!--begin:inputGroup-->
   <div class="fv-row mb-8">
    <!--begin::Dropzone-->
    <div class="dz-clickable dropzone" id="kt_modal_create_project_settings_logo">
        <!--begin::Message-->
        <div class="dz-message needsclick">
            <!--begin::Icon-->
            <i class="ki-duotone ki-file-up fs-3hx text-primary">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <!--end::Icon-->
            <!--begin::Info-->
            <div class="ms-4">
                <h3 class="dfs-3 fw-bold text-gray-900 mb-1">{{ __('lang.dropfiles') }}</h3>
                {{-- <span class="fw-semibold fs-4 text-muted">Upload up to 10 files</span> --}}
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Dropzone-->
   </div>
</div>
<!-- end::inputGroup-->

</div>
<script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#kt_modal_create_project_settings_logo", {
        url: "{{ route('galleries.store') }}",
        paramName: "photos[]",
        //maxFilesize: 2,
        acceptedFiles: ".jpg,.png,.gif",
        init: function () {
            // Get the CSRF token from the meta tag
            var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            var _this = this; // Save the reference to Dropzone instance to access it in other functions

            this.on("sending", function (file, xhr, formData) {
                formData.append("_token", csrfToken);
            });

            this.on("success", function (file, response) {
                // Save the image ID returned from the server to a data attribute on the delete button
                var deleteButton = file.previewElement.querySelector(".delete-button");
                deleteButton.setAttribute("data-image-id", response);
            });

            this.on("error", function (file, errorMessage) {
                console.error(errorMessage);
            });

            this.on("addedfile", function (file) {
                // Create a delete button and append it to the file preview element
                var deleteButton = Dropzone.createElement("<button class='btn btn-danger btn-sm mt-1 delete-button'><i class='bi bi-file-x-fill'></i></button>");

                // Add event listener to the delete button
                deleteButton.addEventListener("click", function () {
                    // Retrieve the image ID from the data attribute and use it for deletion
                    var imageId = this.getAttribute("data-image-id");

                    // Remove the file from Dropzone and delete the preview
                    _this.removeFile(file);

                    // Additional code to handle server-side image deletion
                    // You can make an AJAX call to delete the image from the server
                    $.ajax({
                    url :"{{ url('en/galleries') }}/" + imageId,
                    type: 'DELETE',
                    headers: {
                    'X-CSRF-TOKEN':csrfToken,
                    },
                    dataType: 'json',
                    success: function(data) {
                    //console.log(data.success);
                    },
                    error: function(error) {
                    console.error(error);
                    }
                    });
                });

                file.previewElement.appendChild(deleteButton);
            });

            this.on("removedfile", function (file) {
                // Additional code to handle server-side image deletion
                // You can make an AJAX call to delete the image from the server
            });
        },
    });
</script>
