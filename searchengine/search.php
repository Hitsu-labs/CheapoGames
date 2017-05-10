<html>
	<section class="webdesigntuts-workshop"><br>
	<form action="search.php" method="GET">		    
		<input type="text" placeholder="What are you looking for?" name = "search">		    	
		<button>Search</button>
	</form>
</section>
     <head></head>
     <body>
</html>
<?php
//echo '<body style="background-color:#151515">';
$button = $_GET ['submit'];
$search = $_GET ['search']; 

if(strlen($search)<=1)
echo "Search term too short";
else{
echo "<p style = 'font-family: Open Sans, sans-serif; font-size:28px; font-weight:300; letter-spacing: 1px; line-height:50px; text-align:center; display:block; text-transform: uppercase; padding-bottom:-10px'>SEARCH RESULTS FOR: <u><b>$search</b></u></p> <hr size='1';></br>";
mysql_connect("localhost","root","mayoPryde0705*");
mysql_select_db("gamestop");

$search_exploded = explode (" ", $search);
 
$x = "";
$construct = "";  
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="title LIKE '%$search_each%'";
else
$construct .="AND title LIKE '%$search_each%'";
    
}
  
$constructs ="SELECT * FROM dmz WHERE $construct";
$run = mysql_query($constructs);
    
$foundnum = mysql_num_rows($run);
    
if ($foundnum==0)
echo "Sorry, there are no matching result for <b>$search</b>.</br></br>
Here are some helpful tips to help your search!<br><br>
1. 
Try more general words. For example: If you want to search 'The Legend of Zelda Breath of Wild Special Edition'
then use general keyword like 'Zelda'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling";
else
{ 
  
echo "<p style='padding-bottom:0px; font-family: Open Sans, sans-serif; font-size: 18px; font-weight: 500; letter-spacing: 1px; line-height:0px; padding-bottom:30px; text-align:center; display: block;'>$foundnum result(s) found!</p>";
  
$per_page = 5;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = mysql_query("SELECT * FROM dmz WHERE $construct LIMIT $start, $per_page");
  
while($runrows = mysql_fetch_assoc($getquery))
{
$title = $runrows ['title'];
$price = $runrows ['price'];
$url = $runrows ['url'];
$image = $runrows ['image'];


echo "<a href='$url'><img src ='".$image."' height='50' width = '70' align = left></a>";
//echo "<a href=$url><b>$title</b></a>";
echo "<a href=$url><p style = 'font-family: Open Sans, sans-serif; font-size:15px; font-weight:300; letter-spacing:1px; display:block; align:left; height:10px;'>".$title."</p></a>";
echo "<p style = 'font-family: Open Sans, sans-serif; font-size:15px; font-weight:600; display:block; padding-bottom:20px'>".$price."</p>";
//echo "<p style = ''>".$price."</p>";
    
}

//Pagination Starts
echo "<center>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
//previous button
if (!($start<=0)) 
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$prev'>Prev</a> ";    
          
//pages 
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                                       
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='search.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";
}   
$i = $i + $per_page;                
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='search.php?search=$search&submit=Search+source+code&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search+source+code&start=$i'>$counter</a> ";   
} 
$i = $i + $per_page;              
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo "<a href='search.php?search=$search&submit=Search+source+code&start=$next'>Next</a> ";    
}   
echo "</center>";
} 
} 
?>
