
@extends('admin.layout')
@section('content')

<script>
    function fermerMessage(identifiant)
    {
        var element = document.getElementById(identifiant);
        element.style.display = "none";
    }
</script>

<div class="container mx-auto">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative break-normal" role="alert" id="succès">
            <p class="pr-5">{{session('success')}}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="fermerMessage('succès')">
                    <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                <span>
            </p>
        </div>
    @endif

    @if(session('fail'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative break-normal" role="alert" id="succès">
            <p class="pr-5">{{session('fail')}}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="fermerMessage('succès')">
                    <svg class="fill-current h-6 w-6 text-red-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                <span>
            </p>
        </div>
    @endif
    <div class="overflow-x-auto">
        <div class="bg-white shadow-md rounded my-6">
            <div class="flex justify-between items-center px-6 py-4">
                <div class="flex items-center">
                    <h2 class="text-2xl font-bold">Réservations</span></h2>
                </div>


                <div class="flex">
                    <a href="/admin/reservations-create-form" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded flex items-center">
                        <span class="mr-2">
						<svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
                        </span>
                        <span>Créer une réservation</span>
                    </a>
                </div>

            </div>

        <table class="min-w-full table-auto">
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">numéro</th>
            <th class="py-3 px-6 text-left">livre</th>
            <th class="py-3 px-6 text-left">utilisateur</th>
            <th class="py-3 px-6 text-left">date de la réservation</th>
            <th class="py-3 px-6 text-left"></th>
        </tr>
        @foreach($reservations as $uneReservation)
        <tr class="border-b border-gray-200 hover:bg-gray-100">
        <td class="py-3 px-6 text-left font-semibold">{{$uneReservation->id_reservation}}</td>
        <td class="py-3 px-6 text-left font-semibold">{{$uneReservation->ouvrage->titre}}</td>
        <td class="py-3 px-6 text-left font-semibold">{{$uneReservation->utilisateur->prenom}}
        {{$uneReservation->utilisateur->nom}}</td>
        <td class="py-3 px-6 text-left font-semibold">{{$uneReservation->date_reservation}}</td>
        <td class="py-3 px-6 text-left font-semibold">
            
<button class="bg-gray-300 hover:bg-gray-400  text-slate-500 font-bold py-2 px-4 rounded-l inline" onclick="return confirm('Voulez vous vraiment supprimer cet ouvrage?')"><a href="{{ url('/admin/reservations-delete').'/'.$uneReservation->id_reservation}}">Supprimer</a>
    </button><button class="bg-gray-300 hover:bg-gray-400  text-slate-500 font-bold py-2 px-4 inline"><a href="{{ url('/admin/reservations-modify-form').'/'.$uneReservation->id_reservation}}">Modifier</a>
</button>
<form method="POST" action="/admin/reservations-mail">
    @csrf
    <input type="submit" class="bg-gray-300 hover:bg-gray-400  text-slate-500 font-bold py-2 px-4 rounded-r inline" value="prêt"></input>
    <input type="hidden" name="idReservation" value={{$uneReservation->id_reservation}}>
</form>

           

            </td>
    </tr>
        @endforeach
    </table>

    <!-- <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"><a href="/admin/reservations-create-form">Créer une réservation</a></button> -->




        <div class="flex justify-center my-8">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                {{-- Previous Page Link --}}
                @if ($reservations->onFirstPage())
                    <span
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                        aria-disabled="true" aria-label="@lang('pagination.previous')">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <a href="{{ $reservations->previousPageUrl() }}"
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        {!! __('pagination.previous') !!}
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($reservations->getUrlRange(1, $reservations->lastPage()) as $page => $url)
                    @if ($page === $reservations->currentPage())
                        <span aria-current="page"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-500 text-sm font-medium text-white hover:bg-indigo-600">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($reservations->hasMorePages())
                    <a href="{{ $reservations->nextPageUrl() }}"
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        {!! __('pagination.next') !!}
                    </a>
                @else
                    <span
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                        aria-disabled="true" aria-label="@lang('pagination.next')">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </nav>
        </div>

        </div>

</div>
@endsection
