@isset($page)
    @method('PUT')
    <input type="hidden" value="{{ $itinerarydetail->id }}" name="id">
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

            {{-- Start Category  --}}
            <div class="row mb-3">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.tripcats') }}</label>
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <select name="itinerary_id"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 ">
                                <option   value="{{isset($itinerarydetail) ? $itinerarydetail->itinerary_id  : '' }}">
                                    {{   isset($itinerarydetail) ? $itinerarydetail->itinerary->tripCategory->name : 'Options'  }}
                                </option>
                                @foreach ( $itineraries as $itinerary )
                                    {{-- <option value="{{ $itinerary->id }}"> {{ $itinerary->tripCategory->name }} </option> --}}
                                    <option value="{{ $itinerary->id }}"> {{ $itinerary->tripCategory->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
             {{-- End Category --}}


            <!--begin::Input  Text-->
            <div class="row mb-3">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('lang.text') }}</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                            <input type='text' name="{{$name}}[text]"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 "
                                placeholder="{{ __('lang.text') }}" value="{{isset($itinerarydetail)? $itinerarydetail->getTranslation($name)->text : '' }}">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input Text-->

        </div>
        @endforeach
    </div>
