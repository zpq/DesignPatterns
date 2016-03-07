<?php

interface IPaperBook{
    public function open();
    public function turnPage();
}

class book implements IPaperBook{
    public function open() {
        echo "open the book\r\n";
    }

    public function turnPage() {
        echo "book turned next page\r\n";
    }
}


interface IEbook{
    public function start();
    public function pressNext();
}

class Kindle implements IEbook{
    public function pressNext() {
        echo "kindle turned next page\r\n";
    }

    public function start() {
        echo "open the kindle\r\n";
    }
}


class EbookAdapter implements IPaperBook{

    private $ebook;

    public function __construct(IEbook $ebook) {
        $this->ebook = $ebook;
    }

    public function open() {
        $this->ebook->start();
    }

    public function turnPage() {
        $this->ebook->pressNext();
    }
}


class TestFactory {
    public static function getBook($type=0) {
        switch ($type) {
            case 0: 
                return new book();
                break;
            case 1:
                return new EbookAdapter(new Kindle());
                break;
            default:
                break;
        }
    }
}


$paperBook = TestFactory::getBook();
$paperBook->open();
$paperBook->turnPage();

$kindle = TestFactory::getBook(1);
$kindle->open();
$kindle->turnPage();















?>