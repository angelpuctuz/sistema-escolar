
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Alumno
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('alumnos.update', $alumno->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>Matrícula</label>
                        <input type="text" name="idmatricula"
                            value="{{ $alumno->idmatricula }}"
                            class="block mt-1 w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Nombres</label>
                        <input type="text" name="nombres"
                            value="{{ $alumno->nombres }}"
                            class="block mt-1 w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos"
                            value="{{ $alumno->apellidos }}"
                            class="block mt-1 w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Correo</label>
                        <input type="email" name="email"
                            value="{{ $alumno->email }}"
                            class="block mt-1 w-full border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label>Grado</label>
                        <input type="number" name="grado"
                            value="{{ $alumno->grado }}"
                            min="1" max="6"
                            class="block mt-1 w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Grupo</label>
                        <input type="text" name="grupo"
                            value="{{ $alumno->grupo }}"
                            class="block mt-1 w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Actualizar Alumno
                    </button>

                    <a href="{{ route('alumnos.index') }}"
                        class="ml-2 text-gray-600">
                        Cancelar
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>