<div id="beitrag"> 
 <div id="smilies2">
<?php
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$smilies_result = mysql_query($smiliesql) OR die("<pre>\n".$smiliesql."</pre>\n".mysql_error());
    while ($smilieu = mysql_fetch_assoc($smilies_result)) {
echo "<img src=\"../../design/pics/smilies/".$smilieu['color']."/".$smilieu['url']."\" onclick=\"insertText(' ".$smilieu['title']." ','')\" alt=\"".$smilieu['title']."\" title=\"".$smilieu['title']."\" /> ";
	}
?>
  </div>
  <div id="buttonleiste">
    <button type="button" onclick="insertText('[b]','[/b]')" title="[b][/b]"><b>b</b></button>
    <button type="button" onclick="insertText('[i]','[/i]')" title="[i][/i]"><i>i</i></button>
    <button type="button" onclick="insertText('[u]','[/u]')" title="[u][/u]"><u>u</u></button>
    <button type="button" onclick="insertText('[quote]','[/quote]')" title="[quote][/quote]">quote</button>
    <button type="button" onclick="insertText('[code]','[/code]')" title="[code][/code]">code</button>
    <button type="button" onclick="insertText('[img]','[/img]')" title="[img]URL[/img]">img</button>
    <button type="button" onclick="insertText('[url]','[/url]')" title="[url=Adresse]Beschreibung[/url]">url</button>
  </div>
</div>
