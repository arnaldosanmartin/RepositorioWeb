<!DOCTYPE html>
<html>
<head>
    <h2>Art&iacute;culos</h2>
</head>

<?php
  function accion(){
    echo "accion";
  }
  function acciondos(){
    echo 19;
  }
?>

<script>
    function Guardar(){
        
    }
</script>
<body>
    <form action="/action_page.php">
        Tipo de art&iacute;culo: <br><br>
        <td colspan="4">
	        <input type="radio" id="tipoProducto1" name="cod_tipo_producto" value='111' checked="checked"/> Completo&nbsp;
            <input type="radio" id="tipoProducto2" name="cod_tipo_producto" value='112'/>Corto&nbsp;
            <input type="radio" id="tipoProducto3" name="cod_tipo_producto" value='113'/>Revisi&oacute;n&nbsp;
            <input type="radio" id="tipoProducto4" name="cod_tipo_producto" value='114'/>Caso Cl&iacute;nico&nbsp;
		</td><br><br>
        T&iacute;tulo del art&iacute;culo: <strong>(*)</strong><br><br>
        <input type="text" name="titulo" maxlength="300" size="90" value="" id="txt_name_art"><br><br>
        <tr>
		    <td colspan="2">
		        <table width="40%">
		            <tr>
		                <td id="pagina_inicial">
		                    P&aacute;gina Inicial <strong>(*)</strong>:		                </td>
		                <td id="pagina_final">
                            P&aacute;gina Final <strong>(*)</strong>:
				        </td>
                    </tr>
                    <tr>
                        <td>        
                            <input type="text" name="txt_pagina_inicial" maxlength="10" size="5" value="">
			        	</td>
                        <td>
                            <input type="text" name="txt_pagina_final" maxlength="10" size="5" value="">
                        </td>
                    </tr>
                </table>
            </td>
        </tr><br>
        Idioma: <br><br>
        <select name="sgl_idioma">
            <option value="ES">Espa&ntilde;ol</option>
            <option value="DE">Alem&aacute;n</option>
            <option value="ZH">Chino</option>
            <option value="FR">Franc&eacute;s</option>
            <option value="IW">Hebreo</option>
            <option value="NL">Holand&eacute;s</option>
            <option value="EN">Ingl&eacute;s</option>
            <option value="IT">Italiano</option>
            <option value="JA">Japon&eacute;s</option>
            <option value="LA">Lat&iacute;n</option>
            <option value="PT">Portugu&eacute;s</option>
            <option value="QU">Quechua</option>
            <option value="RO">Rumano</option>
            <option value="RU">Ruso</option>
            <option value="TH">Tailand&eacute;s</option>
        </select><br><br>
        <tr>
		    <td colspan="2">
		        <table width="42%">
		            <tr>
		                <td id="año_producto">
		                    A&ntilde;o:
		                </td>
		                <td id="mes_producto">
				            Mes: 
				        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="nro_ano_presenta"><option value="">Seleccione</option>
               <option value="2020">2020</option>
               <option value="2019">2019</option>
               <option value="2018">2018</option>
               <option value="2017">2017</option>
               <option value="2016">2016</option>
               <option value="2015">2015</option>
               <option value="2014">2014</option>
               <option value="2013">2013</option>
               <option value="2012">2012</option>
               <option value="2011">2011</option>
               <option value="2010">2010</option>
               <option value="2009">2009</option>
               <option value="2008">2008</option>
               <option value="2007">2007</option>
               <option value="2006">2006</option>
               <option value="2005">2005</option>
               <option value="2004">2004</option>
               <option value="2003">2003</option>
               <option value="2002">2002</option>
               <option value="2001">2001</option>
               <option value="2000">2000</option>
               <option value="1999">1999</option>
               <option value="1998">1998</option>
               <option value="1997">1997</option>
               <option value="1996">1996</option>
               <option value="1995">1995</option>
               <option value="1994">1994</option>
               <option value="1993">1993</option>
               <option value="1992">1992</option>
               <option value="1991">1991</option>
               <option value="1990">1990</option>
               <option value="1989">1989</option>
               <option value="1988">1988</option>
               <option value="1987">1987</option>
               <option value="1986">1986</option>
               <option value="1985">1985</option>
               <option value="1984">1984</option>
               <option value="1983">1983</option>
               <option value="1982">1982</option>
               <option value="1981">1981</option>
               <option value="1980">1980</option>
               <option value="1979">1979</option>
               <option value="1978">1978</option>
               <option value="1977">1977</option>
               <option value="1976">1976</option>
               <option value="1975">1975</option>
               <option value="1974">1974</option>
               <option value="1973">1973</option>
               <option value="1972">1972</option>
               <option value="1971">1971</option>
               <option value="1970">1970</option>
               <option value="1969">1969</option>
               <option value="1968">1968</option>
               <option value="1967">1967</option>
               <option value="1966">1966</option>
               <option value="1965">1965</option>
               <option value="1964">1964</option>
               <option value="1963">1963</option>
               <option value="1962">1962</option>
               <option value="1961">1961</option>
               <option value="1960">1960</option>
               <option value="1959">1959</option>
               <option value="1958">1958</option>
               <option value="1957">1957</option>
               <option value="1956">1956</option>
               <option value="1955">1955</option>
               <option value="1954">1954</option>
               <option value="1953">1953</option>
               <option value="1952">1952</option>
               <option value="1951">1951</option>
            </select>
			        	</td>
                        <td>
                            <select name="nro_mes_presenta" id="nro_mes_presenta"><option value="1" selected="selected">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
			        	</td>
                    </tr>
                </table>
            </td>
        </tr><br>
        <tr>
		    <td colspan="2">
		        <table width="66%">
		            <tr>
		                <td id="revista_producto">
		                    Revista: <strong>(*)</strong>
		                </td>
		                <td id="volumen_revista">
				        	Volumen: <strong>(*)</strong>
				        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="revista" maxlength="300" size="90" value="" id="txt_name_rev">
			        	</td>
                        <td>
                            <input type="text" name="txt_volumen_revista" maxlength="16" size="5" value="">
			        	</td>
                    </tr>
                </table>
            </td>
        </tr><br>
        <tr>
		    <td colspan="2">
		        <table width="65%">
		            <tr>
		                <td id="fasiculo_revista">
		                    Fas&iacute;culo de revista: <br><br>
                        </td>
		                <td id="serie_revista">
				        	Serie revista:
				        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Importante: </strong> Si el art&iacute;culo est&aacute; publicado en una revista que no tiene fasc&iacute;culo ingrese N/A (No Aplica). &nbsp 

                            <input type="text" name="txt_fasciculo_revista" maxlength="10" size="5" value="" id="txt_fasciculo_revista"> <br><br>
			        	</td>
                        <td>
                            <input type="text" name="txt_serie_revista" maxlength="10" size="5" value=""><br><br>
			        	</td>
                    </tr>
                </table>
            </td>
        </tr>
        Ciudad: <br><br>
        <input type="text" name="ciudad" maxlength="300" size="90" value="" id="txt_name_ciud"><br><br>
        Medio de divulgaci&oacute;n: <br><br>
        <select name="tpo_medio_divulgacion" id="medio"><option value="I">Papel</option>
		         <option value="H">Electr&oacute;nico</option>
		</select><br><br>
		<tr>
		    <td colspan="2">
		        <table width="85%">
		            <tr>
		                <td id="txt_web_producto">
		                    Sitio web (URL)
		                </td>
		                <td id="txt_doi">
				        	DOI (Digital Object Identifier)
				        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="txt_web_producto" maxlength="300" size="70" value="" onchange="cambiarCamposRequeridos()" id="url">
			        	</td>
                        <td>
                            <input type="text" name="txt_doi" maxlength="300" size="29" value="" onchange="cambiarCamposRequeridos()" id="doi">
			        	</td>
                    </tr>
                </table>
            </td>
        </tr><br>
        Autores:<br><br>
        <input type="text" name="autores">
        <br><br>
        <input type="submit" value="Guardar" onclick="Guardar();">
    </form> 

    
<?php
// A simple web site in Cloud9 that runs through Apache 
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo ' ';

?>
</body>
</html>