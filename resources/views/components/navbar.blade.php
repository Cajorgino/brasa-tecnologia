<nav class="border-blue-200 bg-blue-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="dashboard" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/logo.png') }}" class="h-8" alt="Brasa Logo" />
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200"
            aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Abrir menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul
                class="flex flex-col font-medium mt-4 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="dashboard"
                        class="{{ request()->is('dashboard') ? 'active-underline' : '' }} block mt-2 py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-white"
                        aria-current="page">Mensagens</a>
                </li>
                <li>
                    <a href="candidaturas"
                        class="{{ request()->is('candidaturas') ? 'active-underline' : '' }} block mt-2 mb-2 py-2 px-3 md:p-0 text-white rounded hover-underline hover:bg-blue-700 md:hover:bg-transparent md:border-0 md:hover:text-white">Candidaturas</a>
                </li>
            <li>
                <button type="button" onclick="window.location.href='logout'"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sair</button>
            </li>

        </ul>
        </div>
    </div>
</nav>
