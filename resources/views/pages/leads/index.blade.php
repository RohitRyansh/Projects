<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <a class=" text-white bg-black py-2.5 rounded font-medium hover:bg-finlendia-dark w-28 text-center" href="{{route('leads.create',['tab' => request()->tab])}}">
                {{__('Add')}}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex p-6">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link> --}}
                    <x-nav-link :href="route('leads', ['tab' => 1])" :active="request()->tab == 1">
                        {{ __('Active Leads') }}
                    </x-nav-link>
                    <x-nav-link :href="route('leads', ['tab' => 2])" :active="request()->tab == 2">
                        {{ __('In Active Leads') }}
                    </x-nav-link>
                </div>
                <div class="flex">
                    @foreach($types as $key => $type)
                        <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300" style="border: 1px solid black">
                            <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                                <tr>
                                    <th scope="col" class="p-4 text-center">{{ $type }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                                <tr>
                                    <th class="p-4">
                                        {{ __('Name') }}
                                    </th>
                                    <th class="p-4">
                                        {{ __('Status') }}
                                    </th>
                                </tr>
                                @foreach($leads as $lead)
                                    @if ($lead->web_type_id == $key)
                                        <tr>
                                            <td class="p-4">
                                                {{ $lead->name }}
                                            </td>
                                            <td class="p-4">
                                                {{ $lead->isStatusActive }}
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
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>