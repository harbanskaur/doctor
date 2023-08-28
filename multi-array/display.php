<?php 
	include("movies.php");
	$display=new display();
	if (!empty($_POST['save'])) 
	{
		$title = $_POST['title'];
        $genre = $_POST['genre'];
   		$release_year = $_POST['release_year'];
        $cast = explode(",", $_POST['cast']);
        $display->addMovie($title, $genre, $release_year, $cast);
	}
    if (!empty($_POST['edit'])) 
	{
		
		$id = $_POST['id'];
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $release_year = $_POST['release_year'];
        $cast = explode(",", $_POST['cast']);
		
        $display->editMovie($id,$title, $genre, $release_year, $cast);    
		
	}
?>

<form>
	<a href="add.php">Add Movie</a><br><br>
	Delete<input type="text" name="delete"/>
	<input type="submit" value="Delete">
</form>
<br><br><br>
<?php
	global $movies;
	if (!empty($_GET['delete'])) 
	{
		$delete=$_GET['delete'];
		$movies=$display->deleteMovie($delete);
	}
	foreach($movies as $movy) 
	{
		$display->displayMovieDetails($movy);
		?>
			<a href="edit.php?title=<?php echo $movy['title']?>">Edit</a><br><br>
		<?php
	}
?>
<br><br><br>
<form>
	Search:<input type="text" name="search"/>
	<input type="submit" value="Search"/>
</form>
<br><br><br>
<?php
	global $movies;
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
		$movies=$display->searchMoviesByGenre($search);
	}
	foreach ($movies as $movy) 
	{
		$display->displayMovieDetails($movy);
	}
?>