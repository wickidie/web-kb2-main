<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
</head>
<body>
    <div id="print-area" class="print-main">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                    </tr>
                    <tr>
                        <td>AAA</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>BBB</td>
                        <td>24</td>
                    </tr>
                </table>
    </div>
        <button id="btnPrint">Print</button>

        <script>
                $(document).ready(function(){
                    $("#btnPrint").on("click",function(){
                        printJS({
                            printable: 'print-area',
                            type: 'html'});
                    })
                })
        </script>
</body>
</html>