@isset($attachment)
@method('PUT')
<input type="hidden" value="{{ $attachment->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    {{-- <ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">

        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)

        <li class="nav-item" data-bs-toggle="tab">
            <a class="nav-link {{LaravelLocalization::getCurrentLocale() == $name ?'active':''}}" id="{{$name}}-tab"
                data-bs-toggle="tab" href="#{{$name}}" role="tab" aria-controls="{{$name}}"
                aria-selected="{{ LaravelLocalization::getCurrentLocale() == $name  ? 'true' : 'false'}}">{{$value['native']}}</a>
        </li>

        @endforeach
    </ul> --}}
    <div class="tab-content mt-5" id="myTabContent">
        @foreach ( LaravelLocalization::getSupportedLocales() as $name => $value)
        <div class="tab-pane fade {{(LaravelLocalization::getCurrentLocale() == $name) ? 'show active':''}}" id="{{$name}}"
            role="tabpanel" aria-labelledby="{{$name}}-tab">

        </div>
        @endforeach
  <!--begin::Input group-->
  <div class="fv-row mb-10 fv-plugins-icon-container">
        @if ( @isset($attachment->factsheet) )
                <a href="{{ $attachment->factsheet }}"  target="_blank"> Show Factsheet
        @endif
    <!--begin::Label-->
    <br>  <br>
    <label class="d-block fw-semibold fs-6 mb-5">
        <span class="required">{{__('lang.factsheet')}}</span>
    </label>
    <!--end::Label-->
    <!--begin::Image input placeholder-->
    <style>
        .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});
        }
    </style>
    <!--end::Image input placeholder-->
    <!--begin::Image input-->
    <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
        <!--begin::Preview existing avatar-->
        <div class="image-input-wrapper w-125px h-125px" @isset($attachment->factsheet)
                style='background-image:url( {{ $attachment->factsheet }} )' @endisset>
        </div>

        <!--end::Preview existing avatar-->
        <!--begin::Label-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
            data-bs-original-title="Change avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-pencil fs-7">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <!--begin::Inputs-->
            <input type="file" name="factsheet" accept=".png, .jpg, .jpeg , .pdf">
            <input type="hidden" name="avatar_remove">
            <!--end::Inputs-->
        </label>
        <!--end::Label-->
        <!--begin::Cancel-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
            data-bs-original-title="Cancel avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Cancel-->
        <!--begin::Remove-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
            data-bs-original-title="Remove avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Remove-->
    </div>
    <!--end::Image input-->
    <!--begin::Hint-->
    <div class="form-text">{{__('lang.allowedsettingtypes')}}</div>
    <!--end::Hint-->
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
  </div>
<!--end::Input group-->

  <!--begin::Input group-->
  <div class="fv-row mb-10 fv-plugins-icon-container">
    @if ( @isset($attachment->itinerary) )
            <a href="{{ $attachment->itinerary }}"  target="_blank"> Show Itinerary
    @endif
    <!--begin::Label-->
    <br> <br>
    <label class="d-block fw-semibold fs-6 mb-5">
        <span class="required">{{__('lang.itinerary')}}</span>
    </label>
    <!--end::Label-->
    <!--begin::Image input placeholder-->
    <style>
        .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});
        }
    </style>
    <!--end::Image input placeholder-->
    <!--begin::Image input-->
    <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
        <!--begin::Preview existing avatar-->
        <div class="image-input-wrapper w-125px h-125px" @isset($attachment->itinerary)
            {{-- style='background-image:url({{asset('images/'.$deck->file)}})' @endisset> --}}
            style='background-image:url( {{ $attachment->itinerary }} )' @endisset>
        </div>
        <!--end::Preview existing avatar-->
        <!--begin::Label-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
            data-bs-original-title="Change avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-pencil fs-7">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <!--begin::Inputs-->
            <input type="file" name="itinerary" accept=".png, .jpg, .jpeg , .pdf">
            <input type="hidden" name="avatar_remove">
            <!--end::Inputs-->
        </label>
        <!--end::Label-->
        <!--begin::Cancel-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
            data-bs-original-title="Cancel avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Cancel-->
        <!--begin::Remove-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
            data-bs-original-title="Remove avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Remove-->
    </div>
    <!--end::Image input-->
    <!--begin::Hint-->
    <div class="form-text">{{__('lang.allowedsettingtypes')}}</div>
    <!--end::Hint-->
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
  </div>
<!--end::Input group-->

<div class="fv-row mb-10 fv-plugins-icon-container">

    @if ( @isset($attachment->sightseeing) )
    <a href="{{ $attachment->sightseeing }}"  target="_blank"> Show Sight seeing
    @endif
    <br>  <br>
    <!--begin::Label-->
    <label class="d-block fw-semibold fs-6 mb-5">
        <span class="required">{{__('lang.sightseeing')}}</span>
    </label>
    <!--end::Label-->

    <!--begin::Image input placeholder-->
    <style>
        .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image.svg')}})
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}});
        }
    </style>
    <!--end::Image input placeholder-->
    <!--begin::Image input-->
    <div class="image-input image-input-empty image-input-outline image-input-placeholder" data-kt-image-input="true">
        <!--begin::Preview existing avatar-->
        <div class="image-input-wrapper w-125px h-125px" @isset($attachment->sightseeing)
            {{-- style='background-image:url({{asset('images/'.$deck->file)}})' @endisset> --}}
            style='background-image:url( {{ $attachment->sightseeing }} )' @endisset>
        </div>
        <!--end::Preview existing avatar-->
        <!--begin::Label-->
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
            data-bs-original-title="Change avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-pencil fs-7">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <!--begin::Inputs-->
            <input type="file" name="sightseeing" accept=".png, .jpg, .jpeg , .pdf">
            <input type="hidden" name="avatar_remove">
            <!--end::Inputs-->
        </label>
        <!--end::Label-->
        <!--begin::Cancel-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
            data-bs-original-title="Cancel avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Cancel-->
        <!--begin::Remove-->
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
            data-bs-original-title="Remove avatar" data-kt-initialized="1">
            <i class="ki-duotone ki-cross fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <!--end::Remove-->
    </div>
    <!--end::Image input-->
    <!--begin::Hint-->
    <div class="form-text">{{__('lang.allowedsettingtypes')}}</div>
    <!--end::Hint-->
    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
  </div>
<!--end::Input group-->
    </div>

</div>

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
