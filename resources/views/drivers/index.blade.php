<section>
    <h1>All Drivers</h1>
    <!-- Table -->
    <div class="min-h-[485px] overflow-auto max-h-[540px]">
        <table class="table-auto overflow-scroll min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-slate-800 sticky top-0">
                <tr>
                    <th scope="col" class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3 text-left">
                        <div class="flex items-center gap-x-2">
                            <span
                                class="pl-5 text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                No.
                            </span>
                        </div>
                    </th>
                    <th scope="col" class="pl-6 lg:pl-3 xl:pl-0 pr-6 py-3 text-left">
                        <div class="flex items-center gap-x-2">
                            <span
                                class="pl-5 text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                First Name
                            </span>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left">
                        <div class="flex items-center gap-x-2">
                            <span
                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                Last Name
                            </span>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-right"></th>
                </tr>
            </thead>
            <tbody class="divide-gray-200 dark:divide-gray-700">
                @foreach ($drivers as $driver)
                    <tr class="w-full h-5 overflow-y-auto border">
                        {{-- no. --}}
                        <td class="h-px w-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $loop->iteration }}
                                </span>
                            </div>
                        </td>
                        {{-- first name --}}
                        <td class="h-px w-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="block text-sm text-gray-500">
                                    {{ $driver->first_name }}
                                </span>
                            </div>
                        </td>
                        {{-- last name --}}
                        <td class="h-px w-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span class="block text-sm text-gray-500">
                                    {{ $driver->last_name }}
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Table -->
</section>
