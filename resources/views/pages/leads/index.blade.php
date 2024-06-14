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
                <div class="flex gap-4">
                    @foreach($webTypes as $webType)
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
                                            {{ __('Query') }}
                                        </th>
                                        <th class="p-4">
                                            {{ __('Status') }}
                                        </th>
                                    </tr>
                                    @foreach($webType->leads as $lead)
                                        <tr>
                                            <td class="p-4">
                                                {{ $lead->isQuery }}
                                            </td>
                                            <td class="p-4">
                                                {{ $lead->leadStatus}}
                                            </td>
                                            <td class="hover-action">
                                                <div class="flex gap-4" x-show="open" x-cloak>
                                                    <a href="{{route('leads.show', [$lead ,'tab' =>  request()->tab])}}"
                                                        >
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32" fill="currentColor">
                                                            <defs></defs>
                                                            <title>{{ __('View') }}</title>
                                                            <path
                                                                d="M30.94,15.66A16.69,16.69,0,0,0,16,5,16.69,16.69,0,0,0,1.06,15.66a1,1,0,0,0,0,.68A16.69,16.69,0,0,0,16,27,16.69,16.69,0,0,0,30.94,16.34,1,1,0,0,0,30.94,15.66ZM16,25c-5.3,0-10.9-3.93-12.93-9C5.1,10.93,10.7,7,16,7s10.9,3.93,12.93,9C26.9,21.07,21.3,25,16,25Z"
                                                                transform="translate(0 0)"></path>
                                                            <path
                                                                d="M16,10a6,6,0,1,0,6,6A6,6,0,0,0,16,10Zm0,10a4,4,0,1,1,4-4A4,4,0,0,1,16,20Z"
                                                                transform="translate(0 0)"></path>
                                                            <rect id="_Transparent_Rectangle_"
                                                                data-name="<Transparent Rectangle>" class="cls-1"
                                                                width="32" height="32" style="fill:none">
                                                            </rect>
                                                        </svg>
                                                    </a>
                                                    <a
                                                        href="{{route('leads.edit', [$lead ,'tab' =>  request()->tab])}}">
                                                        <svg class="w-5 h-5" width="24" height="24"
                                                            stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <title>{{ __('Edit') }}</title>
                                                            <path d="M3 21L12 21H21" stroke="#adabab"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M12.2218 5.82839L15.0503 2.99996L20 7.94971L17.1716 10.7781M12.2218 5.82839L6.61522 11.435C6.42769 11.6225 6.32233 11.8769 6.32233 12.1421L6.32233 16.6776L10.8579 16.6776C11.1231 16.6776 11.3774 16.5723 11.565 16.3847L17.1716 10.7781M12.2218 5.82839L17.1716 10.7781"
                                                                stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </a>
                
                                                <form action="{{route('leads.delete', [$lead ,'tab' =>  request()->tab])}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit">

                                                                <svg class="w-4 h-4" fill="#cf2424"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.2.0 by @fontawesome  - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                            <title>{{ __('Delete') }}</title>
                                                            <path
                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                                            </path>
                                                        </svg>
                                                    
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>