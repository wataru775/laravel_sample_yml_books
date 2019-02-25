
<html>
<head>
    <meta charset="utf-8">
    <title>支倉凍砂 作品一覧</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

    <style>
        .card {
            text-align: center;
            width: 150px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px #ccc;
            padding-right : 5px;
            padding-left: 5px;
        }
        .card-img {
            border-radius: 5px 5px 0 0;
            max-width: 100%;
            height: auto;
        }
        h3{
            background-color: #ffffee;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">支倉凍砂 作品一覧</a>
</nav>
<main role="main" class="container" style="padding-top: 70px">
    <div >
        @foreach( \Symfony\Component\Yaml\Yaml::parseFile(database_path('books.yml'),\Symfony\Component\Yaml\Yaml::PARSE_OBJECT) as $title => $books)
        <h3>{{ $title }}</h3>
        <div class='row book_cover'>{{ join(',',$books) }}</div>
        @endforeach
    </div>
</main>
</body>
</html>

<script>
    $(function(){
        $(".book_cover").each(function(){
            const codes = $(this).html().split(",");
            $(this).html("");
            appendBookCover($(this),codes);

        });
    });

    function appendBookCover(target,codes){
        for(let code of codes){
            $("<section>").addClass("card")
                .append(
                    $('<a>').attr('href','https://www.amazon.co.jp/gp/product/' + code
                        + '/ref=as_li_tf_il?ie=UTF8&camp=247&creative=1211&creativeASIN='
                        + code + '&linkCode=as2&tag=mmppwataru01-22')
                        .append(
                            $('<img>').addClass("card-img")
                                .attr('src','http://ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=' + code
                                    + '&Format=_SL250_&ID=AsinImage&MarketPlace=JP&ServiceVersion=20070822&WS=1&tag=mmppwataru01-22')
                        )
                )
                .appendTo(target);

        }

    }
</script>