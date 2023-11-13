@isset($slider)
@method('PUT')
<input type="hidden" value="{{ $itinerary->id }}" name="id">
@endisset
@csrf
<div class="card-body border-top p-9">
    <div class="tab-content mt-5" id="myTabContent">


        <div class="tab-pane fade show active" role="tabpanel">

            {{-- Start Category  --}}
            {{-- <div class="form-group col-sm-6">
                {!! Form::label('trip_category_id', __('models/trips.fields.trip_category').':') !!}
                {!! Form::select('trip_category_id', $tripCategories, null, ['class' => 'form-control']) !!}
            </div> --}}
            {{-- End Category --}}
                   {{-- Start Category  --}}
                    <div class="row mb-3">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.tripcats') }}</label>
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <select name="trip_category_id"
                                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 ">
                                            <option   value="{{isset($itinerary) ? $itinerary->tripCategory->id : '' }}">
                                                {{   isset($itinerary) ? $itinerary->tripCategory->name : 'Options'  }}
                                            </option>
                                            @foreach ( $tripCategories as $tripcat )
                                                <option value="{{ $tripcat->id }}"> {{ $tripcat->name  }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                {{-- End Category --}}

            {{-- Suite _available  --}}
                    <div class="row mb-3">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.day') }}</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <input type='number' name="day"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                        placeholder="{{ __('lang.day') }}"
                                        value="{{isset($itinerary) ? $itinerary->day : '' }}">
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
            <!-- end:: cabin_available   -->


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
