<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>SagemCom</title>
	<link rel="stylesheet" type="text/css" href="feuille_index.css">
</head>
<body>
	<img src="sagem-logo.png" alt ="SagemCom"> 
<header>

	<center>   <p>  Bienvenue Chez SAGEMCOM  </center>

	<!-- insert the header here please -->
</header>
<section>
<script>
	//source a ne pas toucher //
	/*var compteur = 0;
function mouseDown() {
			if ( compteur>0) then
				{ compteur = compteur +1;
     var src = document.getElementById("gamediv");
            var img = document.createElement("img");
            img.src = "sagem-logo.png";
            img.height = "400";
            src.appendChild(img);
        }
       
        }
*/

// Function For Enable and Disable Add Picture Add Product 
 function mouseDownadd()
   {
document.getElementById("gamediv").style.visibility = "visible";
}
function mouseUpadd()
{
	
document.getElementById("gamediv").style.visibility = "hidden";

}

// Function For Enable and Disable Add Picture for Search Product
function mouseDownSearch()
   {
document.getElementById("search").style.visibility = "visible";
}
function mouseUpSearch()
{
	
document.getElementById("search").style.visibility = "hidden";

}
// Function For Enable and Disable Add Picture for compaire Product
function mouseDownCompair()
   {
document.getElementById("compair").style.visibility = "visible";
}
function mouseUpCompair()
{
	
document.getElementById("compair").style.visibility = "hidden";

}
</script>
<article>
	<div class="resolution_index">
<div class="columns">
  <ul class="price">
    <li class="header">Ajout Produits </li>
     <li class="grey" onmouseover="mouseDownadd()" onmouseout="mouseUpadd()"><a href="import.php" class="button" onmouseover="mouseDownadd()" onmouseout="mouseUpadd()">Ajouter</a></li>
    <div onmouseover="mouseDownadd()" onmouseout="mouseUpadd()">
<img src="add-database.png" id="gamediv" style="visibility: hidden;">	 

   <br>

  </ul>

</div>
  <div class="columns1">
  <ul class="price">
    <li class="header">Filtrage Produits </li>
     <li class="grey" onmouseover="mouseDownSearch()" onmouseout="mouseUpSearch()"><a href="filtrage.php" class="button" onmouseover="mouseDownSearch()" onmouseout="mouseUpSearch()">Filtrer</a></li>
     
<div onmouseover="mouseDownSearch()" onmouseout="mouseUpSearch()"> 
<img src="search-database.png" id="search" style="visibility: hidden;">
<br>
  </ul>
</div>
<div class="columns2">
  <ul class="price">
    <li class="header">Comparateur Produits </li>
     <li class="grey" onmouseover="mouseDownCompair()" onmouseout="mouseUpCompair()"><a href="#" class="button" onmouseover="mouseDownCompair()" onmouseout="mouseUpCompair()"> Comparer </a></li>
     <div onmouseover="mouseDownCompair()" onmouseout="mouseUpCompair()"> 
<img src="compair-database.png" id="compair" style="visibility: hidden;">

  </ul>
</div>
</article>

</section>
</body>
</html>