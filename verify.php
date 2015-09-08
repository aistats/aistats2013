

function InsertData()
{
  // requires DB created with: sqlite3 registration/register.db "create table reg(type,price,name,affiliation,email,vegetarian,directory)"
  // query with: sqlite3 registration/register.db "select * from reg"

  // format SQL string using sqlite_escape_string to guard
  // against unsafe data
  $queryString = "INSERT INTO reg (type, price, name, affiliation, vegetarian, email, directory) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
  $query = sprintf($queryString, 
		   sqlite_escape_string($_POST['type']), 
		   sqlite_escape_string($_POST['price']), 
		   sqlite_escape_string($_POST['name']), 
		   sqlite_escape_string($_POST['affiliation']), 
		   sqlite_escape_string($_POST['vegetarian']), 
		   sqlite_escape_string($_POST['email']), 
		   sqlite_escape_string($_POST['attendee-list']));
  // echo 'Query: '.htmlspecialchars($query).'<br>';

  // insert data
  try {
    $conn = new PDO('sqlite:/afs/cs.cmu.edu/project/ggordon-www/aistats2011/registration/register.db');
    $conn->query($query);
    $conn = null;
  } catch (PDOException $e) {
    echo "PDO exception: " . $e->getMessage() . "<br/>";
    return false;
  }
  return true;

//   // echo htmlspecialchars(system('sqlite3 -version'));  
//   $sqlcmd = sprintf('sqlite3 /afs/cs.cmu.edu/project/ggordon-www/aistats2011/registration/register.db ' . escapeshellarg($query));
//   echo 'Cmd: '.htmlspecialchars($sqlcmd).'<br>';
//   $res = exec($cmd, $output, $retval);
//   if (!$retval)
//     echo 'Command failed: '.$retval.'<br>';
//   else {
//     echo 'Result: '.htmlspecialchars($res).'<br>';
//   }

//   if (!sqlite_query($conn, $query, 066, $sqlite_err)) {
//     echo "Insert failed";
//     echo $sqlite_err;
//   }

//   sqlite_close($conn);
}

function Check($name, $val, $min, $max) {
  if (strlen($val) < $min) {
    echo "Error: field &ldquo;";
    echo htmlspecialchars($name);
    echo "&rdquo; is required.<br>";
    return -1;
  } else if (strlen($val) > $max) {
    echo "Error: field &ldquo;";
    echo htmlspecialchars($name);
    echo "&rdquo; is too long<br>";
    return -1;
  } else {
    return 0;
  }
}

function DataIsValid()
{
    if (Check('Name', $_POST['name'], 1, 250)) {
      return false;
    } else if (Check('Email', $_POST['email'], 1, 250)) {
      return false;
    } else if (Check('Affiliation', $_POST['affiliation'], 1, 250)) {
      return false;
    } else if (Check('Type', $_POST['type'], 1, 250)) {
      return false;
    } else if (Check('Food-preference', $_POST['vegetarian'], 1, 250)) {
      return false;
    } else if (Check('Price', $_POST['price'], 1, 250)) {
      return false;
    } else if (Check('Attendee-list', $_POST['attendee-list'], 0, 250)) {
      return false;
    } else {
      return true;
    }
}

?>

<script type="text/javascript">
    document.getElementById('LNreg').id='leftcurrent';
</script>

<div class="contents">

<hr>


  // fill in a reasonable value for non-selected checkbox
  if (!strlen($_POST['attendee-list'])) {
    $_POST['attendee-list'] = "please exclude from directory";
  }

// insert data -- currently disabled since we are not accepting check
// registrations at this time.  To re-enable, comment in the next line
// and comment out "if (1) {".

// if (DataIsValid() && InsertData()) {
if (1) {
      echo "<h2>AISTATS 2011 registration</h2>Registration successful!";
      echo "<blockquote>Registration type: ";
      echo htmlspecialchars($_POST['type']);
      echo "<br>Price: \$";
      echo htmlspecialchars($_POST['price']);
      echo "<br>Name: ";
      echo htmlspecialchars($_POST['name']);
      echo "<br>Affiliation: ";
      echo htmlspecialchars($_POST['affiliation']);
      echo "<br>Email: ";
      echo htmlspecialchars($_POST['email']);
      echo "<br>Food preference: ";
      echo htmlspecialchars($_POST['vegetarian']);
      echo "<br>Directory preference: ";
      echo htmlspecialchars($_POST['attendee-list']);
?>

</blockquote>Thanks for registering, and see you in Ft. Lauderdale!&nbsp; Please remember to send your check as described below.&nbsp; In case of problems (e.g., if there is an error in your information above), please contact ggordonREMOVEME (at) cs.cmu.edu.

<hr>
<br>

<h2>Payment instructions</h2>

Please <b>write the registrant's email address</b> (as it appears above) on the check to ensure that it gets credited to the right account.&nbsp; 
Make your check payable to
<blockquote>
Society for AI and Statistics
</blockquote>
Please print this confirmation page and mail it, along with your check for the registration price indicated above, to:
<blockquote>
SAIAS, Inc.<br>
c/o Daryl Pregibon<br>
706 Hudson St<br>
Hoboken, NJ 07030&nbsp;&nbsp;&nbsp;USA
</blockquote>

} else {
      echo "Registration failed.&nbsp; Please hit &ldquo;Back&rdquo; and try again.<p>";
}
?>
<br>
</div>

<!--- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
