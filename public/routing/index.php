<?

$pages = [
    [
        'address' => 'first',
        'content' => 'first first first'
    ],
    [
        'address' => 'second',
        'content' => 'second second second'
    ],    [
        'address' => 'fourth',
        'content' => 'fourth fourth fourth'
    ],
    [
        'address' => 'third',
        'content' => 'third third third'
    ],
];

foreach ($pages as $page) {

    if ($page['address'] === $_GET['page']) {
        echo $page['content'];
    }
}
