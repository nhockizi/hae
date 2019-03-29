<!DOCTYPE html>
<html lang="en">
<head>
    <title>HAE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" rel="stylesheet">
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="css/pagination.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="js/pagination.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
</head>

<body onresize="checkBody()">
<?= @$content ?>
</body>
<script>
    $(document).ready(function () {
        checkBody();
    })
    // $( window ).resize(function() {
    //     checkBody();
    // });
    function checkBody() {
        var _height = $(window).height();
        var _width = $(window).width();
        console.log('width : '+_width+'////_height : '+_height);
        if(_height >= 1366){
            $(".container > .row").height('');
        }else if(_height == 1024){
            if(_width > _height){
                $(".container > .row").height('100%');
            }else {
                $(".container > .row").height('');
            }
        }else{
            $(".container > .row").height('100%');
        }
    }
</script>

</html>