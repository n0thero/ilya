<?

function getDatabaseConnection($db): mysqli
{
    return new mysqli('localhost', 'root', '3EoeXKohTKxpeem', $db);
}

function query($query): array
{
    $request_result = getDatabaseConnection()->query($query);

    if (empty($request_result)) {
        return [];
    } else if ($request_result !== true) {
        return $request_result->fetch_all();
    } else {
        return [];
    }
}

function response($object)
{
    header('Content-Type: application/json');
    echo json_encode($object, JSON_UNESCAPED_UNICODE);
    die;
}
