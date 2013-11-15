<form id="new_post_form" name="new_post_form" method="post" action="post_process.php">
  <table width="200">
    <tr>
      <td align="right">
      	<select name='type'>
        	<option value='want'>I Want</option>
            <option value='will'>I Will </option>
        </select>
      </td>
      <td><input type="text" name="post" id="post" size='40' /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Description</td>
      <td><textarea name="description" id="description" cols="45" rows="10"></textarea></td>
    </tr>
    <tr>
      <td align="right">Currency</td>
      <td>
      	<input type="radio" name="currency" id="currency" value="tzs" />Tshs 
        <input type="radio" name="currency" id="currency" value="usd" />USD</td>
    </tr>
    <tr>
      <td align="right">Amount</td>
      <td><input type="text" name="amount" id="amount" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><button type='submit'>Create </button></td>
    </tr>
  </table>
</form>
