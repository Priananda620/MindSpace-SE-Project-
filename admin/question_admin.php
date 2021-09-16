<?php 
session_start();
if(!isset($_SESSION{'username_admin'})){
		header("location:index.php?error=2");
}
?>
<!doctype html>
<html> 
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Admin | Mind Space</title> 
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<link rel="icon" type="image/png" href="img/admin-button-icon-hi.png"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/togel_menu.js"></script>
<style>.hide{ display:none !important;  /*visibility:hidden;*/ } </style>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php echo $_SESSION['username_admin'];?></strong> [ <a href="process/logout.php">logout</a> ]</p>
			</div>
			<div class="right">
				<div class="align-right">
					<span style="float:left;">Today :</span><p id="date"><strong></strong></p>
				</div>
			</div>
		</div>
		<div id="nav"> 
			<ul>
				<li class="upp"><a href="question_admin.php">Question</a>
				</li>
				<li class="upp "><a href="member.php">Member</a>
				</li>
				<li class="upp "><a href="user.php">User</a>
				</li>
				<li class="upp "><a href="product.php">Product</a>
				</li>
                <li class="upp "><a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Menu Content</div>
				<ul id="home">
					<li class="b1"><a class="icon page" href="Question_admin.php">Question </a></li>
                    <li class="b1"><a class="icon add_user" href="member.php">Member</a></li>
					<li class="b2"><a class="icon config" href="user.php">User </a></li>
					<li class="b2"><a class="icon product" href="product.php">Product</a></li>
                    <li class="b2"><a class="icon contact" href="contact.php">Contact</a></li>
				</ul>
			</div>
		</div>
		<div id="main">
        
        
		  <div class="clear"></div>
          
			
			
			<div class="full_w">
				<div class="h_title">Manage pages - Question</div>
				<h2>Question</h2><?php //judul table ?>
				<p>Here is the question table data, to manage question data, please use the tools below</p>
                <a href="form_add_question.php" style="float:right; margin-bottom:0px;"> 
                <button type="submit" class="add">Add Question</button>
                </a>
				
				<div class="entry">
					<div class="sep"></div>
				</div>
               
                
				<table>
					<thead>
						<tr>
							<th scope="col">Id Question</th>
							<th scope="col">Title</th>
							<th scope="col">Image</th>
							<th scope="col">Synopsis</th>
                            <th scope="col">Create Date</th>
							<th scope="col" style="width: 65px;">Modify</th>
						</tr>
					</thead>
						
					<tbody>
						<?php
						require_once 'process/db_config.php';
						$connect = new mysqli($db_host,$db_username,$db_password,$db_name);
						$view = 6;
						if (isset ($_GET['page'])){
                            $active_page = $_GET['page'];
                        }  else {
                            $active_page = 1;
						}
						$start = ($active_page-1)*$view;
						$sql = "SELECT * FROM question_tbl LIMIT $start,$view";
						$query = $connect->query($sql);
						
						while ($row = $query->fetch_assoc()){
						?>
                        <tr>
							<td class="align-center"><?php echo $row['questionID'];?></td>
							<td><?php echo $row['question_title'];?></td>
							<td>
                            	<img style="width:100%;" src="../asset/question_images/<?php if(isset($row['question_image'])){
                                	echo $row['question_image'];
                            	}else {
                                	echo "default_question_mindspace.jpg";
                            	}
                            	?>" />
                            </td>
                            <td><?php echo htmlspecialchars(substr($row['question_synopsis'],0,80))?>...</td>
							<td><?php echo $row['date_created'];?></td>
							
							<td>
								<a href="#" class="table-icon edit" title="Edit"></a>
								<a href="#" class="table-icon archive" title=" View Comment"></a>
								<a href="process/remove-question.php/?questionId=<?php echo $row['questionID']?>" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
                        <?php }?>
                        
					</tbody>
				</table>
				<div class="entry">
				<?php 
                    $sqltotal = "SELECT * FROM question_tbl";
                    $qtotal = $connect->query($sqltotal);
                    $total_data = $qtotal->num_rows;
                    $total_page = ceil($total_data/$view);
                ?>
					<div class="pagination">
						<?php for ($i=1;$i<=$total_page;$i++){?>
                		<?php  if($i == $active_page && $i ) {?>
							<span class="active"><?php echo $i; ?></span>
						<?php } else if ($i != 11){?>
							<a href="?page=<?php echo $i;?>"><?php echo $i; ?></a>
						<?php } else if ($i == 11){?>
							<span class="active">...</span>
							<a href="?page=<?php echo $total_page;?>"><?php echo $total_page; ?></a>
							<?php  break;?>
						<?php }}?>
					</div>
					
                    <span>...</span>
					<div class="sep hide"></div>		
				  <a class="button add hide" href="">Add new page</a> <a class="button hide" href="">Categories</a> 
				</div>
        
			</div>
            
      
	  </div>
		<div class="clear"></div>
	</div>

	<div id="footer">
		<div class="left">
			<p>Admin Panel: <a href="../index.php">Mind Space</a></p>
		</div>
		<div class="right">
			<p>@ group 3 </p>
		</div>
	</div>
</div>

</body>

<script>
var d = new Date();
document.getElementById("date").innerHTML = d.toDateString();
</script>

</html>

