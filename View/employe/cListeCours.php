<div>
<?php
    include("View/navbar.php");
?>


<div class="sm:ml-40">

<?php

if(!empty($_SESSION['message']))
    {
      ?>
        <div class="m-2 bg-red-200 font-semibold flex justify-center alert alert-success" role="alert" data-auto-dismiss="2000">
            <?php echo($_SESSION["message"]); 
                  unset($_SESSION["message"]); 	
            ?>
        </div>

      <?php
    }

?>

    <div class="flex items-center justify-between p-4 bg-white">
        <div></div>


        <div class="relative">

        <form class="flex items-center" action="index.php?uc=cours&action=recherche" method="post">
        
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>

               <form action="index.php?uc=cours&action=recherche" method="post">             
             <input type="text" name="recherche" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Rechercher un cours">
             <button class="ml-2 shadow bg-orange-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-1 px-2 rounded" type="submit">
            Chercher
             </button>  
        </form>

        </div>

    </div>
 
    
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Cours
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Niveau
                </th>
                <th scope="col" class="px-6 py-3">
                    Capacité
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
        <?php

            foreach ($lesCours as $cours) {

                echo '<tr class="bg-white border-b ">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                            </svg>
                                <div class="pl-3">
                                    <div class="text-base font-semibold">'.$lesProfs[$cours->IDPROF]->INSTRUMENT.'</div>
                                    <div class="font-normal text-gray-500">Professeur: '.$lesProfs[$cours->IDPROF]->NOM.' '.$lesProfs[$cours->IDPROF]->PRENOM.'</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                '.$cours->JOUR.' '.$cours->TRANCHE.'
                            </td>
                            <td class="px-6 py-4">
                                '.$cours->NIVEAU.'
                            </td>
                            <td class="px-6 py-4">
                                '.$cours->CAPACITE.'
                            </td>
                            <td class="px-6 py-4">
                                <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                                    <a class="flex items-center bg-orange-400 h-12 px-3 mt-2 rounded hover:bg-gray-300" href="index.php?uc=eleve&action=inscription&idprof='.$cours->IDPROF.'&nums='.$cours->NUMSEANCE.'&jour='. $cours->JOUR .'&tranche='. $cours->TRANCHE .'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                        <span class="ml-3 text-black text-sm font-medium">Adhérent</span>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                                    <a class="flex items-center bg-blue-900 h-12 px-3 mt-2 rounded hover:bg-gray-300" href="index.php?uc=inscriptions&action=liste&idprof='. $cours->IDPROF .'&nums='. $cours->NUMSEANCE .'&jour='. $cours->JOUR .'&tranche='. $cours->TRANCHE .'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                    </path><circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                        <span class="ml-3 text-white text-sm font-medium">Inscriptions</span>
                                    </a>
                                </div>
                            </td>
                        </tr>';

            }   
        ?>

        </tbody>
    </table>
</div>
