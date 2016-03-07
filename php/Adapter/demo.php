<?php

interface IPlayer{
    public function playMusic();
}

class MusicPlayer implements IPlayer{
    
    private $music;
    
    public function __construct($music) {
        $this->music = $music;
    }

    public function playMusic() {
        echo "start to play music: $this->music, enjoy it!\r\n"; 
    }
    
}



/**
 * as Above, There is a Player which only can play music.
 * But now, I hope it can also play movie 
 * 
 * Ok, let's create a movieAdapter
 */

class MovieAdapter implements IPlayer{
    
    protected $moviePlayer;
    
    public function __construct(IMoviePlayer $moviePlayer) {
        $this->moviePlayer = $moviePlayer;
    }
    
    public function playMusic() {
        $this->moviePlayer->playMovie();
    }    
}

interface IMoviePlayer{
    public function playMovie();
}

class MovePlayer implements IMoviePlayer {
    
    private $movie;

    public function __construct($movie) {
        $this->movie = $movie;
    }

    public function playMovie() {
        echo "start to play movie: $this->movie, enjoy it!\r\n";
    }    
}


class TestFactory{
    
    public static function getPlayer() {
        return array(
            new MusicPlayer('fade'),
            new MovieAdapter(new MovePlayer('007'))
        );
    }
    
}


$players = TestFactory::getPlayer();

for($i=0;$i<count($players);$i++) {
    $players[$i]->playMusic();
}




//$mp = new MusicPlayer('fade');
//
//$mp->playMusic();
//
//$movie = new MovieAdapter(new MovePlayer('007'));
//
//$movie->playMusic();


?>
