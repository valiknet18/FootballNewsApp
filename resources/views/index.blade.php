<!Doctype html>
<html ng-app="football">
<head>
    <link href="/css/libs/angular-material.min.css" rel="stylesheet" />
    <link href="/css/app.css" rel="stylesheet" />
</head>

<body>
<div layout="row" ng-cloak>
    <md-sidenav flex="20" layout="column"  class="md-sidenav-left md-whiteframe-z2" md-component-id="left"  md-is-locked-open="$mdMedia('gt-md')">
        <md-toolbar class="md-whiteframe-z1">
            <h1 class="md-toolbar-tools">FOOTBALL NEWS</h1>
        </md-toolbar>

        <md-content layout-padding>
            <md-list>
                <md-list-item>
                    <a ui-sref="index">
                        <md-item-content md-ink-ripple layout="row" layout-align="start center">
                            <div class="inset">
                                <ng-md-icon icon="dashboard"></ng-md-icon>
                            </div>
                            <div class="inset">Головна</div>
                        </md-item-content>
                    </a>
                </md-list-item>

                <md-list-item>
                    <a ui-sref="commands">
                        <md-item-content md-ink-ripple layout="row" layout-align="start center">
                            <div class="inset">
                                <ng-md-icon icon="group"></ng-md-icon>
                            </div>
                            <div class="inset">Команди</div>
                        </md-item-content>
                    </a>
                </md-list-item>

                <md-list-item>
                    <a ui-sref="members">
                        <md-item-content md-ink-ripple layout="row" layout-align="start center">
                            <div class="inset">
                                <ng-md-icon icon="person"></ng-md-icon>
                            </div>
                            <div class="inset">Футболісти</div>
                        </md-item-content>
                    </a>
                </md-list-item>
            </md-list>
        </md-content>
    </md-sidenav>

    <md-content flex="75" layout="column" ui-view layout-fill class="relative">

    </md-content>
</div>

<script src="/js/libs/angular.min.js"></script>
<script src="/js/libs/angular-ui-router.min.js"></script>
<script src="/js/libs/angular-animate.min.js"></script>
<script src="/js/libs/angular-aria.min.js"></script>
<script src="/js/libs/angular-material.min.js"></script>
<script src="/js/libs/angular-material-icons.min.js"></script>
<script src="/js/libs/ng-file-upload.min.js"></script>

<script src="/js/all.min.js"></script>
</body>
</html>