<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.tripcats') }}</th>
            <th class="min-w-250px">{{ __('lang.check_in') }}</th>
            <th class="min-w-250px">{{ __('lang.check_out') }}</th>
            <th class="min-w-250px">{{ __('lang.cabin_count') }}</th>
            <th class="min-w-150px">{{ __('lang.suite_count') }}</th>
            <th class="min-w-250px">{{ __('lang.cabin_price') }}</th>
            <th class="min-w-150px">{{ __('lang.suite_price') }}</th>
            <th class="min-w-250px">{{ __('lang.single_cabin_price') }}</th>
            <th class="min-w-250px">{{ __('lang.single_suite_price') }}</th>
            <th class="min-w-250px">{{ __('lang.is_home') }}</th>
            <th class="min-w-250px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($trips as $trip )
        <tr>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold">{{ $trip->tripCategory->name }}</span>
            </td>
            <td>
                <span class="fs-7 fw-bold">{{ $trip->check_in }}</span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->check_out }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->cabin_count }} </span>
            </td>
           <td>
                <span class="fs-7 fw-bold"> {{ $trip->suite_count }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->cabin_available }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->suite_available }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->cabin_price }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->suite_price }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->single_cabin_price }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->suite_cabin_price }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $trip->is_home }} </span>
            </td>
            <td>
                @if(auth()->user()->can('Edit Trips'))
                    <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-sm btn-light me-2">
                    <i class="bi bi-pencil-square"></i>
                    </a>
                @endif
                @if(auth()->user()->can('Delete Trips'))
                    <form method="POST" action="{{ route('trips.destroy', $trip->id) }}"
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
        $('#kt_datatable_dom_positioning').dataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
    });
</script>

