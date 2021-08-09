<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>
</head>
<body>
    <form action=" {{ route('faculties.store') }} " method="post">
        @csrf
        <input type="text" name="faculty_name">
        <input type="text" name="desc">
        <input type="submit" value="">
    </form>
</body>
</html>