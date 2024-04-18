<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel to-do list') }}</title>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        <div>
            <header>
                <a class="inherit-link" href="/">
                    {{ config('app.name', 'Laravel to-do list') }}
                </a>

            </header>
            <div class="container">
                <main>
                    <h1>@yield('title')</h1>

                    @yield('actions')

                    @hasSection('back')
                        <a id="back-link" class="inherit-link" href="/">
                            Back
                        </a>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert-message">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p class="alert-message">{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p class="alert-message">{{ $message }}</p>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    <style>
    html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    font-weight: 200;
}

* {
    margin: 0;
    padding: 0;
    outline: none;
}

.inherit-link {
    color: inherit;
    text-decoration: inherit;
    cursor: pointer;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 40px;
    padding: 1rem;
}

header>a {
    font-size: 0.900rem;
    font-weight: 600;
    letter-spacing: .1rem;
    text-transform: uppercase;
}

.container {
    padding: 1rem 2rem;
}

main>h1 {
    display: block;
    font-size: 1.275rem;
    font-weight: 300;
    letter-spacing: .1rem;
    text-transform: uppercase;
    margin-bottom: 0.725rem;
}

#back-link {
    display: inline-block;
    font-size: 0.725rem;
    font-weight: 300;
    letter-spacing: .1rem;
    text-transform: uppercase;
    margin-bottom: 1.275rem;
}

#back-link:hover {
    color: #272a2c;
}

.alert {
    font-size: 0.800rem;
    font-weight: 800;
    text-transform: uppercase;
    margin-bottom: 1.275rem;
}

.alert ul {
    list-style: none;
}

.alert .alert-message {
    margin: 0.5rem;
    padding: 0.750rem;
}

.alert-success .alert-message {
    background-color: #4CAF50;
    color: white;
}

.alert-danger .alert-message {
    background-color: #f44336;
    color: white;
}

#create-content>form label {
    display: block;
    margin-bottom: 0.250rem;
}

#create-content>form .input {
    box-sizing: border-box;
    display: block;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: 1px solid #636b6f;
    border-radius: 0.25rem;
}

#create-content>form #submit-btn {
    box-sizing: border-box;
    display: block;
    font-weight: 700;
    letter-spacing: .1rem;
    text-transform: uppercase;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #37af65;
    color: #fff;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

.is-invalid {
    border: 1px solid #f44336 !important;
}

.grid {
    display: grid;
    grid-template-columns: 1fr minmax(110px, auto);
    align-items: center;
    color: #1b1d1f;
    background-color: #f0f1f2;
    border-radius: 0.5rem;
    margin: 0.5rem;
    padding: 1rem;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.grid>div {
    overflow: auto;
    padding: 0.5rem 0.2rem;
}

.grid .grid-header strong {
    letter-spacing: .1rem;
    text-transform: uppercase;
}

.grid-header {
    grid-column: 1 / 3;
}

.grid p {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.grid .checked {
    text-decoration: line-through;
    color: #37af65;
}

.grid p:before {
    content: '\2714  ';
}

.grid .grid-actions {
    display: flex;
    justify-content: center;
}

.grid .grid-actions button {
    border: none;
    border-radius: 2px;
    margin: 1px 2px;
    padding: 5px;
    outline: none;
    cursor: pointer;
}

.grid .grid-item-check {
    background-color: #4CAF50;
}

.grid .grid-item-check:after {
    content: '\2714';
}

.grid .grid-item-view {
    background-color: #008CBA;
}

.grid .grid-item-view:after {
    content: '\27A5';
}

.grid .grid-item-edit {
    background-color: #008CBA;
}

.grid .grid-item-edit:after {
    content: '\2710';
}

.grid .grid-item-remove {
    background-color: #f44336;
}

.grid .grid-item-remove:after {
    content: '\2716';
}

.grid-links .pagination {
    display: flex;
    list-style: none;
}

.grid-links .page-item {
    border: none;
    border-radius: 4px;
    margin: 1px 2px;
    padding: 5px 10px;
    text-transform: none;
    text-decoration: none;
    outline: none;
    color: inherit;
    background-color: white;
}

.grid-links .page-link {
    color: inherit;
    font-weight: 400;
    text-transform: none;
    text-decoration: none;
    outline: none;
}

.grid-links .active span {
    color: #636b6f;
    font-weight: 600;
}

.grid-links {
    grid-column: 1 / 3;
}

.grid-norecords {
    grid-column: 1 / 3;
    font-size: 0.8rem;
    font-weight: 200;
    letter-spacing: .1rem;
    text-transform: uppercase;
    text-align: center;
}

#create-btn {
    box-sizing: border-box;
    display: inline-block;
    font-weight: 700;
    letter-spacing: .1rem;
    text-transform: uppercase;
    width: 200px;
    margin-bottom: 0.725rem;
    padding: 0.725rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #37af65;
    color: #fff;
    cursor: pointer;
}

#show-content {
    max-width: 500px;
    margin: 0.5rem auto;
    padding: 1rem;
    text-align: center;
    border-radius: 0.5rem;
    background-color: #f0f1f2;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

#show-content .name {
    padding: 0.725rem;
    font-weight: 700;
}

#show-content .completed-task {
    font-size: 0.725rem;
    font-weight: 300;
    letter-spacing: .1rem;
    text-transform: uppercase;
    color: #4CAF50;
}

#show-content .pending-task {
    font-size: 0.725rem;
    font-weight: 300;
    letter-spacing: .1rem;
    text-transform: uppercase;
    color: #008CBA;
}

#show-content .bottom {
    display: flex;
    justify-content: space-around;
    margin-top: 1rem;
}

#show-content label {
    font-size: 0.725rem;
    font-weight: 700;
    letter-spacing: .1rem;
    text-transform: uppercase;
}

#edit-content .name {
    text-align: center;
    font-weight: 600;
    margin-bottom: 1rem;
}

#edit-content>form label {
    display: block;
    margin-bottom: 0.250rem;
}

#edit-content>form .input {
    box-sizing: border-box;
    display: block;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: 1px solid #636b6f;
    border-radius: 0.25rem;
}

#edit-content .checkbox-container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 1rem;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

#edit-content .checkbox-container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

#edit-content .checkbox-container .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

#edit-content .checkbox-container:hover input~.checkmark {
    background-color: #ccc;
}

#edit-content .checkbox-container input:checked~.checkmark {
    background-color: #37af65;
}

#edit-content .checkbox-container .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

#edit-content .checkbox-container input:checked~.checkmark:after {
    display: block;
}

#edit-content .checkbox-container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

#edit-content>form #submit-btn {
    box-sizing: border-box;
    display: block;
    font-weight: 700;
    letter-spacing: .1rem;
    text-transform: uppercase;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #37af65;
    color: #fff;
    cursor: pointer;
}

.navbar-nav {
    display: flex;
    list-style: none;
}

.nav-item a {
    text-transform: none;
    text-decoration: none;
    background-color: inherit;
    color: inherit;
    padding: 1rem;
}

.nav-item a:hover {
    color: #272a2c;
}

.card {
    max-width: 600px;
    margin: 0 auto;
}

.card form label {
    display: block;
    margin-bottom: 0.250rem;
}

.card form .form-control {
    box-sizing: border-box;
    display: block;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: 1px solid #636b6f;
    border-radius: 0.25rem;
}

.card form #submit-btn {
    box-sizing: border-box;
    display: block;
    font-weight: 700;
    letter-spacing: .1rem;
    text-transform: uppercase;
    width: 100%;
    margin-bottom: 1rem;
    padding: 0.725rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #37af65;
    color: #fff;
    cursor: pointer;
}
.description {
    width: 100%;
}
</style>
</html>