<html>
<body ng-app>
    <section id="pricing">
        <div class="container" style="margin-top: 100px">
            <div class="box">
                <div class="center">
                    <h2>Ajouter Pack de skins</h2>
                </div><!--/.center-->
                <div class="center">
                    <select>
                        <option>Overwatch</option>
                        <option>Minecraft</option>
                    </select>
                </div>
                <div class="big-gap"></div>
                <div id="pricing-table" class="row">

                    <div style="background-color: #5bc0de" class="col-sm-4 col-sm-offset-2">
                        <ul class="plan featured">
                            Nom
                            <li class="plan-name"><input type="text" ng-model="nomPack" name="nom"></li>
                            Prix
                            <li class="plan-name"><input type="number" ng-model="prixPack" ng-required="number" required></li>
                            Item1
                            <li><input type="text" ng-model="item1" name="item1"></li>
                            Item2
                            <li><input type="text" ng-model="item2" name="item2"></li>
                            Item3
                            <li><input type="text" ng-model="item3" name="item3"></li>
                            Item4
                            <li><input type="text" ng-model="item4" name="item4"></li>
                            Item5
                            <li><input type="text" ng-model="item5" name="item5"></li>

                            <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>
                        </ul>
                    </div><!--/.col-sm-4-->
                    <div style="background-color: #5bc0de;margin-left: 50px" class="col-sm-4">
                        <ul class="plan">
                            <li class="plan-name">{{nomPack}}</li>
                            <li class="plan-price">{{prixPack}}</li>
                            <li>{{item1}}</li>
                            <li>{{item2}}</li>
                            <li>{{item3}}</li>
                            <li>{{item4}}</li>
                            <li>{{item5}}</li>
                            <li class="plan-action"><a href="#" class="btn btn-primary btn-lg">Acheter</a></li>
                        </ul>
                    </div><!--/.col-sm-4-->

                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>
