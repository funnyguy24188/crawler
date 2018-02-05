<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Helvetica', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .posts-table td:hover {
            background-color: #cedfe8;
            cursor: pointer;
        }

        .post-item {
            padding: 10px;
        }

        .post-item :hover {

        }

        .post-image img {
            max-width: 240px;
        }

        .nav-post-bar {
            float: right;
            width: 300px;
            background-color: #a6e1ec;
            position: fixed;
            top: 0;
            right: 0;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref">

    <div class="main-posts">
        <div class="vendor-name">
            <strong>Vendor: Bao Triet</strong>
        </div>
        <table class="posts-table">
            @for($i=1; $i<10; $i = $i + 3)
                <tr>
                    <td>
                        <div class="post-item">
                            <div class="post-image">
                                <img src="/quanao/{{$i}}.jpg" al="q1">
                            </div>
                            <div class="post-message">
                                <p>Mẫu 1 về hàng, giá lẻ 100k.</p>
                                <p>Sỉ : 10 cái 90k</p>
                                <p>Sỉ : 20 cái 85k</p>
                            </div>
                            <div class="post-control">
                                <input type="number">
                                <button class="post-product-select-btn">SELECT</button>
                            </div>

                        </div>
                    </td>
                    <td>
                        <div class="post-item">
                            <div class="post-image">
                                <img src="/quanao/{{$i + 1}}.jpg" al="q1">
                            </div>
                            <div class="post-message">
                                <p>Mẫu 2 về hàng, giá lẻ 150k.</p>
                                <p>Sỉ : 10 cái 140k</p>
                                <p>Sỉ : 20 cái 130k</p>
                            </div>
                            <div class="post-control">
                                <input type="number">
                                <button class="post-product-select-btn">SELECT</button>
                            </div>

                        </div>
                    </td>
                    <td>
                        <div class="post-item">
                            <div class="post-image">
                                <img src="/quanao/{{$i+2}}.jpg" al="q1">
                            </div>
                            <div class="post-message">
                                <p>Mẫu 3 về hàng, giá lẻ 170k.</p>
                                <p>Sỉ : 10 cái 150k</p>
                                <p>Sỉ : 20 cái 120k</p>
                            </div>
                            <div class="post-control">
                                <input type="number">
                                <button class="post-product-select-btn">SELECT</button>
                            </div>

                        </div>
                    </td>
                </tr>
            @endfor
        </table>
    </div>
</div>
<div class="nav-post-bar">
    <label><strong>Post Note</strong></label>
    <ul>
        <li>
            <p>Post 1 - Quantity : 29</p>
            <p><a href="https://www.facebook.com/uee.yl/posts/862340003927517">Link post</a></p>
        </li>
        <li>
            <p>Post 2 - Quantity : 10</p>
            <p><a href="https://www.facebook.com/uee.yl/posts/860792504082267">Link post</a></p>
        </li>
    </ul>
</div>
</body>
</html>
