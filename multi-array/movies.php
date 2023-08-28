<?php 
// Initialize the movie database (multidimensional array)
$movies = [
    [
		'id' => 1,
        'title' => 'The Shawshank Redemption',
        'genre' => 'Drama',
        'release_year' => 1994,
        'cast' => ['Tim Robbins', 'Morgan Freeman'],
    ],
    [
		'id' => 2,
        'title' => 'Inception',
        'genre' => 'Science Fiction',
        'release_year' => 2010,
        'cast' => ['Leonardo DiCaprio', 'Joseph Gordon-Levitt'],
    ],
    // Add more movie entries here
];

// Function to display movie details
class display
{
	function displayMovieDetails($movie)
	{
	    echo "Title: " . $movie['title'] . "<br>";
	    echo "Genre: " . $movie['genre'] . "<br>";
	    echo "Release Year: " . $movie['release_year'] . "<br>";
	    echo "Cast: " . implode(', ', $movie['cast']) . "<br>";
	    echo "<br>";
	}
	function addMovie($title, $genre, $release_year, $cast)
	{
	    global $movies;
	    $newMovie = [
	        'title' => $title,
	        'genre' => $genre,
	        'release_year' => $release_year,
	        'cast' => $cast,
	    ];
	    $movies[] = $newMovie;
	}
	function searchMoviesByGenre($genre)
	{
	    global $movies;
	    $matchingMovies = [];
	    foreach ($movies as $movie) 
	    {
	        if($movie['genre']=== $genre){
	            $matchingMovies[] = $movie;
	        }
	    }
		return($matchingMovies);
	}
	function deleteMovie($title)
	{
		global $movies;
		$deletemovie=[];
		foreach($movies as $delete)
		{
			if ($delete['title'] != $title) 
			{
				$deletemovie[]=$delete;
			}
		}
		return($deletemovie);
	}
	function editMovie($id, $title, $genre, $release_year, $cast)
    {
        global $movies;
        foreach ($movies as $key=>$movie) 
		{
			if($movie['id']== $id){
				$em=[];
				$em['id'] = $id;
				$em['title'] = $title;
				$em['genre'] = $genre;
				$em['release_year'] = $release_year;
				$em['cast'] = $cast;
				$movies[$key]=$em;
				break;
	        }            
        }
    }
    function getMovie($title)
    {
    	global $movies;
    	foreach ($movies as $movie)
		{
    		if($movie['title']===$title)
			{
    			return $movie;
				break;
    		}
    	}
    }
}

?>