<pre>
<?php

/* Include the class */
require_once('class.acl.php');

/* Create a new object to generate a permissions set */
$permissionGenerator = new ACL();

/* Add the permissions you want */
$permissionGenerator->addPermission('read');
$permissionGenerator->addPermission('write');
$permissionGenerator->addPermission('delete');

/* Remove the permissions you've changed your mind about */
$permissionGenerator->removePermission('read');

/* And get an integer that correlates to the set of permissions you chose. This
 * can be stored and associated with a user account.
 */
$code = $permissionGenerator->evaluate();


/* Create an object and pass it a permissions code to test against */
$ACL = new ACL($code);

/* Get an array of possible actions you can test for */
$actions = $ACL->getActions();

/* Check which actions are allowed with the permissions code you passed in */
foreach ($actions as $action) {
    if($ACL->hasPermission($action)) {
        echo $action . ' is allowed <br>';
    }else{
        echo $action . ' is NOT allowed <br>';
    }
}


?>
</pre>
