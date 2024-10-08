<?php
include('./templates/connect.php');
include('./templates/header.php');

$recipe_recipe_id = " ";
$error_msg = " ";

//check if partciular recipe_id is selected
if (isset($_GET["recipe_id"])) {
    $recipe_id = $_GET["recipe_id"];

    //Fetch Data from table, using the row id
    $fetch_query ="SELECT * FROM `recipe_tb` WHERE `recipe_id` = $recipe_id";

    $send_fetch_query = mysqli_query($db_connect, $fetch_query);

    //Store recieved data in an associative array
    $recipe = mysqli_fetch_assoc($send_fetch_query);

    // print_r($recipe);
}else {
    $error_msg = "No recipe selected!";
}

?>

<main>
    <div class="slider">
        <ul class="slides">
            <li><img src="./assets/img/<?php echo $recipe ['recipe_type']?>.jpg" alt=""class="responsive-img"></li>
        </ul>
    </div>
    <div class= "container">
        <h1><?php echo $error_msg; ?></h1>
        <h1 class="black-text center-align"><?php echo $recipe['recipe_name']?></h1>
        <p class="flow-text">Created by: <?php echo $recipe['email'] . " @ " . $recipe['created_at'];?></p>
        <p class="flow-text"><span class="blue-text text-darken-4">Description: </span><?php echo $recipe['recipe_description'] ?>
        <p>Email: <?php echo $recipe['email'];?></p>
    </div>
    <div class="center-align">
        <a href="./edit_recipe.php?recipe_id=<?php echo $recipe['recipe_id']; ?>" class="ed-btn btn btn-large btn-flat blue darken-4 white-text">Edit</a>
        <a href="./delete_recipe.php?recipe_id=<?php echo $recipe['recipe_id']; ?>" class="ed-btn btn btn-large btn-flat blue darken-4 white-text">Delete</a>
    </div>
</main>
<?php include('./templates/footer.php'); ?>