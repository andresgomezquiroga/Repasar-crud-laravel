@extends('home.Layout.masterPage')

@section('title', 'Tabla de usuarios')
@section('content')


<!-- component -->
<h1 class="text-3xl font-bold text-gray-800 mb-6">Listado de Usuarios</h1>
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Correo Electrónico
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$user->name}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$user->email}}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{route('user.edit', $user->id)}}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 text-center text-sm text-gray-500">
    Desarrollado con <a href="https://tailwindcss.com" class="text-indigo-600 hover:text-indigo-800 font-semibold" target="_blank" rel="noopener noreferrer">Tailwind CSS</a>
</div>
@endsection
