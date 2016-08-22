<?php
$id = $_GET['id'];
$string = file_get_contents("https://data.dublinked.ie/cgi-bin/rtpi/realtimebusinformation?stopid=".$id);
$json_a = json_decode($string, true);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dublin Bus Real Time Information</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/bootstrap.js" type="text/javascript"></script>
</head>

<body>
<div class="container-fluid">
	<div class="row">
    	<div class="col-sm-4">
        	<p>Stop Number: <span class="desc"><?php echo $json_a['stopid'] ?></span></p>
        </div>
        <div class="col-sm-4">
        
        </div>
        <div class="col-sm-4">
        
        </div>
    </div>
	<div class="row">
    	<div class="col-xs-12">
        	<table class="table-striped table-responsive table-hover table-bordered table-condensed">
            	<tr>
                	<th class="table-heading">Route</th>
                    <th class="table-heading">Destination</th>
                    <th class="table-heading">Expected Time</th>
                </tr>
                <?php
					for($i=0; $i<count($json_a['results']); ++$i)
					{
						?>
                        <tr>
                        	<td><?php echo $json_a['results'][$i]['route']; ?> </td>
                            <td><?php echo $json_a['results'][$i]['destination']; ?></td>
                            <td><?php echo $json_a['results'][$i]['duetime'].' minutes'; ?></td>
                        </tr>
                        <?php
					}
					
				?>
                
            </table>
        </div>
    </div>
</div>

</body>
</html>