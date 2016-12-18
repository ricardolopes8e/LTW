
  <?php
  
		include_once('config/init.php'); 
		
		$idRestaurant = $_GET['idRestaurant'];
  ?>
<section id="content">

  <h2>Add Review</h2>
  <form action="action_addReview.php?idRestaurant=<?=$idRestaurant?>" method="post">
    <div class="form-input">Rating:
        <input type="number" name="rating" min="1" max="5">
    </div>
    <div class="form-input">Comment:
        <input type="text" name="comment" placeholder="Enter comment">
    </div> 
    <div>
      <input type="Submit" name="submit" value="Submit" class="submit-button">
    </div>
  </form>
</section>
