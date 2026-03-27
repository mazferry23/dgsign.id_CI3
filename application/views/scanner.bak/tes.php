<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#Sel').change(function() {
                    var opt = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "tes.php",
                        data: 'selected_opt=' + opt,
                        success:function(data){
                            alert('This was sent back: ' + data);
                        }
                    });
                });
            });
        </script>
    </head>
<body>

<select id = "Sel">
    <option value ="Song1">default value<br>
    <option value ="Song2">Break on through<br>
    <option value ="Song3">Time<br>
    <option value ="Song4">Money<br>
    <option value ="Song5">Saucerful of Secrets
</select>