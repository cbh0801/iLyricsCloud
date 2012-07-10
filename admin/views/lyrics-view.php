<?php
if (empty($result)) {
	echo "No record.";
	exit;
}
?>
<table>
<tr>
	<th></th>
	<th>ID</th>
	<th>Time</th>
	<th>Lang</th>
	<th>Song</th>
	<th>Lyrics</th>
</tr>
<?php
	$fullview = true;
	for ($i=0, $loop = count($result); $i < $loop; $i++):
		$lyrics = ($fullview) ? nl2br($result[$i]['lyrics']) : $result[$i]['lyrics'];
?>
<tr>
	<td>
		<a href="?q=<?php echo $module; ?>&action=edit&id=<?php echo $result[$i]['id']; ?>&page=<?php echo $page; ?>&search=<?php echo urlencode($search); ?>" class="btn">Edit</a>
	</td>
	<td><?php echo $result[$i]['id']; ?></td>
	<td nowrap><?php echo _time($result[$i]['created']); ?></td>
	<td><?php echo $result[$i]['lang']; ?></td>
	<td width="150">
		<p><?php echo $result[$i]['title']; ?></p>
		<p><?php echo $result[$i]['artist']; ?></p>
		<p><?php echo $result[$i]['album']; ?></p>
	</td>
	<td><div class=""><?php echo mb_substr($lyrics, 0, 100); ?></div></td>
</tr>
<?php endfor; ?>
</table>

<div class="actions">
	<div class="pager" align="right" style="float:right;width:300px;">
		<form name="pager" method="GET" action="./" style="margin:0;">
		<input type="hidden" name="q" value="lyrics">
		<input type="text" name="page" class="span1" value="<?php echo $page; ?>"> / <?php echo $pages;?> Pages. <?php echo $total;?> Records.
		</form>
	</div>
	<div align="left">
		<?php if ($pages > 1 && $page != 1): ?><a href="?q=<?php echo $module; ?>&page=<?php echo $page-1; ?>&search=<?php echo urlencode($search); ?>" class="btn">Prev</a><?php endif; ?>
		<?php if ($pages > 1 && $page != $pages): ?><a href="?q=<?php echo $module; ?>&page=<?php echo $page+1; ?>&search=<?php echo urlencode($search); ?>" class="btn">Next</a><?php endif; ?>
	</div>
</div>
