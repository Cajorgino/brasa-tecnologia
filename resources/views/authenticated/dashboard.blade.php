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
                            Aluno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Data
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($mensagens as $key => $mensagem)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key + 1 }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $mensagem->aluno }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $mensagem->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($mensagem->created_at)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($mensagem->status)
                                    <span class="text-red-400">Pendente</span>
                                @else
                                    <span class="text-green-400">Respondido</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a data-id="{{ $mensagem->id }}"
                                    class="ver-modal font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    style="cursor: pointer;">Ver</a>
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


    <script>
        $(document).ready(function() {
            $('.ver-modal').click(function() {
                var dataId = $(this).data('id');

                $.ajax({
                    url: `/mensagem/${dataId}`,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);

                        $('#titulo-mensagem').text(response.aluno);

                        openModal(response.id, response.aluno, response.email, response
                            .mensagem);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        function openModal(id, aluno, email, mensagem) {
            var modal = $('<div/>', {
                id: 'dynamic-modal',
                class: 'hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full',
                tabindex: '-1',
                'aria-hidden': 'true'
            });

            var modalContent = $('<div/>', {
                class: 'relative p-4 w-full max-w-2xl max-h-full'
            });

            var modalInnerContent = $('<div/>', {
                class: 'relative bg-white rounded-lg shadow dark:bg-gray-700'
            });

            var modalHeader = $('<div/>', {
                    class: 'flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600'
                })
                .append($('<h3/>', {
                    class: 'text-xl font-semibold text-gray-900 dark:text-white',
                    text: aluno
                }))
                .append($('<button/>', {
                    type: 'button',
                    class: 'text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white',
                    'data-modal-hide': 'dynamic-modal',
                    html: '<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg><span class="sr-only">Close modal</span>'
                }));

            var modalBody = $('<div/>', {
                    class: 'p-4 md:p-5 space-y-4'
                })
                .append(
                    '<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">Mensagem: ' + mensagem + '</p>'
                );

            var modalFooter = $('<div/>', {
                    class: 'flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600'
                })
                .append(
                    '<button onclick="apagarAlert(' + id +
                    ')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Apagar</button></button>'
                )

            var replyButton = $('<button/>', {
                type: 'button',
                class: 'ms-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
                text: 'Responder'
            }).click(function() {
                var responseContainer = $('<div/>', {
                    class: 'mt-2 space-y-2 w-full items-center text-right flex flex-col'
                });

                var textarea = $('<textarea/>', {
                    class: 'resposta-textarea w-2/3 rounded-md border-gray-300 shadow-sm',
                    rows: '4',
                    placeholder: 'Digite sua resposta aqui...'
                });

                var sendButton = $('<button/>', {
                    type: 'button',
                    class: 'text-white w-2/3 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
                    text: 'Enviar'
                }).click(function() {

                    $.ajax({
                        url: `/mensagem/enviar`,
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: id,
                            resposta: $('.resposta-textarea').val()
                        },
                        success: function(response) {
                            hideModal();

                            if (response.success) {
                                Swal.fire({
                                    title: 'Sucesso!',
                                    text: 'O e-mail de respota foi enviado.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                })
                            }

                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Ocorreu algum erro ao enviar o e-mail. Tente novamente.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    });

                });

                responseContainer.append('<br/>');
                responseContainer.append(textarea, sendButton);
                modalInnerContent.append(responseContainer);
            });

            modalFooter.append(replyButton);
            modalInnerContent.append(modalHeader, modalBody, modalFooter);
            modalContent.append(modalInnerContent);
            modal.append(modalContent);

            $('body').append(modal);
            showModal();
        }

        function showModal() {
            $('#dynamic-modal').removeClass('hidden').addClass('flex');
        }

        function hideModal() {
            $('#dynamic-modal').remove();
        }

        $(document).on('click', '[data-modal-hide="dynamic-modal"]', function(event) {
            event.stopPropagation();
            hideModal();
        });

        function apagarAlert(id) {

            Swal.fire({
                title: "Você quer mesmo apagar essa mensagem?",
                showDenyButton: true,
                confirmButtonText: "Sim",
                denyButtonText: `Não`
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: `/mensagem/delete/${id}`,
                        type: 'GET',
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire("Erro!", "Ocorreu um erro ao apagar a mensagem.", "error");
                        }
                    });

                } else if (result.isDenied) {}
            });
        }

    </script>


@endsection
