$(function()
{'use strict'
var ticksStyle={fontColor:'#495057',fontStyle:'bold'}
var mode='index'
var intersect=true
var $salesChart=$('#sales-chart')
var salesChart=new Chart($salesChart,{type:'bar',data:{labels:['SUN','MON','TUE','WED','THU','FRI','SAT'],
datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',
data:[50,100,150,200,250,300,350,400]},{backgroundColor:'#ced4da',borderColor:'#ced4da',
data:[10,40,50,100,150,180,200]}]},
options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},
legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',
zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
value+='k'}
return '$'+value}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})


var $visitorsChart=$('#visitors-chart')
var visitorsChart=new Chart($visitorsChart,{type:'bar',data:{labels:['SUN','MON','TUE','WED','THU','FRI','SAT'],
datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',
data:[50,100,150,200,250,300,350,400]},{backgroundColor:'#ced4da',borderColor:'#ced4da',
data:[10,40,50,100,150,180,200]}]},
options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},
legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',
zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,callback:function(value){if(value>=1000){value/=1000
value+='k'}
return '$'+value}},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})})
