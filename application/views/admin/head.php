<title><?php echo $title; ?></title>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="mon, 22 jul 2002 11:12:01 gmt" />
<link rel="shortcut icon" href="images/cart.ico" type="image/x-icon" />

<link type="text/css" rel="stylesheet" href="css/styles.css" />
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>

<script type="text/javascript" src="js/thickbox-compressed.js"></script>
<link type="text/css" rel="stylesheet" href="css/thickbox.css" />

<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/smoothness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script>
  $(function() {
    $( ".selector" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
</script>

<link type="text/css" href="css/calculator.css" rel="stylesheet" />
<script src="js/calculator.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
    $.fn.calculator.hide = function(calc) {
      calc.fadeOut(500);
    };
		
    $('#calc').calculator({movable:true,resizable:false, width:230, height:300, defaultOpen:false});
    $('#showCalc').click(function(){
      $('#calc').show();
    })
  })
</script>
