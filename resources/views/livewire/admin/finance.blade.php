<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">

    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    @if (session()->has('message'))
                        <div
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- Form Container -->
                    <form class="max-w-3xl mx-auto" wire:submit="{{$isEdit ? 'update' : 'create'}}">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-t-xl p-6">
                            <h2 class="text-2xl font-bold text-white">Financial Management</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="bg-white rounded-b-xl shadow-lg p-8 space-y-8">
                            <!-- Picture Details Section -->
                            <div class="space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-2">Record Details</h3>

                                <div class="space-y-6">
                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                             Record Title <span class="text-red-500">*</span>
                                        </label>
                                       
                                        <select name="title" id="title" wire:model="title" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white">
                                            <option value="">Select Record Title</option>
                                            <option value="Registration">Registration</option>
                                            <option value="Sale of Materials">Sale of Materials</option>
                                             <option value="Registration">Registration</option>
                                            <option value="Offerings">Offerings</option>
                                            <option value="Appeals">Appeals</option>
                                            <option value="Dues">Dues</option>
                                            <option value="Pledges">Pledges</option>
                                            <option value="Pastors Appreciation">Pastors Appreciation</option>
                                            <option value="Children Service Offerings">Children Service Offerings</option>
                                            <option value="Other Incomes">Other Incomes</option>

                                        </select>
                                    </div>
                                    <div class="text-red-600">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    {{-- <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                            Finance Record Title <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            placeholder="Enter the title of the record"
                                            wire:model="title"
                                        >
                                    </div>
                                    <div class="text-red-600">
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div> --}}


                                    <div class="relative">
                                        <label class="text-sm font-medium text-gray-700 block mb-2">
                                          Total Amount <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 hover:bg-white"
                                            type="number"
                                            step="0.01"
                                            min="0"
                                            placeholder="0.00"
                                            wire:model="amount"
                                           >
                                    </div>
                                    <div class="text-red-600">
                                        @error('amount')
                                        {{$message}}
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button
                                        type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2"
                                    >
                                        <!-- Upload Icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                      {{$isEdit ? " Update Record" : " Upload Record"}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="lg:w-7/12">
                    <div class="bg-white rounded-xl shadow-sm p-6">
    <div class="text-xl font-semibold text-gray-800 mb-6">
        {{$isEdit ? "Update Financial Record" : "Financial Records"}}
    </div>
    
    <div class="space-y-6">
        @foreach($datas as $date => $recordsByName)
            <!-- Day Section -->
              <!-- Print Button -->
                    <div class="flex justify-end">
                        <button
                            type="button"
                            onclick="printDaily('{{ \Illuminate\Support\Str::slug($date) }}')"
                            class="inline-flex items-center px-4 py-2 bg-white text-blue-600 rounded-lg hover:bg-blue-50 shadow-md"
                        >
                            Print Daily Report
                        </button>

                    </div>
<div id="print-day-{{ \Illuminate\Support\Str::slug($date) }}"
     class="border border-gray-200 rounded-lg overflow-hidden">
                <!-- Day Header -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <h3 class="text-lg font-bold text-white">
                                {{ \Carbon\Carbon::parse($date)->format('l, jS F Y') }}
                            </h3>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-blue-100">Daily Total</div>
                            <div class="text-2xl font-bold text-white">
                                GHC {{ number_format($recordsByName->flatten()->sum('amount'), 2) }}
                            </div>
                        </div>
                    </div>
                    
                  
                </div>

                <!-- Records grouped by name for this day -->
                <div class="divide-y divide-gray-100">
                    @foreach($recordsByName as $name => $records)
                        <!-- Name Group Section -->
                        <div class="bg-gray-50">
                            <!-- Name Group Header -->
                            <div class="px-6 py-3 bg-gray-100 flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span class="font-semibold text-gray-900">{{ $name }}</span>
                                    <span class="text-sm text-gray-500">({{ $records->count() }} entries)</span>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm text-gray-600">Subtotal</div>
                                    <div class="text-lg font-bold text-blue-600">
                                        GHC {{ number_format($records->sum('amount'), 2) }}
                                    </div>
                                </div>
                            </div>

                            <!-- Individual Records Table -->
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-white border-b border-gray-200">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Amount</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Posted By</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Time</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Updated By</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($records as $data)
                                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                                <td class="px-6 py-4">
                                                    <div class="font-semibold text-gray-900">
                                                        GHC {{ number_format($data->amount, 2) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                            <span class="text-blue-600 font-semibold text-sm">
                                                                {{ substr($data->user?->first_name ?? 'N', 0, 1) }}{{ substr($data->user?->last_name ?? 'A', 0, 1) }}
                                                            </span>
                                                        </div>
                                                        <div class="ml-3">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $data->user?->first_name }} {{ $data->user?->last_name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $data->created_at->format('g:i A') }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($data->edited == true)
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-8 w-8 bg-amber-100 rounded-full flex items-center justify-center">
                                                                <span class="text-amber-600 font-semibold text-sm">
                                                                    {{ substr($data->editor->first_name ?? 'N', 0, 1) }}{{ substr($data->editor->last_name ?? 'A', 0, 1) }}
                                                                </span>
                                                            </div>
                                                            <div class="ml-3">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $data->editor->first_name }} {{ $data->editor->last_name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="text-sm text-gray-500">N/A</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex space-x-2">
                                                        <button
                                                            wire:click="edit({{$data->id}})"
                                                            class="inline-flex items-center px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg hover:bg-amber-200 transition-colors duration-200">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                            </svg>
                                                            Edit
                                                        </button>
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                                            <button wire:click="delete({{$data->id}})"
                                                                class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        @endforeach
        <div class="text-3xl font-bold  fixed-bottom mt-6 text-right">
        Grand Total: GHC {{ number_format($datas->flatten(2)->sum('amount'), 2) }}

        </div>
    </div>
    
    @if($datas->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No financial records</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new financial record.</p>
        </div>
    @endif
</div>
                </div>
            </div>
        </div>
    </section>
</div>

@script
<script>
    window.printDaily = function(id) {
        const content = document.getElementById('print-day-' + id);

        if (!content) {
            console.error('Element not found: print-day-' + id);
            alert('Nothing to print');
            return;
        }

        // Get date and total from the content
        const dateHeader = content.querySelector('h3');
        const totalAmount = content.querySelector('.text-2xl.font-bold');
        const dateText = dateHeader ? dateHeader.textContent.trim() : 'Financial Report';
        const totalText = totalAmount ? totalAmount.textContent.trim() : 'GHC 0.00';

        // 1. CHANGE: Use "let" instead of "const" so we can append to the string
        let htmlContent = '<!DOCTYPE html>' +
            '<html>' +
            '<head>' +
            '<meta charset="UTF-8">' +
            '<title>Daily Financial Report - ' + dateText + '</title>' +
            '<style>' +
            '@page { size: A4 portrait; margin: 1.5cm; }' +
            '* { margin: 0; padding: 0; box-sizing: border-box; }' +
            'body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; padding: 20px; background: white; color: #000; }' +
            '.header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #2563eb; padding-bottom: 20px; }' +
            '.header h1 { color: #1e3a8a; font-size: 28px; margin-bottom: 10px; }' +
            '.header .report-type { font-size: 18px; color: #3b82f6; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }' +
            '.header .date { font-size: 16px; color: #4b5563; margin-top: 5px; }' +
            '.summary { background: #eff6ff; padding: 15px; border-radius: 8px; margin-bottom: 30px; text-align: center; border: 1px solid #bfdbfe; }' +
            '.summary-label { font-size: 14px; color: #3b82f6; font-weight: 600; }' +
            '.summary-amount { font-size: 32px; color: #1e3a8a; font-weight: bold; margin-top: 5px; }' +
            '.group-section { margin-bottom: 30px; page-break-inside: avoid; }' +
            '.group-header { background: #f3f4f6; padding: 10px 15px; border-left: 5px solid #2563eb; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }' +
            '.group-name { font-size: 16px; font-weight: bold; color: #111827; }' +
            '.group-total { font-size: 16px; font-weight: bold; color: #2563eb; }' +
            'table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }' +
            'th { background: #f9fafb; padding: 10px 8px; text-align: left; font-size: 11px; font-weight: 700; color: #374151; text-transform: uppercase; border: 1px solid #e5e7eb; }' +
            'td { padding: 8px; border: 1px solid #e5e7eb; font-size: 12px; color: #1f2937; }' +
            'tr:nth-child(even) { background: #f9fafb; }' +
            '.amount-cell { font-weight: 600; color: #000; }' +
            '.footer { margin-top: 50px; padding-top: 20px; border-top: 1px solid #e5e7eb; text-align: center; color: #9ca3af; font-size: 10px; }' +
            '@media print { body { -webkit-print-color-adjust: exact; print-color-adjust: exact; } }' +
            '</style>' +
            '</head>' +
            '<body>' +
            '<div class="header">' +
            '<h1>Tabernacle Christian Fellowship</h1>' +
            '<div class="report-type">Daily Financial Report</div>' +
            '<div class="date">' + dateText + '</div>' +
            '</div>' +
            '<div class="summary">' +
            '<div class="summary-label">Total Daily Income</div>' +
            '<div class="summary-amount">' + totalText + '</div>' +
            '</div>';

        // Get all group sections (using the background class you used)
        const groupSections = content.querySelectorAll('.bg-gray-50');

        groupSections.forEach(function(group) {
            const groupHeader = group.querySelector('.bg-gray-100');
            const groupName = groupHeader ? groupHeader.querySelector('.font-semibold.text-gray-900') : null;
            const groupTotal = groupHeader ? groupHeader.querySelector('.text-blue-600') : null;

            htmlContent += '<div class="group-section">' +
                '<div class="group-header">' +
                '<div class="group-name">' + (groupName ? groupName.textContent.trim() : 'Record Group') + '</div>' +
                '<div class="group-total">Subtotal: ' + (groupTotal ? groupTotal.textContent.trim() : '0.00') + '</div>' +
                '</div>' +
                '<table>' +
                '<thead>' +
                '<tr>' +
                '<th style="width: 20%;">Amount</th>' +
                '<th style="width: 30%;">Posted By</th>' +
                '<th style="width: 20%;">Time</th>' +
                '<th style="width: 30%;">Updated By</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>';

            const rows = group.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                const cells = row.querySelectorAll('td');
                if (cells.length >= 4) {
                    htmlContent += '<tr>' +
                        '<td class="amount-cell">' + cells[0].textContent.trim() + '</td>' +
                        '<td>' + cells[1].textContent.trim().replace(/\s+/g, ' ') + '</td>' +
                        '<td>' + cells[2].textContent.trim() + '</td>' +
                        '<td>' + cells[3].textContent.trim() + '</td>' +
                        '</tr>';
                }
            });

            htmlContent += '</tbody></table></div>';
        });

        htmlContent += '<div class="footer">' +
            '<p>Printed on ' + new Date().toLocaleString() + '</p>' +
            '<p style="margin-top: 5px;">Financial Management System</p>' +
            '</div>' +
            '</body></html>';

        // Open window and print
        const printWindow = window.open('', '_blank', 'width=1024,height=768');
        printWindow.document.write(htmlContent);
        printWindow.document.close();

        // Modern browsers require a slight delay for the content to render before printing
        printWindow.onload = function() {
            setTimeout(function() {
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            }, 500);
        };
    };
</script>
@endscript