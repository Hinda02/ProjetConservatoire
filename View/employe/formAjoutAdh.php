<div>
<?php
    include("View/navbar.php");
?>

<section style="background-image: url('Images/music.jpg');" class="bg-cover h-screen overflow-hidden p-12 bg-violet-600">

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


<div class="sm:ml-40 ">
<form id="form" class="mt-30 ml-60 w-full max-w-lg flex-col" action="index.php?uc=eleve&action=valideAjout" method="post">

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nom
      </label>
      <input id="one" name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane" required>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Prénom
      </label>
      <input id="two" name="prenom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe" required>
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        E-mail
      </label>
      <input id="three" name="mail" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="email" placeholder="user@example.me" required>
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Adresse
      </label>
      <input id="four" name="adresse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="24 place de la concorde, 75015 Paris" required>
    </div>
  </div>

    
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Téléphone
      </label>
      <input id="five" name="telephone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="+0654899585" required>
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        Bourse
      </label>
      <input id="six" name="bourse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="520" required>
    </div>

    <div class="flex ml-5 md:w-2/3">
      <button id="submitbtn" class="shadow bg-orange-400 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Ajouter
      </button>
    </div>

  </div>
  <script>
        try {
            
            let form = document.getElementById('form')
            form.addEventListener('submit', (e) => {
                e.preventDefault()

                let five = document.getElementById('five').value
                let six = document.getElementById('six').value

                if(isNaN(five) or five.length < 10){
                    throw {name:"TelFormatExp", message:"Veuillez saisir le bon format de numéro de téléphone."}
                }

                if(isNaN(six)){
                    throw {name:"BourseFormatExp", message:"Veuillez saisir une bourse."}
                }
            })

        } catch (e) {
            alert(e.message)
        }
    </script>
</form>


</div>
</div>
