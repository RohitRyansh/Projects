<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
                <div class="p-6 flex">
                    <form action="{{route('leads.update',[$lead,'tab' => request()->tab])}}" class="mt-6 space-y-6" method="post">
                        @method('PUT')
                        @csrf
                        <div class="flex w-full max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
                            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Lead Name</label>
                            <input id="textInputDefault" type="text" value="{{$lead->name}}" class="w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600" name="name" placeholder="Enter your lead name" autocomplete="name"/>
                            @error('name')
                                <div class="alert alert-danger text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="relative flex w-full max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
                            <label  class="w-fit pl-0.5 text-sm">Lead Types</label>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            <select name="type" class="w-full appearance-none rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600">
                                @foreach ($types as $type)
                                    <option value="{{$type}}" @if ($type == $lead->type)selected @endif>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="relative flex w-full max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
                            <label  class="w-fit pl-0.5 text-sm">Status</label>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            <select name="status" class="w-full appearance-none rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600">
                                <option value="1">{{ __('Active') }}</option>
                                <option value="0" @if (!$lead->status) selected @endif>{{ __('In Active') }}</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{route('leads',['tab' => request()->tab])}}">
                                <x-secondary-button>
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </a>
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>