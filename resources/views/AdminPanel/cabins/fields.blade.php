@isset($cabin)
@method('PUT')
<input type="hidden" value="{{ $cabin->id }}" name="id">
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
                                value="{{isset($cabin) && isset($cabin->getTranslation($name)->title) ? $cabin->getTranslation($name)->title : '' }}">
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
                                {{ isset($cabin) ? $cabin->value : '' }}
                                {{ isset($cabin) ? $cabin->getTranslation($name)->description : '' }}
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
  <!--begin::Input group-->
    <div class="row mb-3">
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.cats') }}</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                    <div class="col-lg-12 fv-row fv-plugins-icon-container" style="margin-top: 20px">
                        <select name="category_id[]" multiple id="categorySelect"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 ">
                            <option value="Choosse"> Choosse Categories </option>
                            @foreach ( $cats as $cat )
                                {{-- <option value="{{ $cat->id }}"> {{ $cat->title  }} </option> --}}
                                {{-- <option value="{{ $cat->id }}" {{  isset( $cabin ) && $cat->id == $cabin->categories->id ? 'selected' : '' }}>
                                    {{ $cat->title }}
                                </option> --}}
                                @if ( isset($cabin) )
                                    <option value="{{ $cat->id }}" {{ $cabin->categories->contains($cat) ? 'selected' : '' }}>
                                        {{ $cat->title }}
                                    </option>
                                @else
                                <option value="{{ $cat->id }}" >
                                    {{ $cat->title }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
            </div>
    </div>
    {{-- End --}}
    </div>
    <div class="row mb-3">
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.facilite') }}</label>
        <div class="col-lg-8">
            <!--begin::Row-->
            <div class="row">
                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <div id="facilitiesContainer">

                                </div>
                    </div>
            </div>
    </div>

</div>

<script>
    // var facilitiesContainer = $('#facilitiesContainer');
    // $(document).ready(function () {
        // $('#categorySelect').on('change', function () {
        //     var category_ids = $(this).val();
        //     console.log(category_ids);
        //     for ( let i =0; i< category_ids.length; i ++ )  {
        //         facilitiesContainer.empty();
        //         let category_id = category_ids[i];
        //         if (category_id) {
        //         $.ajax({
        //             url: '/getFacilities',
        //             type: 'GET',
        //             data: {
        //                 category_id: category_id
        //             },
        //             success: function (data) {
        //                 // facilitiesContainer.empty();


        //                 $.each(data, function (index, facility) {
        //                     $('#facilitiesContainer').append(
        //                         '<input type="checkbox" id="'+ facility.id + '" name="facilite_id[]" value="'+ facility.id + '">' );
        //                     // $('#facilitiesContainer').append('<label for="'+ facility.id + '">' + facility.title + '</label>' + '  ');
        //                     $('#facilitiesContainer').append('<label for="' + facility.id + '" style="margin: 0px 8px;">' + facility.title + '</label>' + '  ');

        //                     console.log(facilitiesContainer);
        //                 });
        //             }
        //         });
        //         } else {
        //             $('#facilitiesContainer').empty();
        //         }
        //     }
        // });


    // });
    $(document).ready(function() {
        var facilitiesContainer = $('#facilitiesContainer');
        var categorySelect = $('#categorySelect');

    // Function to load facilities for a selected category
        function loadFacilities(category_ids) {
            facilitiesContainer.empty();

            // Loop through the selected category IDs
            for (let i = 0; i < category_ids.length; i++) {
                let category_id = category_ids[i];
                if (category_id) {
                    $.ajax({
                        url: '/getFacilities',
                        type: 'GET',
                        data: {
                            category_id: category_id
                        },
                        success: function(data) {
                            $.each(data, function(index, facility) {
                                facilitiesContainer.append(
                                    '<input type="checkbox" id="' + facility.id + '" name="facility_id[]" value="' + facility.id + '" checked>' +
                                    '<label for="' + facility.id + '">' +  facility.title +  '</label>' + '   '
                                );
                            });
                        }
                    });
                }
            }
        }

    // Event handler for category select change
        categorySelect.on('change', function() {
            var category_ids = $(this).val();
            loadFacilities(category_ids);
        });

        // Trigger the change event to load facilities when editing
        var selectedCategories = categorySelect.val();
        if (selectedCategories) {
            loadFacilities(selectedCategories);
        }
});

</script>



<script type="text/javascript">
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

</script>
