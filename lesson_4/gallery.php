<?
   $images = scandir("img");
?>

<div class="row">
   <? for($i = 2; $i < count($images); $i++) : ?>
      <div class="col-4 gy-5">
         <a class="open" href="#" style="outline: 3px solid #000;"><img width="100%" src="img/<?=$images[$i]?>" alt=""></a>
      </div>
   <? endfor; ?>
</div>

