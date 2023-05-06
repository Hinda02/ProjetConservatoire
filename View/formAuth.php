    <section>
        <div class="form-box">
            <div class="form-value">
                <form onsubmit="return setAction(this)" method="post">
                    
                    <div class="inputbox">
                        
                        <input name="login" type="text" required>
                        <label for="">Identifiant</label>
                    </div>
                    <div class="inputbox">
                        
                        <input name="mdp" type="password" required>
                        <label for="">Mot de passe</label>
                    </div>
                    <fieldset>
                        <legend>Vous êtes:</legend>

                            <input type="radio" id="html" name="selection" value="prof">
                            <label for="html">Professeur</label><br>
                            <input type="radio" id="css" name="selection" value="employe">
                            <label for="css">Employé</label><br>
                    
                    </fieldset>

                   <br>
                    <input type="submit" name="btnSubmit"/>
                    

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
    </section>
    
