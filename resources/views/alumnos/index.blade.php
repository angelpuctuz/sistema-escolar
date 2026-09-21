
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div style="background-color: #dcfce7; color: #166534; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">

                        <h3 style="font-size: 24px; font-weight: bold; color: #111827;">
                            Lista de Alumnos
                        </h3>

                        <a href="{{ route('alumnos.create') }}"
                           style="background-color: #16a34a; color: white; padding: 10px 16px; border-radius: 6px; display: inline-block; font-weight: bold; text-decoration: none;">
                            Nuevo Alumno
                        </a>

                    </div>

                    <div style="overflow-x: auto;">

                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #d1d5db;">

                            <thead>

                                <tr style="background-color: #f3f4f6;">

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Matrícula
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Nombres
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Apellidos
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Correo
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Grado
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Grupo
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Acciones
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($alumnos as $alumno)

                                    <tr>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->idmatricula }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->nombres }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->apellidos }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->email ?? 'Sin correo' }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->grado }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $alumno->grupo }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">

                                            <a href="{{ route('alumnos.edit', $alumno->id) }}"
                                               style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; display: inline-block; font-weight: bold; text-decoration: none; margin-bottom: 6px;">
                                                Editar
                                            </a>

                                            <form action="{{ route('alumnos.destroy', $alumno->id) }}"
                                                  method="POST"
                                                  style="display: inline-block;"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este alumno?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        style="background-color: #dc2626; color: #ffffff; padding: 8px 16px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                                                    Eliminar
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7"
                                            style="border: 1px solid #d1d5db; padding: 16px; text-align: center;">
                                            No hay alumnos registrados.
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>