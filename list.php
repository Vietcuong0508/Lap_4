<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="content">
    <ul>
        <li>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </li>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '/api.php/user',
            method: 'GET',
            success: function (data) {
                var content = ''
                // $('#content').html(data.items)
                $.each(data, function (key, value) {
                    content += `<li>
            <span>${value.id}</span>
            <span>${value.name}</span>
            <span>${value.price}</span>
            <span>${value.thumbnail}</span>
</li>`
                })
                $('#content ul').html(content)
            },
            error: function () {

            }
        })
    })
</script>
</body>
</html>
