@extends('./template/main')

@section('title', 'Dashboard')


@section('content')

    <div class="w-full lg:w-full xl:w-3/4 mx-auto p-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Matéria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Data
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($candidaturas as $key => $candidatura)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $candidatura->nome }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $candidatura->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $candidatura->materia }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($candidatura->created_at)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="/candidaturas/delete/{{ $candidatura->id }}"
                                    class="ver-modal font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    style="cursor: pointer;">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-2xl">Sem Registros</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
