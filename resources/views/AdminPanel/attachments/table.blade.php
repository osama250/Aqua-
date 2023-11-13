<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.factsheet') }}</th>
            <th class="min-w-250px">{{ __('lang.itinerary') }}</th>
            <th class="min-w-250px">{{ __('lang.sightseeing') }}</th>
            <th class="min-w-150px">{{ __('lang.acti') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ( $attachments as $attachment )
            <tr>
                <td>
                    <a href="{{ $attachment->factsheet }}"  target="_blank"> Show Factsheet
                </td>
                <td>
                    <a href="{{ $attachment->itinerary }}"  target="_blank"> Show Itinerary
                </td>
                <td>
                    <a href="{{ $attachment->sightseeing }}"  target="_blank"> Show Sight seeing
                </td>
                <td>
                    @if(auth()->user()->can('Edit Attachment'))
                        <a href="{{ route('attachments.edit', $attachment->id) }}" class="btn btn-sm btn-light me-2">
                        <i class="bi bi-pencil-square"></i>
                        </a>
                    @endif
                    @if(auth()->user()->can('Delete Attachment'))
                        <form method="POST" action="{{ route('attachments.destroy', $attachment->id) }}"
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
