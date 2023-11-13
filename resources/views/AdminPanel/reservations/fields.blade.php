@isset($slider)
@method('PUT')
<input type="hidden" value="{{ $reserve->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <div class="tab-content mt-5" id="myTabContent">


        <div class="tab-pane fade show active" role="tabpanel">

            {{-- Start Category  --}}
            <div class="row mb-3">
                {{-- {!! Form::label('trip_category_id', __('models/trips.fields.trip_category').':') !!}
                {!! Form::select('trip_category_id', $trips, null, ['class' => 'form-control']) !!} --}}
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.trips') }}</label>
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <select name="trip_id"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 ">
                                <option value="Choosse"> Choosse </option>
                                @foreach ( $trips as $trip )
                                    <option value="{{ $trip->id }}"> {{  $trip->trip_category_id    }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Category --}}
            {{-- Pricce  --}}
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.price') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type='number' name="price"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.price') }}"
                                value="{{isset($trip)  ? $trip->price: '' }}">
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
            {{--  end Check in --}}

            {{-- Start Comment --}}
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.comment') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <textarea name="comment" class="summernote"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.comment') }}">
                                {{ isset($reserve)? $reserve->comment : '' }} </textarea>
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
            <!--end::Comment-->

            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.uuid') }}</label>
                <!--end::Label-->

                <!--begin::ode -->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type='text' name="uuid"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.uuid') }}"
                                value="{{isset($reserve)  ? $reserve->uuid : '' }}">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::code-->
            </div>
            {{--  end Check in --}}


        </div>
            {{-- End single_cabin_price --}}



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
