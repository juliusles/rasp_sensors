<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

  <head>
    <title>Rasp sensors</title>
  </head>

  <body>
    <form method="post">
      <input type="submit" name="print_all" value="Listaa kaikki">
      <input type="submit" name="list_temp" value="Lämpötilat" >
      <input type="submit" name="bath_max_humid" value="Pesuhuoneen max kosteus" >
      <input type="submit" name="living_min_temp" value="Olohuoneen min lämpötila" >
      <input type="submit" name="kitchen_co2_avg" value="Keittiön avg CO2" >
      <input type="submit" name="list_co" value="Häkälukemat" >
    </form>

    <table style="text-align: center; width: 50%;" border="4"cellpadding="8" cellspacing="4">
      <tbody>
        <tr>
          <td style="width: 100px;">
            <span style="font-wight: bold;">MittausID</span>
          </td>
          <td style="width: 200px;">
            <span style="font-wight: bold;">Aika</span>
          </td>
          <td style="width: 100px;">
            <span style="font-wight: bold;">Lämpötila [C]</span>
          </td>
          <td style="width: 100px;">
            <span style="font-wight: bold;">Kosteus [%]</span>
          </td>
          <td style="width: 100px;">
            <span style="font-wight: bold;">CO2 [ppm]</span>
          </td>
          <td style="width: 100px;">
            <span style="font-wight: bold;">CO [ppm]</span>
          </td>
          <td style="width: 200px;">
            <span style="font-wight: bold;">Huone</span>
          </td>
        </tr>
        <?php include("buttons.php"); ?>
      </tbody>
    </table>
  </body>
</html>
