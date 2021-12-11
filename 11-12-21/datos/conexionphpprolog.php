 <?php  
   
  $output = `swipl -s conexionprolog.pl -g "test." -t halt.`;
  var_dump($output);