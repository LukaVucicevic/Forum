<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="/napravi/napravi-temu" method="POST">
    @csrf
        <div class="form-outline mb-4">
            <div class="form-outline mb-4">
                <input type="text" name="ime" id="form4Example1" class="form-control" />
                <label class="form-label" for="form4Example1">Name</label>
            <textarea class="form-control" name="comment" id="form4Example3" rows="4"></textarea>
            <label class="form-label" for="form4Example3">Message</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
    </form>
</body>
</html>
<form>

    