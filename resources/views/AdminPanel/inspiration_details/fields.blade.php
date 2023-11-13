@isset($insdetail)
@method('PUT')
<input type="hidden" value="{{ $insdetail->id }}" name="id">
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
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.title') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type='text' name="{{$name}}[title]"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.title') }}"
                                value="{{isset($insdetail) && isset($insdetail->getTranslation($name)->title) ? $insdetail->getTranslation($name)->title : '' }}">
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

            {{-- Start Content --}}
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.description') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="{{$name}}[description]" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.value') }}" >
                                {{ isset($insdetail) ? $insdetail->value : '' }}
                                {{ isset($insdetail) ? $insdetail->getTranslation($name)->description : '' }}
                            </textarea>
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
            {{-- End Content --}}


        </div>
        @endforeach

        <div class="fv-row mb-8">
            <!--begin::Label-->
            <label class="d-block fw-semibold fs-6 mb-5">
                <span class="required">{{__('lang.photos')}}</span>
            </label>
            <!--end::Label-->
            <!--begin::Dropzone-->
            <div class="dz-clickable dropzone" id="kt_modal_create_project_settings_logo">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                </div>
                    @if( isset($insdetail) && count($insdetail->photos) > 0 )
                        @foreach ($insdetail->photos as  $photo)
                            <div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
                                <div class="dz-image"><img data-dz-thumbnail="" alt="{{$insdetail->title}}"
                                    {{-- src="/image/upload/pages/{{$photo->photo}}" > --}}
                                    {{-- src="/image/upload/pages/' .$photo->photo" > --}}
                                    src="{{ $photo->photo  }}" >
                                </div>
                                {{-- <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size=""><strong>0.3</strong> MB</span></div>
                                    <div class="dz-filename"><span data-dz-name="">LOGO-04.png</span></div>
                                </div> --}}
                                <div class="dz-progress"> <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span> </div>
                                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                <div class="dz-success-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Check</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path
                                                d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF"></path>
                                        </g>
                                    </svg> </div>
                                <div class="dz-error-mark"> <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Error</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                <path
                                                    d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <a class="btn btn-danger btn-sm mt-1 delete-button delete" data-image-id="{{$photo->id}}"><i
                                        class="bi bi-file-x-fill"></i></a>
                            </div>
                        @endforeach

                    @else
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
                    @endif
            </div>
            <!--end::Dropzone-->
        </div>

    </div>

</div>

<script>
    Dropzone.autoDiscover = false;
    var uploadedDocumentMap = {};
    var myDropzone = new Dropzone("#kt_modal_create_project_settings_logo", {
        url: '{{url(LaravelLocalization::getCurrentLocale()."/image/upload/inspirations")}}',
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
            url :"{{ url(LaravelLocalization::getCurrentLocale().'/inspirationsdetail/image/delete/') }}/" + this.getAttribute('data-image-id'),
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

{{-- <script type="text/javascript">
    $(document).ready(function (e) {

       $('.path2').click(function(){
        $('#video').remove();
       });

   $('#media').change(function(){

    $('#video').remove();
    var files = event.target.files;
    if(files[0].type.includes('video')){
        let reader = new FileReader();
         console.log(reader);
        reader.readAsDataURL(files[0]);
        reader.onload = (e) => {
        $('.image-input-wrapper').append(`
        <video id='video' width="125" height="125" controls>
            <source src='${reader.result}' type='${files[0].type}'></source>
        </video>
        `);
        }


    }

   });

});

</script> --}}
