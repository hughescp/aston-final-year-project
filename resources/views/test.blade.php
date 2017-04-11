<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<div class="container" ng-app="">
  <form>
    Num 1: <input type="number" ng-model="num1">
    <br>
    Num 2: <input type="number" ng-model="num2">
  </form>
  <p>Num 1: {{num1}}</p>
  <p>Num 2: {{num2}}</p>
  <p>Combined value: {{num1 + num2}}</p>
</div>
