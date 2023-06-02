<section style="background-image: url('Images/music.png');" class="bg-cover bg-gray-50">

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

  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="5.5" cy="17.5" r="2.5"/><circle cx="17.5" cy="15.5" r="2.5"/><path d="M8 17V5l12-2v12"/></svg>
          <h3 class="ml-1">Musique Pour Tous</h3>  
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                  Connexion
              </h1>
              <form class="space-y-4 md:space-y-6" onsubmit="return setAction(this)" method="post">
                  <div>
                      <label for="login" class="block mb-2 text-sm font-medium text-gray-900">Votre login</label>
                      <input type="text" name="login" id="login" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre Mot de passe</label>
                      <input type="password" name="mdp" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                  </div>
                  <div class="items-center">
                      <label for="profession" class="block mb-2 text-sm font-medium text-gray-900">Vous êtes:</label>
                      <div id="profession">
                          <div class="flex items-center h-5">
                            <input type="radio" id="p" name="selection" value="prof" class="w-4 h-4 border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                            <label for="p" class="text-gray-500 ml-1">Professeur</label>
                          </div>
                            <br>
                          <div class="flex items-center h-5">
                            <input type="radio" id="e" name="selection" value="employe" class="w-4 h-4 border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                            <label for="e" class="text-gray-500 ml-1">Employé</label>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Se Connecter</button>
              
                  <script type="text/javascript">
                        
                        function setAction(form) {
                            
                                if ($("input[type='radio'][name='selection']:checked").val() == "prof") {
                                    form.action = "index.php?uc=prof&action=verif";
                                }

                                else if ($("input[type='radio'][name='selection']:checked").val() == "employe") {
                                    form.action = "index.php?uc=employe&action=verif";
                                }

                            }

                    </script>
                </form>
          </div>
      </div>
  </div>
</section>