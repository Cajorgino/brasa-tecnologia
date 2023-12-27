@extends('template/guest')

@section('title', 'Trabalhe Conosco')

@section('head-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js" integrity="sha512-efAcjYoYT0sXxQRtxGY37CKYmqsFVOIwMApaEbrxJr4RwqVVGw8o+Lfh/+59TU07+suZn1BWq4fDl5fdgyCNkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')


    <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/3 mx-auto p-4">

        <form class=" mx-auto" action="/projetos/brasatecnologia/candidatar-se" method="POST">
            @csrf
            <div class="flex flex-wrap -mx-2 mb-5">

                <div class="w-1/2 px-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                    <input type="text" id="name" name="name"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Digite seu nome" required>
                </div>
                <div class="w-1/2 px-2">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Digite seu E-mail" required>
                </div>

            </div>

            <div class="flex flex-wrap -mx-2 mb-5">

                <div class="w-1/2 px-2">
                    <label for="city"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade</label>
                    <input type="text" id="city" name="city"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Digite sua cidade" required>
                </div>
                <div class="w-1/2 px-2">
                    <label for="estado"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select id="estado" name="estado" required
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="" selected disabled>Selecione...</option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->sigla }}">{{ $estado->nome }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex flex-wrap -mx-2 mb-5">

                <div class="w-1/2 px-2">
                    <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Nascimento</label>
                    <input type="date" id="birthday" name="birthday"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="w-1/2 px-2">
                    <label for="whats"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Whatsapp</label>
                    <input type="tel" id="whats" name="whats"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="(99) 99999-9999" required>
                </div>

            </div>

            <div class="flex flex-wrap -mx-2 mb-5">

                <div class="w-full px-2">
                    <label for="materia"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matéria</label>
                    <select id="materia" name="materia" required
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="" selected disabled>Selecione...</option>
                        @foreach ($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->nome }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                <textarea id="message" name="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Escreva sua mensagem..." required></textarea>
            </div>

            <div class="flex justify-end w-full">
                <button type="submit"
                    class="text-white block w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
            </div>

        </form>
    </div>

    <script>
        var selector = document.getElementById("whats");
    var im = new Inputmask(["(99) 9999-9999", "(99) 99999-9999"]);
    im.mask(selector);
    </script>


@endsection
