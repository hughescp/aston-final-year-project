<script src="https://unpkg.com/vue"></script>
<div class="container" ng-app="">
<div id="demo">
    <p>{{num1}}</p>
    <p>{{num2}}</p>
    <p>The sum of the numbers is {{num1 + num2 + num3 + num4 + num5}}</p>
    <input type="number" v-model.number="num1"><br>
    <input type="number" v-model.number="num2" ><br>
    <input type="number" v-model.number="num3" ><br>
    <input type="number" v-model.number="num4" ><br>
    <input type="number" v-model.number="num5" >
</div>
<script type="text/javascript">
var data = {
    num1: 4,
    num2: 4,
    num3: 4,
    num4: 4,
    num5: 4
}

var demo = new Vue({
    el: '#demo',
    data: data
})
</script>
