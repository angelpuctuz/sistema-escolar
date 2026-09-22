<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Alumno
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-2xl font-bold mb-6">
                    Editar Alumno
                </h3>

                <form method="POST" action="{{ route('alumnos.update', $alumno->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="idmatricula" class="block font-medium text-sm text-gray-700">
                            Matrícula
                        </label>

                        <input
                            type="text"
                            name="idmatricula"
                            id="idmatricula"
                            value="{{ old('idmatricula', $alumno->idmatricula) }}"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            required
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
                            value="{{ old('nombres', $alumno->nombres) }}"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            required
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
                            value="{{ old('apellidos', $alumno->apellidos) }}"
                            class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                            required
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
                            value="{{ old('email', $alumno->email) }}"
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
                                    {{ old('grupo_id', $alumno->grupo_id) == $grupo->id ? 'selected' : '' }}
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
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
                        >
                            Actualizar Alumno
                        </button>

                        <a
                            href="{{ route('alumnos.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"
                        >
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout> 