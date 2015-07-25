<!DOCTYPE html>
<html ng-app="zanguApp">
<script src="http://zangura/node_modules/angular/angular.js"></script>  
<script type="text/javascript" src="http://zangura/static/scripts/test.js">
</script>
<?php 
echo  $pagetitle;
?>
<div ng-controller="test">
hi {{name}}
{{5+5}}
{{users}}
</div>
</html>