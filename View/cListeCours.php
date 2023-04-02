<!-- component -->
<div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20">
  <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-4xl sm:px-6 lg:px-8">



<div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
    <div>
        <p class="text-xl font-bold text-gray-900">Liste Des Cours</p>
        <p class="text-sm mt-1 mr-0 mb-0 ml-0 font-semi-bold text-gray-500">inscrire adhérent / consulter inscriptions</p>
    </div>
    <div class="mt-4 mr-0 mb-0 ml-0 sm:mt-0">
        <p class="sr-only">Search Position</p>
        <div class="relative">
        <div class="flex items-center pt-0 pr-0 pb-0 pl-3 absolute inset-y-0 left-0 pointer-events-none">
            <p>
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21
                21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </p>
        </div>
        <input placeholder="Search Positions " type="search" class="border block pt-2 pr-0 pb-2 pl-10 w-full py-2
            pl-10 border border-gray-300 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm"/>
        </div>
    </div>
</div>



    <div>

        <?php

        foreach ($lesCours as $cours) {

            echo '<div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
            <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
              <div class="flex items-center flex-1 min-w-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/><path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                </svg>
                <div class="mt-0 mr-0 mb-0 ml-4 flex-1 min-w-0">
                  <p class="text-lg font-bold text-gray-800 truncate">'.$cours->JOUR.'</p>
                  <p class="text-gray-600 text-md">Slack</p>
                </div>
              </div>
              <div class="mt-4 mr-0 mb-0 ml-0 pt-0 pr-0 pb-0 pl-14 flex items-center sm:space-x-6 sm:pl-0 sm:mt-0">
                <a href="" class="bg-gray-800 pt-2 pr-6 pb-2 pl-6 text-lg font-medium text-gray-100 transition-all
                    duration-200 hover:bg-gray-700 rounded-lg">Apply</a>
              </div>
            </div>
          </div>';

        }   
        ?>

    </div>




        </div>
      </div>
    </div>
  </div>
</div>