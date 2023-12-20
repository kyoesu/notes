var plot1={x:[],y:[]}; // 
var plot2={x:[],y:[],mode: 'markers'};

function myfunc(x)
	{
		return (x-7)*(x-5);
	}
	function graph()
		{
		GRA=document.getElementById('gra')
		for (var c=0;c<200;c++)
		{
		    var x=c-100;
			plot1.x[c] = x;
			plot1.y[c]=myfunc(x);
		}
		var plotdata=[plot1,plot2];
		Plotly.newPlot(GRA,plotdata);
		}
	window.onload=graph;
	
function minmax()
{
	var in1=document.getElementById('inp_1').value;
	var in2=document.getElementById('inp_2').value;
	var in3=document.getElementById('inp_3').value;
	GRA=document.getElementById('gra');
	var res = document.getElementById('res');
	if (in1=="")
		in1=0;
	if  (in2=="")
		in2=5;
	if (in3=="")
		in3=0.01;
	var X0=parseFloat(in1);
	var H= parseFloat(in2);
	var X1=X0+H;
	var Y0 = myfunc(X0);
	var Y1 = myfunc(X1);
	var Sigma = parseFloat(in3);
	var i=0;
	res.innerHTML+= " Шаг" + i+" x:"+ X0 +" y: " + Y0 + " H:" + H+"<br>";
	plot2.x[i]=X0;
	plot2.y[i]=Y0;
	while (Math.abs(X0-X1)>Sigma && i<10000)
	 {
		i++;
		Y1 = myfunc(X1);
		if (Y1<Y0)
		{
			X0=X1;
			Y0=Y1; 
			X1=X0+H;
		}else{
			H=-H/3.0;
			X1=X0+H;
		}	
		plot2.x[i]=X0;
		plot2.y[i]=Y0;
		res.innerHTML+= "Шаг" + i+" x:"+ X0 +" y: " + Y0 + " H:" + H+" x1="+X1+" y1="+Y1+"<br>";
		//alert (" Шаг" + i+" x:"+ X0 +" y: " + Y0 + " H:" + H);
	 }
	 graph();
	

}