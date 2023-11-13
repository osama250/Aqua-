<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            {{-- <th class="min-w-250px">{{ __('lang.trips') }}</th> --}}
            <th class="min-w-250px">{{ __('lang.users') }}</th>
            <th class="min-w-250px">{{ __('lang.price') }}</th>
            <th class="min-w-250px">{{ __('lang.comment') }}</th>
            <th class="min-w-250px">{{ __('lang.uuid') }}</th>
            <th class="min-w-150px">{{ __('lang.status') }}</th>
            <th class="min-w-250px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($Reservations as $rserve )
        <tr>
            {{-- <td>
                <span class="fs-7 fw-bold">{{ $rserve->trip->category-> }}</span>
            </td> --}}
            <td>
                <span class="fs-7 fw-bold">{{ $rserve->user->name }}</span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $rserve->price }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $rserve->comment }} </span>
            </td>
            <td>
                <span class="fs-7 fw-bold"> {{ $rserve->uuid }} </span>
            </td>
           <td>
                <span class="fs-7 fw-bold"> {{ $rserve->status }} </span>
            </td>
            <td>
                {{-- @if(auth()->user()->can('Edit Reservation'))
                    <a href="{{ route('reservations.edit', $rserve->id) }}" class="btn btn-sm btn-light me-2">
                    <i class="bi bi-pencil-square"></i>
                    </a>
                @endif --}}
                @if(auth()->user()->can('Delete Reservation'))
                    <form method="POST" action="{{ route('reservations.destroy', $rserve->id) }}"
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

