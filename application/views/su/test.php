<?php if($pagery): ?>
<div class="pagination">
    <ul>
        <?php if($pagery['has_previous']): ?>
        <li class="prev"><a href="<?php echo site_url('admin/posts/?page=' . ($pagery['page'] - 1) . '&amp;status=' . $status . '&amp;mid=' . $mid . '&amp;q=' . $q); ?>">上一页</a></li>
        <?php else: ?>
        <li class="prev disabled"><a href="javascript:void(0)">上一页</a></li>
        <?php endif; ?>
        <?php foreach($pagery['page_range'] as $item):  ?>
        <?php if($pagery['page'] == $item): ?>
        <li class="active"><a><?php echo $item; ?></a></li>
        <?php elseif($item == '&hellip;'): ?>
        <li class="disabled"><a href="#"><?php echo $item; ?></a></li>
        <?php else: ?>
        <li><a href="<?php echo site_url('admin/posts/?page=' . $item . '&amp;status=' . $status . '&amp;mid=' . $mid . '&amp;q=' . $q); ?>"><?php echo $item; ?></a></li>
        <?php endif; ?>
        <?php endforeach;  ?>
        <?php if($pagery['has_next']): ?>
        <li class="next"><a href="<?php echo site_url('admin/posts/?page=' . ($pagery['page'] + 1) . '&amp;status=' . $status . '&amp;mid=' . $mid . '&amp;q=' . $q); ?>">下一页</a></li>
        <?php else: ?>
        <li class="next disabled"><a href="javascript:void(0)">下一页</a></li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
    	</form>
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>