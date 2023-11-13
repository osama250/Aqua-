<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.photo') }}</th>
            <th class="min-w-250px">{{ __('lang.media') }}</th>
            <th class="min-w-250px">{{ __('lang.name') }}</th>
            {{-- <th class="min-w-250px">{{ __('lang.duration') }}</th> --}}
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($tripcategories as $tripcategorr )
            <tr>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold cursor-pointer symbol symbol-35px">
                            <img src="{{ asset('images/'.$tripcategorr->photo ) }}" alt="" width="250px" height="250px"> <br>
                    </span>
                </td>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold cursor-pointer symbol symbol-35px">
                            <img src="{{ asset('images/'.$tripcategorr->map ) }}" alt="" width="250px" height="250px"> <br>
                    </span>
                </td>
                <td>
                    <span class="badge badge-light-success fs-7 fw-bold">{{ $tripcategorr->name }}</span>
                </td>
                {{-- <td>
                    <span class="fs-7 fw-bold">{{ $tripcategorr->duration }}</span>
                </td> --}}
                <td>
                    @if(auth()->user()->can('Edit TripCategory'))
                        <a href="{{ route('trip-categories.edit', $tripcategorr->id) }}" class="btn btn-sm btn-light me-2">
                        <i class="bi bi-pencil-square"></i>
                        </a>
                    @endif
                    @if(auth()->user()->can('Delete Decks'))
                        <form method="POST" action="{{ route('trip-categories.destroy', $tripcategorr->id) }}"
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
