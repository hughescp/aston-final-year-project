import Vue from 'vue';
import Graph from './components/Graph';


new Vue({
    el: 'body',

    components: {Graph}
});

$( function() {
    $( "#sortable" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( "#sortable" ).disableSelection();
} );