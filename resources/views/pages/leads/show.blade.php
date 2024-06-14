<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex p-6">
                <div>
                    <h2 class="font-medium">
                        {{__('Lead Details')}}
                    </h2>
                        <div class="p-6">
                            <h2 class="font-medium">Query</h2>
                            <div class="text-sm text-black">{{ $lead->isQuery }}</div>
                            
                            <div class="flex gap-4 py-2">
                                <h2 class="font-medium">Status</h2>
                                <div>{{ $lead->leadStatus}}</div>
                                
                            </div>

                            <div class="flex gap-4 py-2">
                                <h2 class="font-medium">Created At</h2>
                                <div class="flex gap-1 items-center font-sm"><svg class="w-4 h-4"
                                        xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24"
                                        aria-labelledby="timeIconTitle" fill="none" stroke="currentColor">
                                        <title id="timeIconTitle">{{ __('Time') }}</title>
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 5 12 12 16 16"></polyline>
                                    </svg>
                                    {{ $lead->created_at->format('d M Y') }} /
                                    ({{ $lead->created_at->format('H:i:s A') }})
                                </div>
                            </div>
                        </div>

                    {{-- @foreach($webTypes as $webType)
                        <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300" style="border: 1px solid black">
                            <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                                <tr>
                                    <th scope="col" class="p-4 text-center">{{ $webType->name }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                                @if ($webType->leads->count() > 0)
                                    <tr>
                                        <th class="p-4">
                                            {{ __('Name') }}
                                        </th>
                                        <th class="p-4">
                                            {{ __('Status') }}
                                        </th>
                                    </tr>
                                    @foreach($webType->leads as $lead)
                                        <tr>
                                            <td class="p-4">
                                                {{ $lead->name }}
                                            </td>
                                            <td class="p-4">
                                                {{ $lead->leadStatus}}
                                            </td>
                                            <td>
                                                <a href="{{route('leads.edit', [$lead ,'tab' => request()->tab])}}">Edit</a>
                                            </td>
                                            <td class="p-2">
                                                <form action="{{route('leads.delete', [$lead ,'tab' => request()->tab])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>