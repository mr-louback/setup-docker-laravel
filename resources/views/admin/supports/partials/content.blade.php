<div class="flex flex-col mt-6 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-black">
                        <tr>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                Assunto
                            </th>

                            <th scope="col"
                                class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                Status
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                Comentário
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                Interações
                            </th>

                            <th scope="col" class="relative py-3.5 px-4 text-gray-300">
                                <span class="sr-only ">Ver</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500 divide-y divide-gray-200">
                        @foreach ($supports->items() as $support)
                            <tr>
                                <td class="px-4 py-2 text-sm font-medium whitespace-nowrap">
                                    {{ $support->subject }}
                                </td>
                                <td class="px-12 py-2 text-sm font-medium whitespace-nowrap text-gray-300">
                                    <x-status-support :status="$support->status"></x-status-support>
                                </td>
                                <td class="px-4 py-2 text-sm whitespace-nowrap text-gray-300">
                                    {{ $support->body }}
                                </td>
                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        @foreach ($support->replies as $reply)
                                            {{-- @if ($reply->index < 4) --}}
                                                <div
                                                    class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full shrink-0 bg-green-500">
                                                    {{ getInitials($reply['user']['name']) }}
                                                </div>
                                            {{-- @endif --}}
                                            {{-- <p class="rounded-full">{{count($support->replies)}}</p> --}}
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-sm whitespace-nowrap flex">
                                    @can('owner', $support->user_id)
                                        <a href="{{ route('supports.edit', $support->id) }}"
                                            class="px-1 py-1 text-gray-300 transition-colors duration-200 rounded-lg">
                                            Editar
                                        </a>
                                    @endcan
                                    <a href="{{ route('replies.index', $support->id) }}"
                                        class="px-1 py-1 text-gray-300 transition-colors duration-200 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
