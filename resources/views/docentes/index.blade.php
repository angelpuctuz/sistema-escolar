
<x-app-layout>
    <x-boton-inicio />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Docentes') }}
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
                            Lista de Docentes
                        </h3>

                        <a href="{{ route('docentes.create') }}"
                           style="background-color: #16a34a; color: white; padding: 10px 16px; border-radius: 6px; display: inline-block; font-weight: bold; text-decoration: none;">
                            Nuevo Docente
                        </a>

                    </div>

                    <div style="overflow-x: auto;">

                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #d1d5db;">

                            <thead>

                                <tr style="background-color: #f3f4f6;">

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Número de empleado
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
                                        Teléfono
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Especialidad
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Estado
                                    </th>

                                    <th style="border: 1px solid #d1d5db; padding: 12px; text-align: left;">
                                        Acciones
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($docentes as $docente)

                                    <tr>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->numero_empleado }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->nombres }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->apellidos }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->email }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->telefono ?? 'Sin teléfono' }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->especialidad ?? 'Sin especialidad' }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">
                                            {{ $docente->activo ? 'Activo' : 'Inactivo' }}
                                        </td>

                                        <td style="border: 1px solid #d1d5db; padding: 12px;">

                                            <!-- Botón Editar -->

                                            <a href="{{ route('docentes.edit', $docente->id) }}"
                                               style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; display: inline-block; font-weight: bold; text-decoration: none; margin-bottom: 6px;">
                                                Editar
                                            </a>

                                            <!-- Botón Eliminar -->

                                            <form action="{{ route('docentes.destroy', $docente->id) }}"
                                                  method="POST"
                                                  style="display: inline-block;"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este docente?');">

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

                                        <td colspan="8"
                                            style="border: 1px solid #d1d5db; padding: 16px; text-align: center;">
                                            No hay docentes registrados.
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