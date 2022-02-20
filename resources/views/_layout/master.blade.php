<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield("title") | Siakad</title>

    @include("_partial.head")
</head>
<body>
    @section("konten")
    @show

    @include("_partial.foot")

    @section("js")
    @show

    <div class="d-flex align-items-center justify-content-center">Copyright (c) 2022 | Created by HNM Bot | Support by Tekan.ID</div>
</body>
</html>
