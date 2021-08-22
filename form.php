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
<div id="result"></div>
<div id="content">
    <input type="text" id="id">
    <input type="text" id="name">
    <input type="text" id="price">
    <input type="text" id="thumbnail">
    <button id="submit">Send</button>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#submit').click(function (){
            $.ajax({
                url: '/api.php/user',
                method: 'POST',
                dataType: 'text',
                data: {
                    id: $('#id').val(),
                    name: $('#name').val(),
                    price: $('#price').val(),
                    thumbnail: $('#thumbnail').val(),
                },
                success: function (data) {
                    window.location.href = '/list.php'
                    $('#result').html(data)
                },
                error: function () {

                }
            })
        })

    })
</script>
</body>
</html>
