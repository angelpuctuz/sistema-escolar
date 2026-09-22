<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Alumno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-bold mb-6">
                        Nuevo Alumno
                    </h3>

                    <form method="POST" action="{{ route('alumnos.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="idmatricula" class="block font-medium text-sm text-gray-700">
                                Matrícula
                            </label>

                            <input
                                type="text"
                                name="idmatricula"
                                id="idmatricula"
                                value="{{ old('idmatricula') }}"
                                required
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('idmatricula')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nombres" class="block font-medium text-sm text-gray-700">
                                Nombres
                            </label>

                            <input
                                type="text"
                                name="nombres"
                                id="nombres"
                                value="{{ old('nombres') }}"
                                required
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('nombres')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="apellidos" class="block font-medium text-sm text-gray-700">
                                Apellidos
                            </label>

                            <input
                                type="text"
                                name="apellidos"
                                id="apellidos"
                                value="{{ old('apellidos') }}"
                                required
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('apellidos')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            >

                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="grupo_id" class="block font-medium text-sm text-gray-700">
                                Grupo
                            </label>

                            <select
                                name="grupo_id"
                                id="grupo_id"
                                required
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            >
                                <option value="">Selecciona un grupo</option>

                                @foreach($grupos as $grupo)
                                    <option
                                        value="{{ $grupo->id }}"
                                        {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}
                                    >
                                        {{ $grupo->grado }}° {{ $grupo->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            @error('grupo_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                            >
                                Guardar Alumno
                            </button>

                            <a
                                href="{{ route('alumnos.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600"
                            >
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>