<?php

namespace App\Classe;

use App\Entity\Categories;
use App\Entity\Genres;

class Search 
{
    /**
     * @var string
     */
    public $string = "";
    /**
     * @var Categories[]
     */
    public $categories = [];
    /**
     * @var Genres[]
     */
    public $genres = [];
}