<?php 
header("Content-Type: text/html; charset=utf-8"); 
?> 
<?php 

$url = 'http://hokej.cz/xmlExport/ingest'; 
$xml = file_get_contents($url, false); 
$sxml = simplexml_load_string($xml); 


$qwerty =[] ; 
for($i=0; $i<count($sxml); $i++){ 
$qwerty[$i]['id'] = (string) $sxml->video[$i]['id']; 
$qwerty[$i]['title'] = (string) $sxml->video[$i]['title']; 
$qwerty[$i]['categoryId'] = (int) $sxml->video[$i]['categoryId']; 
} 

foreach ($qwerty as $key => $value) { 
if($value['categoryId'] == 14){ 
$stringID = (string) $value['id'];
$value['id'] = (int) $value['id'];
$newdate = date("d.m.Y", strtotime($value['id']));
$rest = substr("$qwerty[$i]['title']", 8);
?> 

<style type="text/css">
.video {
  overflow: hidden;
  font-size: 16px;
}
.video dt, .video dd {
  height: 2.5em;
  line-height: 2.5em;
  padding: 0 0.625em 0 0.875em;
  color: #4C565C;
  box-sizing: border-box;
}
dt {
  width: 30%;
  float: left;
  clear: right;
  background: #D3E6DD;
  font-weight: bold;
}
dd {
  width: 70%;
  float: right;
  margin-left: 0;
  margin-bottom: .3125em;
  border: 1px solid #BECFC7;
  border-left: none;
}
</style>

<dl class="video">
  <dt><?php echo $newdate ?></dt>
    <dd><a target="blanck" href="http://php.esports.cz/elhcheck/index.php?id=<?php echo $stringID ?>"><?php echo $rest ?></a></dd>
  
</dl>

<?php 

} 

} 
?>