<?php
    include("movies.php");
    $display=new display();
    global $movies;
    $movietitle=$_GET['title'];
    $movie= $display->getMovie($movietitle);
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form method="post" action="display.php">
		<input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
            <table>
                <tr>
                    <td>Enter Title:</td>
                    <td><input type="text" name="title" value="<?php echo $movie['title']; ?>"></td>
                </tr>
                <tr>
                    <td>Enter Genre:</td>
                    <td><input type="text" name="genre" value="<?php echo $movie['genre']; ?>"></td>
                </tr>
                <tr>
                    <td>Enter Release Year:</td>
                    <td><input type="text" name="release_year" value="<?php echo $movie['release_year']; ?>"></td>
                </tr>
                <tr>
                    <td>Enter Cast:</td>
                    <td><input type="text" name="cast" value="<?php echo implode(', ', $movie['cast']); ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Edit" name="edit"></td>
                </tr>
            </table>
        </form>        
    </body>    
</html>