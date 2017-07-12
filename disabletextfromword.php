
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="General Services Office Building System">
    <meta name="author" content="Rhalp Darren R. Cabrera / Omar Raouf A. Daud">
    <link rel="shortcut icon" href="img/logo.png">

    <title>Property Accountability Receipt</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>
<form action=# name=f2 id=f2 onsubmit="return false">
<input type=text name=t1 id=t1f2 value="" size=25 style="width:300px;">
<br><textarea    name=t2 id=t2f2 cols=25 rows=2 style="width:300px;">
</textarea>
</form>

<script type="text/javascript" language=JavaScript>
function inputDigitsOnly(e) {
 var chrTyped, chrCode=0, evt=e?e:event;
 if (evt.charCode!=null)     chrCode = evt.charCode;
 else if (evt.which!=null)   chrCode = evt.which;
 else if (evt.keyCode!=null) chrCode = evt.keyCode;

 if (chrCode==0) chrTyped = 'SPECIAL KEY';
 else chrTyped = String.fromCharCode(chrCode);

 //[test only:] display chrTyped on the status bar 
 self.status='inputDigitsOnly: chrTyped = '+chrTyped;

 //Digits, special keys & backspace [\b] work as usual:
 if (chrTyped.match(/\d|[\b]|SPECIAL/)) return true;
 if (evt.altKey || evt.ctrlKey || chrCode<28) return true;

 //Any other input? Prevent the default response:
 if (evt.preventDefault) evt.preventDefault();
 evt.returnValue=false;
 return false;
}

function addEventHandler(elem,eventType,handler) {
 if (elem.addEventListener) elem.addEventListener (eventType,handler,false);
 else if (elem.attachEvent) elem.attachEvent ('on'+eventType,handler); 
 else return 0;
 return 1;
}

// onload: Call the init() function to add event handlers!
function init() {
 addEventHandler(self.document.f2.elements[0],'keypress',inputDigitsOnly);
 addEventHandler(self.document.f2.elements[1],'keypress',inputDigitsOnly);
}

</script>

<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>

