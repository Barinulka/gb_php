<?
   include 'config/config.php';
   $images = scandir("img");

   $sql = "SELECT * FROM photos";
   $result = mysqli_query($connect, $sql);
?>

<div class="row">
   <? if (mysqli_num_rows($result) > 0) : ?>
      <? while ($row = mysqli_fetch_assoc($result)) : ?>
         <div class="col-4 gy-5">
            <a class="open" href="#" style="outline: 3px solid #000;"><img width="200" src="img/<?=$row['name']?>" alt=""></a>
         </div>
      <? endwhile; ?>
   <? endif; ?>
</div>

