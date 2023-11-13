<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.photo') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th>
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($galleries as $gallery)
        <tr>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold cursor-pointer symbol symbol-35px">
                    <img onerror="this.onerror=null;this.src='{{asset('assets/media/svg/files/blank-image.svg')}}'" src="{{$gallery->photo}}"
                        class="rounded-3" a>
                </span>
            </td>
            <td>
                {{-- @if (auth()->user()->can('Edit Gallery'))
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-light me-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                @endif --}}
                @if (auth()->user()->can('Delete Gallery') )
                <form method="POST" action="{{ route('galleries.destroy', $gallery->id) }}" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger me-2">
                        <i class="bi bi-file-x-fill"></i>
                    </button>
                </form>
                @endif
        </tr>
        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->




<script>
    $(document).ready(function() {
        $('#kt_datatable_dom_positioning').dataTable({
            "searching": false,
            "ordering": true,
            responsive: true,
        });
    });
</script>
