<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-5/12">
                    <!-- Import Section -->
                    <div class="mb-8 bg-white p-6 rounded-xl shadow-sm">
                        <button
                            type="button"
                            wire:click="export"
                            class="w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg flex items-center justify-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download Excel Template
                        </button>
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Import Records</h2>
                        <form wire:submit="import" class="space-y-4">
                            @csrf
                            <div class="flex items-center gap-4">
                                <div class="flex-1">
                                    <label
                                        class="flex items-center justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-lg appearance-none cursor-pointer hover:border-blue-500 focus:outline-none">
                                        <input type="file" wire:model="csv" class="">
                                    </label>
                                    <div class="text-red-400 text-sm mt-2">
                                        @error('csv') {{$message}} @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>

                    @if (session()->has('message'))
                        <div
                            class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md animate-fade-in">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Registration Form -->
                    <form wire:submit="{{$isEdit ? 'update': 'create' }}"
                          class="bg-white rounded-xl shadow-sm p-8 space-y-8">
                        <div class="flex items-center justify-between border-b pb-6">
                            <h1 class="text-2xl font-bold text-gray-800">
                                Family Gathering {{\Carbon\Carbon::now()->year}}
                            </h1>
                            <span class="text-sm text-gray-500">Registration Form</span>
                        </div>

                        <!-- Name Fields Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="firstName" class="block text-sm font-medium text-gray-700">
                                    First Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="first_name"
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    placeholder="Enter first name"
                                    autocomplete="Danielo"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('first_name') {{$message}} @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="lastName" class="block text-sm font-medium text-gray-700">
                                    Last Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="last_name"
                                    type="text"
                                    id="lastName"
                                    name="lastName"
                                    placeholder="Enter last name"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('last_name') {{$message}} @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Other Names and Residence -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="otherNames" class="block text-sm font-medium text-gray-700">
                                    Other Names
                                </label>
                                <input
                                    wire:model="other_names"
                                    type="text"
                                    id="otherNames"
                                    name="otherNames"
                                    placeholder="Enter other names"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('other_names') {{$message}} @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="residence" class="block text-sm font-medium text-gray-700">
                                    Residence <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="residence"
                                    type="text"
                                    id="residence"
                                    name="residence"
                                    placeholder="Enter residence"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('residence') {{$message}} @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Gender and Contact -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="gender" class="block text-sm font-medium text-gray-700">
                                    Gender <span class="text-red-500">*</span>
                                </label>
                                <select
                                    wire:model="gender"
                                    id="gender"
                                    name="gender"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="text-red-400 text-sm">
                                    @error('gender') {{$message}} @enderror
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="contact" class="block text-sm font-medium text-gray-700">
                                    Contact Number <span class="text-red-500">*</span>
                                </label>
                                <input
                                    wire:model="contact"
                                    type="number"
                                    id="contact"
                                    name="contact"
                                    placeholder="Enter contact number"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                                >
                                <div class="text-red-400 text-sm">
                                    @error('contact') {{$message}} @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Church -->
                        <div class="space-y-2">
                            <label for="church" class="block text-sm font-medium text-gray-700">
                                Church <span class="text-red-500">*</span>
                            </label>
                            <input
                                wire:model="church"
                                type="text"
                                id="church"
                                name="church"
                                placeholder="Enter church name"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200"
                            >
                            <div class="text-red-400 text-sm">
                                @error('church') {{$message}} @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 space-y-4">
                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 font-medium text-lg"
                            >
                                {{$isEdit ? "Update Registration" : "Submit Registration"}}
                            </button>


                        </div>
                    </form>
                </div>
                <div class="lg:w-7/12 ">
                    <div class="max-w-7xl mx-auto">
                        <div class="bg-white rounded-xl shadow-lg p-6 space-y-6">
                            <!-- Header Section -->
                            <div class="flex justify-between items-center border-b border-gray-200 pb-6">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">Registered Members</h2>
                                    <p class="mt-1 text-sm text-gray-500">For the year {{2025}}</p>
                                </div>
                                <div class="flex space-x-4">
                                    <div class="bg-blue-50 rounded-lg px-4 py-2">
                                        <span class="text-sm font-medium text-blue-600">Males: {{$males}}</span>
                                    </div>
                                    <div class="bg-pink-50 rounded-lg px-4 py-2">
                                        <span class="text-sm font-medium text-pink-600">Females: {{$females}}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Section -->
                            <div class="overflow-x-auto rounded-lg border border-gray-200">
                                <table id="sorting-table" class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Full Name
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Residence
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Contact
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Gender
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Church
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($familiesByYear as $family)
                                        <tr class="hover:bg-gray-50 transition-all duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div
                                                    class="text-sm font-medium text-gray-900">{{ $family->first_name }} {{ $family->other_names }} {{ $family->last_name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-600">{{ $family->residence }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-600">{{ $family->contact }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $family->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                    {{ $family->gender }}
                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-600">{{ $family->church }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                                <button wire:click="edit({{$family->id}})"
                                                        class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button wire:click="delete({{$family->id}})"
                                                        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                                <button onclick="printMemberCard({{ json_encode($family) }})"
                                                        class="inline-flex items-center px-3 py-1.5 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                                    </svg>
                                                    Print
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$familiesByYear->links()}}
                        <div id="printTemplate" style="display: none;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@script
<script>
    if (document.getElementById("sorting-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#sorting-table", {
            searchable: true,
            perPageSelect: [10, 25, 50, 100],
            perPage: 25,
            sortable: true,
            labels: {
                placeholder: "Search members...",
                perPage: "entries per page",
                noRows: "No members found",
                info: "Showing {start} to {end} of {rows} members"
            }
        });
    }

    function printMemberCard(member) {
        // Create print window content
        const printContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Member Card - ${member.first_name} ${member.last_name}</title>
                <style>
                    @page {
                        size: A2;
                        margin: 0;
                    }

                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    body {
                        width: 420mm;
                        height: 594mm;
                        font-family: 'Arial', sans-serif;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        padding: 20mm;
                    }

                    .card-container {
                        width: 100%;
                        height: 100%;
                        background: white;
                        border-radius: 30px;
                        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                        overflow: hidden;
                        display: flex;
                        flex-direction: column;
                    }

                    .card-header {
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        padding: 60px;
                        text-align: center;
                        color: white;
                        position: relative;
                    }

                    .card-header::after {
                        content: '';
                        position: absolute;
                        bottom: -2px;
                        left: 0;
                        right: 0;
                        height: 50px;
                        background: white;
                        border-radius: 50% 50% 0 0;
                    }

                    .header-title {
                        font-size: 72px;
                        font-weight: bold;
                        margin-bottom: 20px;
                        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
                    }

                    .header-subtitle {
                        font-size: 36px;
                        opacity: 0.9;
                    }

                    .card-body {
                        flex: 1;
                        padding: 80px 100px;
                        display: flex;
                        flex-direction: column;
                        gap: 50px;
                    }

                    .avatar-section {
                        display: flex;
                        justify-content: center;
                        margin-bottom: 40px;
                    }

                    .avatar {
                        width: 300px;
                        height: 300px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 120px;
                        color: white;
                        font-weight: bold;
                        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
                        border: 10px solid #f3f4f6;
                    }

                    .info-grid {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 50px;
                    }

                    .info-item {
                        background: #f9fafb;
                        padding: 40px;
                        border-radius: 20px;
                        border-left: 8px solid #667eea;
                    }

                    .info-label {
                        font-size: 28px;
                        color: #6b7280;
                        text-transform: uppercase;
                        letter-spacing: 2px;
                        margin-bottom: 15px;
                        font-weight: 600;
                    }

                    .info-value {
                        font-size: 42px;
                        color: #111827;
                        font-weight: bold;
                        word-wrap: break-word;
                    }

                    .full-width {
                        grid-column: 1 / -1;
                    }

                    .gender-badge {
                        display: inline-block;
                        padding: 15px 40px;
                        border-radius: 50px;
                        font-size: 38px;
                        font-weight: bold;
                    }

                    .gender-male {
                        background: #dbeafe;
                        color: #1e40af;
                    }

                    .gender-female {
                        background: #fce7f3;
                        color: #be185d;
                    }

                    .card-footer {
                        background: #f9fafb;
                        padding: 40px;
                        text-align: center;
                        border-top: 3px solid #e5e7eb;
                    }

                    .footer-text {
                        font-size: 28px;
                        color: #6b7280;
                    }

                    .print-date {
                        margin-top: 20px;
                        font-size: 24px;
                        color: #9ca3af;
                    }

                    @media print {
                        body {
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="card-container">
                    <div class="card-header">
                        <div class="header-title">Tabernacle Christian Fellowship</div>
                        <div class="header-subtitle">Family Gathering</div>
                        <div class="header-subtitle">{{date('Y-m-d')}}</div>

                    </div>

                    <div class="card-body">


                        <div class="info-grid">
                            <div class="info-item ">
                                <div class="info-label">Full Name</div>
                                <div class="info-value">${member.first_name} ${member.other_names || ''} ${member.last_name}</div>
                                
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Church</div>
                                <div class="info-value">${member.church}</div>
                                
                            </div>

                            <div class="info-item">
                                <div class="info-label">Gender</div>
                                <div class="info-value">
                                    <span class="gender-badge ${member.gender === 'Male' ? 'gender-male' : 'gender-female'}">
                                        ${member.gender}
                                    </span>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Year</div>
                                <div class="info-value">${member.year || 'N/A'}</div>
                            </div>

                             <div class="info-item">
                                <div class="info-label">Residence</div>
                                <div class="info-value">                                  
                                    ${member.residence}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Year</div>
                                <div class="info-value">${member.contact}</div>
                            </div>                              
                          </div>                                                   
                    </div>

                    <div class="card-footer">
                        <div class="print-date">Printed on: ${new Date().toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        })}</div>
                    </div>
                </div>
            </body>
            </html>
        `;

        // Open print window
        const printWindow = window.open('', '_blank', 'width=1200,height=800');
        printWindow.document.write(printContent);
        printWindow.document.close();

        // Wait for content to load, then print
        printWindow.onload = function () {
            setTimeout(() => {
                printWindow.print();
            }, 250);
        };
    }

    // Make function globally available
    window.printMemberCard = printMemberCard;
</script>
@endscript

