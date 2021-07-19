<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
    <body>
        <div id="app">
            <v-app>
                <v-toolbar>
                    <v-app-bar-nav-icon></v-app-bar-nav-icon>
                    <v-app-bar-title>Title</v-app-bar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items class="hidden-sm-and-down">
                        <v-btn text>Link one</v-btn>
                        <v-btn text>Link two</v-btn>
                        <v-btn text>Link three</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
            </v-app>
        </div>
    </body>
<script src="{{asset('js/app.js')}}"></script>
</html>
