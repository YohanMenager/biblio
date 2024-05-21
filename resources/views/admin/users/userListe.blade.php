@extends('admin.layout')

@section('content')


    <h1>Liste des utilisateurs ! </h1><br>
    <form action="userCreate">
        <input class="boutonInput" type="submit" value="Ajouter un utilisateur"/>
    </form>

    <table class="shadow-lg bg-white border-collapse">
        <tr><th class="bg-blue-100 border text-left px-8 py-4">Identifiant</th><th class="bg-blue-100 border text-left px-8 py-4">Nom</th><th class="bg-blue-100 border text-left px-8 py-4">Prenom</th><th class="bg-blue-100 border text-left px-8 py-4">Statut</th><th class="bg-blue-100 border text-left px-8 py-4">Date naissance</th><th class="bg-blue-100 border text-left px-8 py-4">Email</th><th class="bg-blue-100 border text-left px-8 py-4">Adresse</th><th class="bg-blue-100 border text-left px-8 py-4">Code Postal</th><th class="bg-blue-100 border text-left px-8 py-4">Ville</th><th class="bg-blue-100 border text-left px-8 py-4">Newslatter</th><th class="bg-blue-100 border text-left px-8 py-4">MAJ</th></tr>
        @foreach($users  as $user)
        <tr  class="hover:bg-gray-50 focus:bg-gray-300 active:bg-purple-200" tabindex="0"><th>{{$user['id_utilisateur']}}</th>
        <th class="border px-8 py-4"><p>{{$user['nom']}}</th>
        <th class="border px-8 py-4"><p>{{$user['prenom']}}</th>
        <th class="border px-8 py-4"><p>{{$user['statut']}}</th>
        <th class="border px-8 py-4"><p>{{$user['date_naissance']}}</th>
        <th class="border px-8 py-4"><p>{{$user['email']}}</th>
        <th class="border px-8 py-4"><p>{{$user['adresse']}}</th>
        <th class="border px-8 py-4"><p>{{$user['code_postal']}}</th>
        <th class="border px-8 py-4"><p>{{$user['ville']}}</th>
        <th class="border px-8 py-4"><p>{{$user['reception_newsletter']}}</th>
        <td>
            @if($user->statut == "en attente")
                <p class="bouton"><a onclick="return confirm('Voulez vous valider ce compte?')" href="/userValide/{{$user->id_utilisateur}}"  tabindex="-1" role="button" class="bouton">Valider</a></p>
            @else
            <p class="bouton"> <a onclick="return confirm('Voulez vous désactiver ce compte?')" href="/userDesactive/{{$user->id_utilisateur}}" tabindex="-1" role="button" class="bouton">Désactiver</a></p>
            @endif
            <p class="bouton"> <a href="/userUpdate/{{$user->id_utilisateur}}"  tabindex="-1" role="button" class="bouton">Modifier</a></p>
            <p class="bouton"> <a onclick="return confirm('Êtes vous sur de vouloir supprimer cet utilisateur?')" href="/userDelete/{{$user->id_utilisateur}}" tabindex="-1" role="button" class="bouton">Supprimer</a></p></td></tr>
        @endforeach
    </table>



{{-- <div class="overflow-x-auto">
  <table class="table-auto bg-gradient-to-br from-purple-400 via-pink-500 to-red-500 border-collapse">
    <thead>
      <tr>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🌟 Identifiant</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🎩 Nom</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🦄 Prénom</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🌈 Statut</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🎂 Date naissance</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">📧 Email</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🏠 Adresse</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">📮 Code Postal</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🏙️ Ville</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">💌 Newsletter</th>
        <th class="px-4 py-2 text-white font-bold uppercase border-b-2 border-gray-200">🛠️ Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr class="transition-all duration-300 ease-in-out hover:transform hover:scale-105">
        <td class="border px-4 py-2 text-center bg-pink-200">{{ $user['id_utilisateur'] }}</td>
        <td class="border px-4 py-2 text-center bg-purple-200">{{ $user['nom'] }}</td>
        <td class="border px-4 py-2 text-center bg-pink-200">{{ $user['prenom'] }}</td>
        <td class="border px-4 py-2 text-center bg-purple-200">{{ $user['statut'] }}</td>
        <td class="border px-4 py-2 text-center bg-pink-200">{{ $user['date_naissance'] }}</td>
        <td class="border px-4 py-2 text-center bg-purple-200">{{ $user['email'] }}</td>
        <td class="border px-4 py-2 text-center bg-pink-200">{{ $user['adresse'] }}</td>
        <td class="border px-4 py-2 text-center bg-purple-200">{{ $user['code_postal'] }}</td>
        <td class="border px-4 py-2 text-center bg-pink-200">{{ $user['ville'] }}</td>
        <td class="border px-4 py-2 text-center bg-purple-200">{{ $user['reception_newsletter'] }}</td>
        <td class="border px-4 py-2 text-center bg-pink-200">
          @if($user['statut'] == "en attente")
            <a onclick="return confirm('Voulez-vous valider ce compte?')" href="/admin/userValide/{{ $user['id_utilisateur'] }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">Valider</a>
          @else
            <a onclick="return confirm('Voulez-vous désactiver ce compte?')" href="/admin/userDesactive/{{ $user['id_utilisateur'] }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">Désactiver</a>
          @endif
          <a href="/admin/userUpdate/{{ $user['id_utilisateur'] }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">Modifier</a>
          <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')" href="/admin/userDelete/{{ $user['id_utilisateur'] }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block">Supprimer</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> --}}


    <div class="flex justify-center my-8">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($users->onFirstPage())
                <span
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                    aria-disabled="true" aria-label="@lang('pagination.previous')">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $users->previousPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-btn">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                @if ($page === $users->currentPage())
                    <span aria-current="page"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-indigo-500 text-sm font-medium text-white hover:bg-indigo-600 transition-btn">{{ $page }}</span>
                @else
                    <a href="{{ $url }}"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-btn">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-btn">
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

    @endsection
