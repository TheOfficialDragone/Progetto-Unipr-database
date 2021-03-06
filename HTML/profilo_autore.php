<!DOCTYPE html>
<html lang="it">

    <head>

        <meta charset="UTF-8">
        <title>Voice Hunter</title>

        <link rel="stylesheet" href="../CSS/General_theme.css">
       
    </head>

    <body>
        
        <div class="navbar">
            <a href="../HTML/profilo_autore.php">  <!--home-->
                <img src="../Img/home.png">
            </a>

            <form method="post" action="../FilePHP/Controller.php">
                <input type="submit" name="azione" value="account" id="btnAccount">
            </form>

            <!--<a  href="../FilePHP/VisualizzaAccount.php">
                <img src="../Img/user.png">
            </a>

            
            <a href="profilo.html">
                <img src="../Img/user.png"/> 
            </a>
        
            <a href="login.html"> 
                <img src="../Img/logout.png"/>
            </a>
            -->
            
            <form method="post" action="../FilePHP/Controller.php">
                <input type="submit" name="azione" value="logout" id="btnlogout">
            </form>
           
        </div>
                           
        <!--Cerca la canzone-->
        <div id="pagina">
                
            <div id="logo">
                <img src="../img/logo.png"><br> 
            </div>
    
            <form method="post" action="../FilePHP/Controller.php">
                <label for="Cerca_canzone">Cerca una canzone:</label><br>
                <input type="text" id="ricerca" name="brano" value="" placeholder="cerca una canzone"><br>
                <input type="submit" name="azione" value="ricerca brano" id="Cerca_brano">
            </form>
    
        </div>
    
        <div id="pagina">
            <!--inserisci la canzone-->
            <form action="../FilePHP/Controller.php" method="post" id="inserimentoCanzone">
                <label>Inserimento di una canzone</label><br>
                <input type="text" id="canzoneInserita" required="required" name="canzone" placeholder="link canzone"><br>
                <input type="text" id="genereInserito"  required="required" name="genere" placeholder="genere"><br>
                <input type="text" id="titoloInserito" required="required" name="titolo" placeholder="titolo"><br><br>
                <select id="CODAlbum" name="CODAlbum" onchange="show()">
                <?php
	                $connection=new mysqli("localhost", "root", "", "voice_hunter");

                    session_start();

                    $queryAlbum="SELECT a.titolo, a.ID
                                 FROM album a, autori au
                                 WHERE au.nomedarte=a.Autore
                                 AND au.nomedarte='".$_SESSION['nomedarte']."'";

                    $risultato=$GLOBALS['connection']->query($queryAlbum);

                    if($risultato->num_rows>0)
			        {
				        while($row=$risultato->fetch_assoc())
				        {
                            $titolo=$row['titolo'];
                            $id=$row['ID'];

                            echo ('<option value="'.$id.'">'.$titolo.'</option>');

                        }
                    }

                ?>
                </select><br>
                <input type="submit" name="azione" value="inserisci canzone">
            </form>
        </div>
    
        <div id="pagina">
            <!--inserisci la canzone-->
            <form action="../FilePHP/Controller.php" method="post" id="inserimentoAlbum">
                <label>Inserimento di un album</label><br>
                <input type="text" id="titoloInserito" required="required" name="titolo" placeholder="titolo"><br>
                <input type="text" id="tipoInserito" required="required" name="tipologia" placeholder="tipologia"><br>
                <input type="submit" name="azione" value="inserisci album">
            </form>
        </div>
        
        <div id="pagina">
            <!--inserisci la canzone-->
            <form action="../FilePHP/Controller.php" method="post" id="cancellazioneCanzone">
                <label>Cancellazione di una canzone</label><br>
                <input type="text" id="genereInserito" required="required" name="genere" placeholder="genere"><br>
                <input type="text" id="titoloInserito" required="required" name="titolo" placeholder="titolo"><br>
                <input type="submit" name="azione" value="canellazione canzone">
            </form>
        </div>

    </body>
    
</html>

