<script>

//setTimeout("document.getElementById('podelka').select;",100);

function sh2(id){ // выделить
	//id.style.backgroundColor = '#CBCBCB';
	id.style.color='#c00000';
	id.className='alf08';
}

function hd2(id){ // убрать
	//id.style.backgroundColor = 'transparent';
	id.style.color='#000000';
	id.className='alf1';
}

function sh(id){ // наведение
//id.style.fontSize='11pt';
id.style.color='#CCCCCC';
}

function hd(id){// убрал
//id.style.fontSize='10pt';
id.style.color='#AAAAAA';
}

function scroll_u(k){
id=document.getElementById('mensc');
run_scroll(k*40);
}

function run_scroll(k){
id=document.getElementById('mensc');
id.scrollTop=id.scrollTop-k;
if (k<0){k+=1;}else{k-=1;}
k=k/1.12;
if (Math.abs(k)>1){setTimeout('run_scroll('+k+');',24);}
}

function reklama(id,ima){
setTimeout("gorek("+id+",'"+ima+"');",Math.round(Math.random()*17300)+5100);
}

function gorek(id,ima){
id2=document.getElementById('imar_'+id);
id2.src=ima+'.gif';
setTimeout("stoprek("+id+",'"+ima+"');",Math.round(Math.random()*12100)+4050);
}

function stoprek(id,ima){
id2=document.getElementById('imar_'+id);
id2.src=ima;
setTimeout("gorek("+id+",'"+ima+"');",Math.round(Math.random()*22200)+8080);
}

<?
echo $rekal;
?>

setTimeout('begu(0,0);',10);

function begu(k,p){
k+=0.02175438;
if (k>6.28){k=0;}
p+=0.0164386351;
if (p>6.28){p=0;}

id=document.getElementById('begi');
id.style.color=rgb2hex(Math.abs(Math.round(Math.sin(k)*175))+80,220,Math.abs(Math.round(Math.cos(p)*175))+80);
setTimeout('begu('+k+','+p+');',20);
}

function rgb2hex(r,g,b)
{
 return Number(r).toString(16).toUpperCase().replace(/^(.)$/,'0$1') + 
 Number(g).toString(16).toUpperCase().replace(/^(.)$/,'0$1') +
 Number(b).toString(16).toUpperCase().replace(/^(.)$/,'0$1');
}


</script>