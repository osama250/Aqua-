<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-6 col-form-label  fw-semibold fs-6">{{ __('lang.filter') }}</label>
        <!--end::Label-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Row-->
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                    <select class="form-select form-select-solid filter ml-lg-5 ml-md-5 w-50" id="kt_datatable_search_status" data-control="select2" data-hide-search="true"
                        data-placeholder="Select a Team Member" name="status" data-select2-id="select2-data-72-ljg2"
                        tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="all" data-select2-id="select2-data-74-kng8" selected>{{__('lang.selectall')}}</option>
                        <option value="{{__('lang.active')}}" data-select2-id="select2-data-74-kng8"  >{{__('lang.active')}}</option>
                        <option value="{{__('lang.inactive')}}" data-select2-id="select2-data-131-9yfh"  >{{__('lang.inactive')}}</option>

                    </select>
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Col-->
    </div>
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.coupon_name') }}</th>
            <th class="min-w-250px">{{ __('lang.limit') }}</th>
            <th class="min-w-250px">{{ __('lang.remaining') }}</th>
            <th class="min-w-250px">{{ __('lang.start_date') }}</th>
            <th class="min-w-250px">{{ __('lang.end_date') }}</th>
            <th class="min-w-250px">{{ __('lang.status') }}</th>
            <th class="min-w-250px">{{ __('lang.type') }}</th>
            <th class="min-w-250px">{{ __('lang.value') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($coupones as $coupon)
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $coupon->name }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $coupon->limit }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $coupon->remaining }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $coupon->start_date }}</span>
                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $coupon->end_date }}</span>
                </td>
                <td>
                    @if ($coupon->status == 1)
                        <span class="badge badge-light-success fs-7 fw-bold">{{ __('lang.'.$coupon->statustype)  }}</span>
                    @else
                        <span class="badge badge-light-danger fs-7 fw-bold">{{ __('lang.'.$coupon->statustype) }}</span>
                    @endif

                </td>
                <td>
                    <span class="fs-7 fw-bold">{{ __('lang.'.$coupon->typestring) }}</span>

                </td>
                <td>
                    <span class=" fs-7 fw-bold">{{ $coupon->value }}</span>
                </td>
                <td>
                    @if(auth()->user()->can('Edit Coupon'))
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-sm btn-light me-2">
                        <i class="bi bi-pencil-square"></i>
                        </a>
                    @endif
                    @if(auth()->user()->can('Delete Coupon'))
                        <form method="POST" action="{{ route('coupons.destroy', $coupon->id) }}"
                        style="display: inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger me-2">
                            <i class="bi bi-file-x-fill"></i>
                        </button>
                        </form>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->




<script>
    $(document).ready(function() {
        var table = $('#kt_datatable_dom_positioning').DataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
        $('.filter').on('change', function() {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        if (val==='all'){
            table.column(5).search('.' ? '.' : '', true, false).draw();
        }else{
            table.column(5).search(val ? '^'+val+'$' : '', true, false).draw();
        }

        });
    });


</script>
