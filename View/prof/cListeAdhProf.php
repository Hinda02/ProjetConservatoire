<div class="bg-indigo-200 h-screen">
<?php
    $_SESSION["lesAdherents"] = $lesAdherents;
    $_SESSION["laSeance"] = $laSeance;
    $_SESSION["leProf"] = $leProf;

    include("View/navbarprof.php");
?>
<div class="sm:ml-40">
    <div class="flex items-center justify-between p-4 bg-indigo-200">
        <div>
            <a href="createpdf.php" class="flex items-center border border-gray-300 rounded-lg bg-indigo-100 p-2">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#4c4c4c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                <rect x="6" y="14" width="12" height="8"></rect>
            </svg>
                <p class="text-gray-600 pl-2">Imprimer en PDF</p>
            </a>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-indigo-100 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher un adhérent">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-indigo-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Adhérent
                </th>
                <th scope="col" class="px-6 py-3">
                    Téléphone
                </th>
                <th scope="col" class="px-6 py-3">
                    Adresse
                </th>
                <th scope="col" class="px-6 py-3">
                    Bourse
                </th>
               
            </tr>
        </thead>
        <tbody>
        <?php

            foreach ($lesAdherents as $adherent) {

                echo '<tr class="bg-indigo-100 border-b hover:bg-indigo-100">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                            </svg>
                                <div class="pl-3">
                                    <div class="text-base font-semibold">'.$adherent->NOM.' '.$adherent->PRENOM.'</div>
                                    <div class="font-normal text-gray-500">'.$adherent->MAIL.'</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                '.$adherent->TEL.'
                            </td>
                            <td class="px-6 py-4">
                                '.$adherent->ADRESSE.'
                            </td>
                            <td class="px-6 py-4">
                                '.$adherent->BOURSE.'
                            </td>
                           
                        </tr>';

            }   
        ?>

        </tbody>
    </table>
</div>
