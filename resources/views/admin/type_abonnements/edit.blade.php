@extends('admin.layout')
@section('content')
<div class="container mx-auto">
    <div class="w-full max-w-xs mx-auto">
        <h2 class="text-2xl font-bold text-center my-4">Ajouter Type Abonnement</h2>
        <form action="{{ route('type_abonnements.update', $type_abonnement) }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                    Nom
                </label>
                <input type="text" id="nom" name="nom" value="{{ $type_abonnement->nom }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="prix">
                    Prix
                </label>
                <input type="text" id="prix" name="prix" value="{{ $type_abonnement->prix }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</div>
@endsection
