<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    
        .paragraphs {
            display: grid;
            grid-template-areas: 
            'left b b'
            'left c c'
            ;
        }
        
        .left, .a {
            display: grid;
            grid-area: left;
            place-content: center;
            padding: 25px;
            margin: 25px;
            background-color: #5cf7f7;
        }
        
        .b {
            grid-area: b;
            display: grid;
            place-content: center;
            padding: 25px;
            margin: 25px;
            background-color: #5cf7f7;
        }
        
        .c {
            grid-area: c;
            display: grid;
            place-content: center;
            padding: 25px;
            margin: 25px;
            background-color: #5cf7f7;
        }
        
    </style>

</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-primary" style="background-color: rgb(0, 176, 240) !important;">
            <a class="navbar-brand text-white">AutoWealth</a>
            <a class="navbar-brand text-white form-inline">Responsive Test</a>
        </nav>
        <div class="paragraphs">
            <div class="left a">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
            </div>
            <div class="right b">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
            </div>
            <div class="right c">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 
            </div>
        </div>
        <div class="new-row">

        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    //load all script when all document is already loaded
    $(document).ready(function() {

        //function for moving right panel(2 ,3) below the left panel(1)
        function responsive() {
            var windowWidth = $(window).width(); //get the current window width on resize
            var windowLimit = '420'; //limit pixel

            var isBelowLimit = windowWidth <= windowLimit; //check constraint
            if(isBelowLimit) {
                $('.b').appendTo('.new-row');
                $('.c').appendTo('.new-row');
            } else {
                $('.b').appendTo('.paragraphs');
                $('.c').appendTo('.paragraphs');
            }
        }

        window.onload = responsive(); //run responsive function on window load

        $(window).resize(function() { //run responsive function on window resize
            responsive();
        });
    });
</script>

</html>