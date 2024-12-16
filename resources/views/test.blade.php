<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
La qualité de l'eau est a {{ $last }} <br> la moyenne de la semaine est {{ $avg }}

<table>
    <thead>
    <tr>
        <td>
            Date
        </td>
        <td>
            qualité
        </td>
    </tr>
    </thead>
    <tbody>
        @foreach($array as $element)
            <tr>
                <td>
                    {{$element[0]}}
                </td>
                <td>
                {{ App\Http\Controllers\DataController::transformData($element[1])}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>