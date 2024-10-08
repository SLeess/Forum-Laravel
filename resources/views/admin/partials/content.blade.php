<div class="flex flex-col my-4 mt-6">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div id="table" class="flex justify-center inline-block py-2 align-middle min-w-6xl sm:min-w-7xl md:px-6 lg:px-8">
            <div class="min-w-full overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Assunto
                            </th>

                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Status
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Comentário
                            </th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Interações</th>

                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-gray-500 dark:text-gray-400">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                        @forelse ($supports->items() as $support)
                            <tr>
                                <td class="px-4 py-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                    {{ mb_strimwidth($support->subject, 0, 16, "...") }}
                                </td>
                                <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                    <x-status_support :status="$support->status"></x-status_support>
                                </td>

                                <td class="px-4 py-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                    {{ mb_strimwidth($support->body, 0, 10, "...") }}
                                </td>

                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- @foreach ($support->replies as $reply)
                                            @if ($loop->index < 4)
                                                <div class="object-cover w-6 h-6 -mx-1 bg-green-500 border-2 border-white rounded-full dark:border-gray-700 shrink-0">{{ getInitials($reply['user']['name']) }}</div>
                                            @endif
                                        @endforeach --}}
                                    </div>
                                </td>

                                <td class="flex px-4 py-2 text-sm whitespace-nowrap" style="justify-content: center;">
                                    {{-- @can('owner', $support->user_id) --}}
                                    <a href="{{ route('supports.edit', $support->id) }}" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                        Editar
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- {{ route('replies.index', $support->id) }} --}}
                                    <a href="{{ route('supports.show', $support->id) }}" class="px-1 py-1 text-right text-gray-500 transition-colors duration-200 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                        {{-- @foreach ($supports->items() as $support)
                        <tr>
                            <td class="px-4 py-2 text-sm font-medium whitespace-nowrap dark:text-white">
                                {{ $support->subject }}
                            </td>
                            <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                <x-status-support :textStatus="$support->status" :color="'black'"></x-status-support>
                            </td>

                            <td class="px-4 py-2 text-sm whitespace-nowrap">
                                <div class="flex items-center">
                                    @foreach ($support->replies as $reply)
                                        @if ($loop->index < 4)
                                            <div class="object-cover w-6 h-6 -mx-1 bg-green-500 border-2 border-white rounded-full dark:border-gray-700 shrink-0">{{ getInitials($reply['user']['name']) }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </td>

                            <td class="flex px-4 py-2 text-sm whitespace-nowrap">
                                @can('owner', $support->user_id)
                                <a href="{{ route('supports.edit', $support->id) }}" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    Editar
                                </a>
                                @endcan
                                <!-- {{ route('replies.index', $support->id) }} -->
                                <a href="#" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<x-pagination :paginator="$supports" :appends="$filters"/>
