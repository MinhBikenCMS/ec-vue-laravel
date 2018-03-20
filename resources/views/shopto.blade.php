<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ mix('css/app.css')  }}"/>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #212529;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                overflow-x: hidden;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
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

            .cardT {
                box-shadow: rgba(0, 0, 0, 0.117647) 0px 1px 6px, rgba(0, 0, 0, 0.117647) 0px 1px 4px;
                margin: 12px;
                padding-bottom: 12px;
                transition: .15s all ease-in-out;
                text-align: center;
            }

            .cardT a{
                text-decoration: none;
                padding: 12px 12px 0 12px;
                color: #03A9F4;
                font-size: 24px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .cardT small {
                font-size: 10px;
                padding: 4px;
            }
            .cardT:hover {
                transform: scale(1.1);
            }
            .page-link {
                font-family: "Source Sans Pro"
            }

        </style>
    </head>
    <body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Simple is the best
                </div>
                <div style="padding: 0 10px; margin-bottom: 30px">
                    <input placeholder="Search every thing..." type="text" class="form-control" autofocus v-model="search" v-on:keyup="searchAjax()"/>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" v-if="loading">
                <div class="col-md-6 offset-md-2" v-if="loading">
                    <h3>Let's show me what do you want...</h3>
                </div>
            </div>
            <div class="row" v-if="!loading">

                <div class="col-md-2" v-for="(product, index) in postList.data" :class="{ 'offset-md-2': index % 4 === 0 }">
                    <div class="cardT">
                        <a href="#">
                            <img src="https://daynin.github.io/clojurescript-presentation/img/react-logo.png" width="100px" height="100px">
                            <small> @{{ product.name  }}</small>
                            <strong>@{{ product.price  }}</strong>
                        </a>
                        <button class="btn btn-sm btn-outline-primary">Add to cart</button>
                    </div>
                </div>

                <div class="col-md-8 offset-md-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" aria-label="Previous" v-on:click="searchAjax(postList.page)">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li v-for="page in postList.last_page" class="page-item" v-bind:class="[ page == postList.current_page ? 'active' : '']">
                                <a v-on:click="searchAjax(page)" class="page-link">
                                    @{{ page }}
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" aria-label="Next" v-on:click="searchAjax(postList.last_page)">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ mix('js/shopto.js') }}"></script>
    </body>
</html>
