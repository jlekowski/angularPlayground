<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Items</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular-route.min.js"></script>

    <!-- ANGULAR CUSTOM -->
    <script src="/js/controllers/MainCtrl.js"></script>
    <script src="/js/controllers/IndexCtrl.js"></script>
    <script src="/js/services/IndexService.js"></script>
    <script src="/js/appRoutes.js"></script>
    <script src="/js/app.js"></script>
</head>
<body ng-app="angularPlayground" ng-controller="MainController">
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphiconicon-bar"></span>
                <span class="glyphiconicon-bar"></span>
                <span class="glyphiconicon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" ng-bind="appName"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Index</a></li>
            </ul>
        </div>
    </div>
</nav>
<div ng-view>ng-view</div>
