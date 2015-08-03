		<style>
			.divIconosOsinfor{
				width:912px;
				height:362px;
			}
			.divIconosOsinfor .aIconoOSINFOR{
				width:142px;
				height:142px;
				padding:20px;
				border-style:solid;
				border-width:2px;
				border-color:rgba(0,0,0,0.2);
				border-radius:50%;
				float:left;
				margin:20px;
				transition-property:background-color;
				transition-duration:1s;
				background-color:#FFF;
				cursor:pointer;
			}
			.divIconosOsinfor .aIconoOSINFOR:hover{
				background-color:#8FC541;
			}
            .divVentanaOSINFOR{
                background-color:rgba(0,0,0,0.6);
                width:100%;
                height:100%;
                position:absolute;
                left:0;
                top:0;
                z-index:10000;
            }
            .divVentanaOSINFOR .divAficheSIGO{
                position:absolute;
                width:616px;
                height:457px;
                left:50%;
                top:50%;
                margin-left:-308px;
                margin-top:-228.5px;
            }
            .divVentanaOSINFOR .divAficheSIGO .aAficheSIGO{
                cursor:pointer;
                position:absolute;
                margin:0;
                padding:0;
            }
            .divVentanaOSINFOR .divAficheSIGO .divCerrarSIGO{
                cursor:pointer;
                position:absolute;
                left:590px;
				top:3px;
            }
        </style>
        <center>
            <div class='divIconosOsinfor'>
                <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i01/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon01.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i02/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon02.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i03/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon03.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i04/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon04.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i05/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon05.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i06/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon06.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i07/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon07.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i08/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon08.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i09/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon09.png" /></a>
                    <a class='aIconoOSINFOR' href="http://www.osinfor.gob.pe/osinfor/i10/" target="_blank"><img border="0" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/icon10.png" /></a>
            </div>
        </center>
        <div class='divVentanaOSINFOR' id="divVentanaOSINFOR" onClick="OcultarVentana();">
            <div class='divAficheSIGO'>
                <a id="b1" class='aAficheSIGO' href="http://www.osinfor.gob.pe/osinfor/i07/" target="_blank"><img src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/TribunalForestalProceso.png" border="0" width="616" height="457" /></a>
                <a id="b2" class='aAficheSIGO' href="http://www.osinfor.gob.pe/osinfor/sigo/" target="_blank"><img src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/BannerOriginal.png" border="0" width="616" height="457" /></a>
                <div class='divCerrarSIGO'><img onClick="OcultarVentana();" id="imgCerrar" src="http://www.osinfor.gob.pe/osinfor/wp-content/uploads/2015/07/btnCerrar.png" width="24" height="24" /></div>
            </div>
        </div>
<script> 
	var duracion = 7000;
	var contador = 1;
	document.getElementById('b2').style.display = "none";
	function movecube(){
		if(contador == 1){
			document.getElementById('b1').style.display = "";
			document.getElementById('b2').style.display = "none";
		}else{
			document.getElementById('b1').style.display = "none";
			document.getElementById('b2').style.display = "";
		}
		contador++;
		if (contador == 2) {contador = 0;}
		setTimeout("movecube()",duracion);
	}
	function OcultarVentana(){
		document.getElementById('divVentanaOSINFOR').style.display = "none";
	}
	function PosAficheSIGO(){
		document.getElementById('divVentanaOSINFOR').style.top = document.body.scrollTop + "px";
		document.getElementById('divVentanaOSINFOR').style.left = document.body.scrollLeft + "px";
	}
	window.onload = new Function("setTimeout('movecube()',duracion)");
	window.onscroll = PosAficheSIGO;
</script>