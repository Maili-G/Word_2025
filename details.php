
<?php require_once 'header.php'; ?>
<?php require_once 'inc/manager-db.php'; 
if (isset($_GET['id']) && !empty($_GET['id'])){
  $name = ($_GET['id']);
  $lePays = getDetailsPays($name);
}
test($lePays);

?>

<?php echo $_GET["id"];?>
<main role="main" class="flex-shrink-0"> <!-- bootstrap-->

  <div class="container">

    <td><div class="#"><img src="images/flag/<?php echo strtolower($lePays->Code2git) ?>.png " alt="<?php echo $lePays->Code2 ?>"></div></td> 
    
    <table class="table">
         <tr>
         <th>nom</th>
           <th>Population</th>
           <th>Surface</th>
           <th>Capitale</th>
         </tr>
        <tr>
         <td> <?php echo $lePays->Name ?></td> 
         <td><?php echo $lePays->Population ?></td>
          <td> <?php echo $lePays->SurfaceArea ?></td>
          <td> <?php echo getCapitale($lePays->Capital)->Name ?></td>
          </tr>
</table>
  

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>