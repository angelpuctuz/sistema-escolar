
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Docente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-bold mb-6">
                        Editar Docente
                    </h3>

                    @if ($errors->any())
                        <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('docentes.update', $docente->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="numero_empleado"
                                   class="block font-medium text-sm text-gray-700">
                                Número de empleado
                            </label>

                            <input type="text"
                                   id="numero_empleado"
                                   name="numero_empleado"
                                   value="{{ old('numero_empleado', $docente->numero_empleado) }}"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="nombres"
                                   class="block font-medium text-sm text-gray-700">
                                Nombres
                            </label>

                            <input type="text"
                                   id="nombres"
                                   name="nombres"
                                   value="{{ old('nombres', $docente->nombres) }}"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="apellidos"
                                   class="block font-medium text-sm text-gray-700">
                                Apellidos
                            </label>

                            <input type="text"
                                   id="apellidos"
                                   name="apellidos"
                                   value="{{ old('apellidos', $docente->apellidos) }}"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                   class="block font-medium text-sm text-gray-700">
                                Correo electrónico
                            </label>

                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $docente->email) }}"
                                   required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="telefono"
                                   class="block font-medium text-sm text-gray-700">
                                Teléfono
                            </label>

                            <input type="text"
                                   id="telefono"
                                   name="telefono"
                                   value="{{ old('telefono', $docente->telefono) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="especialidad"
                                   class="block font-medium text-sm text-gray-700">
                                Especialidad
                            </label>

                            <input type="text"
                                   id="especialidad"
                                   name="especialidad"
                                   value="{{ old('especialidad', $docente->especialidad) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label for="activo"
                                   class="block font-medium text-sm text-gray-700">
                                Estado
                            </label>

                            <select id="activo"
                                    name="activo"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

                                <option value="1"
                                    {{ old('activo', $docente->activo) == 1 ? 'selected' : '' }}>
                                    Activo
                                </option>

                                <option value="0"
                                    {{ old('activo', $docente->activo) == 0 ? 'selected' : '' }}>
                                    Inactivo
                                </option>

                            </select>
                        </div>

                        <div class="flex items-center gap-4">

                            <button type="submit"
                                    class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                                Actualizar Docente
                            </button>

                            <a href="{{ route('docentes.index') }}"
                               class="rounded-md bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">
                                Cancelar
                            </a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>