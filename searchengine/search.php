<input type="button" onclick="location.href='http://127.0.0.1/searchengine';" value="Search for another game"/><br><br>

     <html>
     <head></head>
     <body>

<?php
echo '<body style="background-color:#151515">';
$button = $_GET ['submit'];
$search = $_GET ['search']; 

if(strlen($search)<=1)
echo "<font color='white'>Search term too short</font>";
else{
echo "<font color='white'>You searched for <u><b>$search</b></u> <hr size='1'></br></font>";
mysql_connect("localhost","root","kim020995");
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
  
$constructs ="SELECT * FROM gamestop WHERE $construct";
$run = mysql_query($constructs);
    
$foundnum = mysql_num_rows($run);
    
if ($foundnum==0)
echo "<font color='white'>Sorry, there are no matching result for <b>$search</b>.</br></br>
Here are some helpful tips to help your search!</font><br><br><font color='white'>
1. 
Try more general words. For example: If you want to search 'The Legend of Zelda Breath of Wild Special Edition'
then use general keyword like 'Zelda'</br>2. Try different words with similar
 meaning</br>3. Please check your spelling</font>";
else
{ 
  
echo "<font color='white'>$foundnum result(s) found!<p></font>";
  
$per_page = 1;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = mysql_query("SELECT * FROM gamestop WHERE $construct LIMIT $start, $per_page");
  
while($runrows = mysql_fetch_assoc($getquery))
{
$title = $runrows ['title'];
$price = $runrows ['price'];
$url = $runrows ['url'];
   
echo "<font color='white'>
Game Title: <a href='$url'><b>$title</b></a><br>
Price: $price<br></font>
";
    
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
echo "<font color='white'><a href='search.php?search=$search&submit=Search+source+code&start=$next'>Next</font></a> ";    
}   
echo "</center>";
} 
} 
?>
