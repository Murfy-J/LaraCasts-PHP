<?php

$books = [
    [
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'releaseYear' => 1960,
    ],
    [
        'title' => '1984',
        'author' => 'George Orwell',
        'releaseYear' => 1949,
    ],
    [
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen',
        'releaseYear' => 1813,
    ],
    [
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'releaseYear' => 1925,
    ],
    [
        'title' => 'Moby-Dick',
        'author' => 'Herman Melville',
        'releaseYear' => 1851,
    ],
    [
        'title' => 'War and Peace',
        'author' => 'Leo Tolstoy',
        'releaseYear' => 1869,
    ],
    [
        'title' => 'The Catcher in the Rye',
        'author' => 'J.D. Salinger',
        'releaseYear' => 1951,
    ],
    [
        'title' => 'Brave New World',
        'author' => 'Aldous Huxley',
        'releaseYear' => 1932,
    ],
    [
        'title' => 'The Hobbit',
        'author' => 'J.R.R. Tolkien',
        'releaseYear' => 1937,
    ],
    [
        'title' => 'Fahrenheit 451',
        'author' => 'Ray Bradbury',
        'releaseYear' => 1953,
    ],
];

function filter(array $items, callable $fn)
{
    $filterItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filterItems[] = $item;
        }
    }

    return $filterItems;
}

$filteredBooks = filter($books, function ($book) {
    return $book['releaseYear'] >= 1930;
});

foreach ($filteredBooks as $book) {
    echo '<b>Title:</b> '.$book['title'].'<br> <strong>Author:</strong> '.$book['author'].'<br> <strong>Released:</strong> '.$book['releaseYear'].'<br><br>';
}
