<table>
<thead><tr>
<th>recurring</th>
<th>contact</th>
<th>start</th>
<th>create</th>
<th>amount</th>
<th>#contributions</th>
<th>total</th>
</tr></thead>
<tbody>
{foreach from=$contributions.values item="contribution"}
<tr>
<td>{$contribution.id}</td>
<td>{$contribution.contact_id}</td>
<td>{$contribution.start_date}</td>
<td>{$contribution.create_date}</td>
<td>{$contribution.amount}</td>
<td>{$contribution.nb_contribution}</td>
<td>{$contribution.total}</td>
</tr>
{/foreach}
</tbody>
</table>
{*
*}
