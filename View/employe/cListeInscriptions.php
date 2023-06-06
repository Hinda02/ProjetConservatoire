<div>
<?php
    include("View/navbar.php");
?>
<div class="sm:ml-40">
    <div></div>
    <!--<div class="flex items-center justify-between p-4 bg-white dark:bg-gray-900">
        <div></div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rechercher un cours">
        </div>
    </div>-->
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Adhérent
                </th>
                <th scope="col" class="px-6 py-3">
                    Téléphone
                </th>
                <th scope="col" class="px-6 py-3">
                    Séance
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Inscription
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
        <?php

            foreach ($lesInscriptions as $inscription) {

                echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                            </svg>
                                <div class="pl-3">
                                    <div class="text-base font-semibold">'.$lesEleves[$inscription->IDELEVE]->NOM.' '.$lesEleves[$inscription->IDELEVE]->PRENOM.'</div>
                                    <div class="font-normal text-gray-500">'.$lesEleves[$inscription->IDELEVE]->MAIL.'</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                '.$lesEleves[$inscription->IDELEVE]->TEL.'
                            </td>
                            <td class="px-6 py-4">
                                '.$inscription->NUMSEANCE.'
                            </td>
                            <td class="px-6 py-4">
                                '.$inscription->DATEINSCRIPTION.'
                            </td>
                            <td class="px-6 py-4">
                                <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                                    <a class="flex items-center bg-red-500 h-12 px-3 mt-2 rounded hover:bg-gray-300" href="index.php?uc=inscriptions&action=supprimer&idprof='.$inscription->IDPROF.'&ideleve='.$inscription->IDELEVE.'&nums='.$inscription->NUMSEANCE.'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" 
                                            stroke-linecap="round" stroke-linejoin="round"><path d="M20 11.08V8l-6-6H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h6"/><path d="M14 3v5h5M15.88 
                                            20.12l4.24-4.24M15.88 15.88l4.24 4.24"/>
                                        </svg>
                                        <span class="ml-3 text-black text-sm font-medium">Désincrire</span>
                                    </a>
                                </div>
                            </td>

                        </tr>';

            }   
        ?>

        </tbody>
    </table>
</div>
