



<div class="panel-body">



    <input type="hidden" id="inbox_form" name="inbox_form" value="{$BASE_URL}" />

    <table  class="table table-hover" id="sample-table-1">
	<thead>
	    <tr class="th">            
		<th> {$tran_no}</th>
		<th>{$tran_news_title}</th>
		<th>{$tran_date}</th>
	    </tr>
	</thead>
	<tbody>
	    {assign var=i value=1}

	    {if $arr_count> 0}
                {foreach from=$news_details item=v}


		    {$id = $v.news_id} 
		    <tr>

			<td>
			   
			    <a id="" class="btn btn-xs btn-link panel-config" href ="#panel-config{$id}" onclick="readMessage({$id}, this.parentNode.parentNode.rowIndex, 'user', '{$BASE_URL}user')" data-toggle="modal" style='color:#C48189;'>  {$i}</a>
			</td>
			<td>
			    <a class="btn btn-xs btn-link panel-config" href ="#panel-config{$id}" onclick="readMessage({$id}, this.parentNode.parentNode.rowIndex, 'user', '{$BASE_URL}user')" data-toggle="modal" style='color:#C48189;'> {$v.news_title}</a>
			</td>
			<td>
			    <a class="btn btn-xs btn-link panel-config" href ="#panel-config{$id}" onclick="readMessage({$id}, this.parentNode.parentNode.rowIndex, 'user', '{$BASE_URL}user')" data-toggle="modal" style='color:#C48189'> {$v.news_date}</a>
			</td>


		    </tr>
		    {$i=$i+1}	



                {/foreach}
	    {else}
	    <tbody><tr><td align="center" colspan="4"><b>{$tran_You_have_no_news_in_inbox}</b></td></tr></tbody>
			{/if}
	</tbody>
    </table>
   
</div>

