<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php require_once 'header.php'; ?>
<?php //require_once 'images/flag/'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['name']) && !empty($_GET['name'])){
  $continent = ($_GET['name']);
  $desPays = getCountriesByContinent($continent);
}
else{
  $continent = "Monde";
  $desPays = getAllCountries();
}

?>

<main role="main" class="flex-shrink-0"> <!-- bootstrap-->

  <div class="container"> <!-- -->
    <h1>Les pays en <?= $continent ; ?></h1>
    <div>  <!-- -->
     <table class="table">
         <tr>
           <th>Nom</th>
           <th>Drapeau</th>
           <th>Population</th>
           <th>Surface</th>
           <th>Capitale</th>
         </tr>
       <?php
       // $desPays est un tableau dont les éléments sont des objets représentant
       // des caractéristiques d'un pays (en relation avec les colonnes de la table Country)
          foreach ($desPays as $lePays): ?>
          <tr>
            <td> <?php echo $lePays->Name ?></td>
            <?php
            // function minuscule($Code2) {
            //   $Code2 = strtolower($Code2);
            // }
            //$Code2="Code2"
              
            ?>
            <!-- <td><div class="resizeImg"><img src="images/flag/php strtolower($lePays->Code2)?>.png" alt=""></div></td>  -->
            <td><div class="resizeImg"><img src="images/flag/<?php echo strtolower($lePays->Code2) ?>.png " alt="<?php echo $lePays->Code2 ?>"></div></td> 
            
            <!--<td> php echo $lePays->Code ?></td>-->
            <td> <?php echo $lePays->Population ?></td>
            <td> <?php echo $lePays->SurfaceArea ?></td>
            <td> <?php echo getCapitale($lePays->Capital)->Name ?></td>

            <td><a href="details.php?id=<?php echo $lePays->id?>"><button type="button" class="btn btn-primary mt-auto">View</button></a></td>

            <!-- Afficher l'image du pays -->
          </tr>
          <?php endforeach ; ?>
     </table>
    </div>
    <p>
      <!--
        <code>
      <?php
        //var_dump($desPays[0]);
        ?>
        </code>
          -->
    </p>
    <!--
    <section class="jumbotron">
      <div class="container">
        <h1 class="jumbotron-heading">Tableau d'objets</h1>
        <p>Le contenu ci-dessus représente une vue "debug" du premier élément d'un tableau. Ce tableau est
          constitué d'objets PHP "standard" (stdClass).</p>
        <p>Pour accéder à l'<b>attribut</b> d'un <b>objet</b> on utilisera le symbole <b><code>-></code></b>.
          Ainsi, pour accéder à l'attribut <code>Name</code> du premier pays de la liste
          <code>$desPays</code> on fera <b><code>$desPays[0]->Name</code></b>
        </p>
        <p>La variable <b><code>$desPays</code></b> référence un tableau (<i>array</i>).
          Pour générer le code HTML (table), vous devrez coder une boucle,
          par exemple de type <b><code>foreach</code></b> sur l'ensembles des objets de ce tableau. </p>
        <p>Référez-vous à la structure des tables SQL pour connaître le nom des <b><code>attributs</code></b>.
          En effet, les objets du tableau ont pour attributs les noms des colonnes de la table interrogée par un requête SQL, via l'appel à la
          fonction <b><code>getCountriesByContinent</code></b> (du script <b><code>manager-db.php</code></b>.</p>
        <p>Par exemple <b><code>Name</code></b> est une des colonnes de la table <b><code>Country</code></b> de la base de données.</p>
          <p> Bonne programmation</p>
          <div class="alert alert-warning" role="alert">
            Cette section ne s'auto-détruit pas automatiquement, ce sera à vous de le faire, une fois compris son message !
          </div>
      </div>
    </section>
          -->
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
