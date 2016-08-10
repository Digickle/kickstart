<?php
  // Inform search engines this is only temporary!
  header('Retry-After: 1800'); // Try again in 30 mins
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Website Undergoing Maintenance</title>
<style type="text/css">
html, body, table, td {
  height: 99%;
  background-color: #FFF;
}
p {
  font-size: 28px;
  font-family: helvetica, arial, sans-serif;
  font-style: normal;
  font-weight: 100;
  color: #333; 
}
</style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><p><img src="/sites/all/themes/website/logo.png" alt="Logo"></p>
      <p><br>
        Our website is currently undergoing maintenance and will be back shortly.</p>
      <p>Please try again in a few minutes.</p></td>
  </tr>
</table>
</body>
</html>