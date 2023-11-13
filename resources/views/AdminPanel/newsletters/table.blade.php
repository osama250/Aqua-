<!--begin::Table-->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <button id="exportToExcel" class="btn btn-primary">Export to Excel</button>
    <!--begin::Thead-->
    <thead>
        <tr class="fw-6 fw-semibold text-gray-600">
            <th class="min-w-250px">{{ __('lang.title') }}</th>
            <th class="min-w-250px">{{ __('lang.description') }}</th>
            {{-- <th class="min-w-250px">{{ __('lang.seo') }}</th>
            <th class="min-w-150px">{{ __('lang.actions') }}</th> --}}
        </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody>
        @foreach ($newsletters as $news)
        <tr>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold">{{ $news->title }}</span>
            </td>
            <td>
                <span class="fs-7 fw-bold">{{ $news->description }}</span>
            </td>

            {{-- <td>
                @if(auth()->user()->can('Edit Page'))
                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-light me-2">
                    <i class="bi bi-pencil-square"></i>
                </a>
                @endif
                @if(auth()->user()->can('Delete Page'))
                <form method="POST" action="{{ route('pages.destroy', $page->id) }}"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger me-2">
                        <i class="bi bi-file-x-fill"></i>
                    </button>
                </form>
                @endif
            </td> --}}
        </tr>
        @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->



<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

<script>
    $(document).ready(function() {
        $('#kt_datatable_dom_positioning').dataTable({
            "searching": true,
            "ordering": true,
            responsive: true,
        });
    });


</script>

<!-- Add an Export to Excel button -->


<script>
    // Function to export table data to Excel
    function exportTableToExcel() {
        const table = document.getElementById('kt_datatable_dom_positioning'); // Get the table element
        const ws = XLSX.utils.table_to_sheet(table); // Convert the table to a worksheet
        const wb = XLSX.utils.book_new(); // Create a new workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1'); // Add the worksheet to the workbook

        // Save the Excel file
        XLSX.writeFile(wb, 'table_data.xlsx');
    }

    // Attach the export function to the button click event
    document.getElementById('exportToExcel').addEventListener('click', exportTableToExcel);
</script>
