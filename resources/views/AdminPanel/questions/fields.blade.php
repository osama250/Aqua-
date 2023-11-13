@isset($question)
    @method('PUT')
    <input type="hidden" value="{{ $question->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">

        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)

        <li class="nav-item" data-bs-toggle="tab">
            <a class="nav-link {{LaravelLocalization::getCurrentLocale() == $name ?'active':''}}" id="{{$name}}-tab"
                data-bs-toggle="tab" href="#{{$name}}" role="tab" aria-controls="{{$name}}"
                aria-selected="{{ LaravelLocalization::getCurrentLocale() == $name  ? 'true' : 'false'}}">{{$value['native']}}</a>
        </li>

        @endforeach
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)
        <div class="tab-pane fade {{(LaravelLocalization::getCurrentLocale() == $name) ? 'show active':''}}" id="{{$name}}"
            role="tabpanel" aria-labelledby="{{$name}}-tab">

            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.question') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type='text' name="{{$name}}[question]"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.title') }}" value="{{isset($question)? $question->getTranslation($name)->question : '' }}">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->


            <!--begin::Input group-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.answer') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="{{$name}}[answer]" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.description') }}">{{ isset($question) ? $question->getTranslation($name)->answer : '' }} </textarea>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
                <!--begin::Input group-->

        </div>
        @endforeach

        </div>
        <!-- end::inputGroup-->


    </div>

    <script>
        Dropzone.autoDiscover = false;
        var uploadedDocumentMap = {};
        var myDropzone = new Dropzone("#kt_modal_create_project_settings_logo", {
            url: '{{url(LaravelLocalization::getCurrentLocale()."/image/upload/pages")}}',
            paramName: "photo",
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
                    $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                    // Save the image ID returned from the server to a data attribute on the delete button
                    var deleteButton = file.previewElement.querySelector(".delete-button");
                    deleteButton.setAttribute("data-image-id", response.name);
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
                        $('form').find('input[name="photos[]"][value="' + imageId + '"]').remove()
                        // Additional code to handle server-side image deletion
                        // You can make an AJAX call to delete the image from the server
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

    <script>
        $('.delete').each(function(e){
            $(this).on('click',function(){
                let button = this;
                $.ajax({
                url :"{{ url(LaravelLocalization::getCurrentLocale().'/pages/image/delete/') }}/" + this.getAttribute('data-image-id'),
                type: 'GET',
                headers: {
                '__token':'{{csrf_token()}}',
                },
                dataType: 'json',
                success: function(data) {
                button.parentElement.remove();
                },
                error: function(error) {
                console.error(error);
                }
                });
            });

        });
    </script>
