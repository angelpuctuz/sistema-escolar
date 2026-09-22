
<x-app-layout>
    <div class="min-h-screen bg-gray-100">

        <!-- Encabezado superior -->
        <header class="bg-slate-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">

                    <div class="flex items-center">
                        <span class="text-xl font-bold text-white">
                            SISTEMA ESCOLAR
                        </span>
                    </div>

                    <div class="text-sm text-gray-200">
                        Panel principal
                    </div>

                </div>
            </div>
        </header>

        <!-- Contenido principal -->
        <div class="flex">

            <!-- Barra lateral -->
            <aside class="w-64 min-h-screen bg-slate-900 text-white hidden md:block">

                <div class="p-6">
                    <h2 class="text-lg font-bold">
                        Menú principal
                    </h2>
                </div>

                <nav class="px-4 space-y-2">

                    <a href="{{ route('dashboard') }}"
                       class="block px-4 py-3 rounded-lg bg-slate-700 hover:bg-slate-600">
                        Inicio
                    </a>

                    <a href="{{ route('alumnos.index') }}"
                       class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        Gestión de Alumnos
                    </a>

                    <a href="{{ route('docentes.index') }}"
                       class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        Gestión de Docentes
                    </a>

                    <a href="{{ route('materias.index') }}"
                       class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        Gestión de Materias
                    </a>

                    <a href="{{ route('horarios.index') }}"
                       class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                        Horarios
                    </a>

                    <div class="border-t border-slate-700 my-4"></div>

                    <span class="block px-4 py-2 text-xs uppercase text-gray-400">
                        Otros módulos
                    </span>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Incidencias y Tutorías
                    </a>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Calificaciones y Boletas
                    </a>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Eventos Escolares
                    </a>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Préstamo de Equipo
                    </a>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Centro de Cómputo
                    </a>

                    <a href="#"
                       class="block px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-700">
                        Generación de Documentos
                    </a>

                </nav>
            </aside>

            <!-- Área de trabajo -->
            <main class="flex-1 p-6">

                <!-- Bienvenida -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">
                        Bienvenido al sistema escolar
                    </h1>

                    <p class="text-gray-600 mt-2">
                        Administra y consulta la información de tu institución
                        desde este panel principal.
                    </p>
                </div>

                <!-- Tarjetas de resumen -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
                        <p class="text-sm text-gray-500">
                            Alumnos
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            --
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Registros del sistema
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
                        <p class="text-sm text-gray-500">
                            Docentes
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            --
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Registros del sistema
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
                        <p class="text-sm text-gray-500">
                            Materias
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            --
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Registros del sistema
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-orange-500">
                        <p class="text-sm text-gray-500">
                            Horarios
                        </p>

                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            --
                        </p>

                        <p class="text-sm text-gray-500 mt-2">
                            Registros del sistema
                        </p>
                    </div>

                </div>

                <!-- Accesos rápidos -->
                <div class="bg-white rounded-xl shadow p-6">

                    <h2 class="text-xl font-bold text-gray-800 mb-6">
                        Accesos rápidos
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <a href="{{ route('alumnos.index') }}"
                           class="p-5 rounded-lg bg-blue-50 hover:bg-blue-100 border border-blue-200">
                            <h3 class="font-bold text-blue-800">
                                Alumnos
                            </h3>

                            <p class="text-sm text-gray-600 mt-2">
                                Consultar y administrar alumnos.
                            </p>
                        </a>

                        <a href="{{ route('docentes.index') }}"
                           class="p-5 rounded-lg bg-green-50 hover:bg-green-100 border border-green-200">
                            <h3 class="font-bold text-green-800">
                                Docentes
                            </h3>

                            <p class="text-sm text-gray-600 mt-2">
                                Consultar y administrar docentes.
                            </p>
                        </a>

                        <a href="{{ route('materias.index') }}"
                           class="p-5 rounded-lg bg-purple-50 hover:bg-purple-100 border border-purple-200">
                            <h3 class="font-bold text-purple-800">
                                Materias
                            </h3>

                            <p class="text-sm text-gray-600 mt-2">
                                Consultar las materias registradas.
                            </p>
                        </a>

                        <a href="{{ route('horarios.index') }}"
                           class="p-5 rounded-lg bg-orange-50 hover:bg-orange-100 border border-orange-200">
                            <h3 class="font-bold text-orange-800">
                                Horarios
                            </h3>

                            <p class="text-sm text-gray-600 mt-2">
                                Consultar y administrar horarios.
                            </p>
                        </a>

                    </div>

                </div>

            </main>

        </div>

    </div>
</x-app-layout>